(function( $ ) {
    'use strict';

    window.XT_ATC = window.XT_ATC || {};

    $(function() {

        var startButtonLoaderTimeout;
        var stopButtonLoaderTimeout;
        var clickSelector = touchSupport() ? 'touchstart' : 'click';

        // Shop Vars
        XT_ATC.ajaxAddToCart = !!XT_ATC.ajaxAddToCart;
        XT_ATC.ajaxSinglePageAddToCart = !!XT_ATC.ajaxSinglePageAddToCart;
        XT_ATC.isProductPage = !!XT_ATC.isProductPage;

        // Single Product Page Vars
        XT_ATC.singleScrollToNotice = !!XT_ATC.singleScrollToNotice;
        XT_ATC.singleScrollToNoticeTimeout = parseInt(XT_ATC.singleScrollToNoticeTimeout);

        // Spinner Override Vars
        XT_ATC.overrideSpinner = !!XT_ATC.overrideSpinner;

        // Spinner Redirection Vars
        XT_ATC.redirectionEnabled = !!XT_ATC.redirectionEnabled;

        function init() {

            $('form .add_to_cart_button').each(function () {
                $(this).removeClass('add_to_cart_button').addClass('single_add_to_cart_button');
            });

            $(document.body).on('should_send_ajax_request.adding_to_cart', shouldAddToCart);
            $(document.body).on('adding_to_cart', onAddingToCart);
            $(document.body).on('added_to_cart', onAddedToCart);
            $(document.body).on(clickSelector, 'xt_atc-button-spinner-wrap', onSpinnerClick);
            $(document.body).on(clickSelector, '.single_add_to_cart_button', onSingleAddToCart);
        }

        function touchSupport() {

			if ('ontouchstart' in document.documentElement) {
				return true;
			}
			return false;
		}

        function shouldAddToCart(evt, trigger) {

            return !isButtonLoading(trigger);
        }
        
        function onAddingToCart(evt, trigger) {

            startButtonLoader(trigger);

            $(document.body).trigger('xt_atc_adding_to_cart', [trigger]);
        }

        function onAddedToCart(evt, fragments, cart_hash, trigger) {

            stopButtonLoader(trigger);

            if (fragments && !cartHasErrors(fragments)) {
                $(document.body).trigger('xt_atc_added_to_cart', [{fragments: fragments}, trigger, cart_hash]);
            }
        }

        function onSpinnerClick(evt) {

            evt.preventDefault();
            evt.stopPropagation();
            evt.stopImmediatePropagation();
        }

        function onSingleAddToCart(evt) {

            var trigger = $(this);

            if (!isButtonLoading(trigger) && !isButtonDisabled(trigger) && !skipSingleAddToCart(trigger)) {

                evt.preventDefault();
                evt.stopPropagation();

                if(validSingleAddToCart(trigger)) {
                    singleAddToCart(trigger);
                }
            }
        }

        function cartHasErrors(fragments) {

            if (fragments && fragments.hasOwnProperty('.woocommerce-notices-wrapper') && $(fragments['.woocommerce-notices-wrapper']).length) {

                return $(fragments['.woocommerce-notices-wrapper']).find('.woocommerce-error').length > 0;
            }
            return false;
        }

        function validSingleAddToCart(trigger) {

            // validate required options from multiple plugins

            var form = trigger.closest('form');
            var errors = 0;

            // Check if has quantity
            var $qty_input = form.find('.quantity .qty:visible');

            if ($qty_input.length) {

                $qty_input.each(function() {

                    var $qty = $(this).closest('.quantity');
                    $qty.removeClass('xt_atc-error');

                    var value = parseInt($(this).val());
                    var has_min = $(this).get(0).hasAttribute("min");
                    var min = has_min ? parseInt($(this).attr('min')) : 1;

                    if (value < min) {

                        $qty.addClass('xt_atc-error');
                        errors++;
                    }
                })
            }

            // https://woocommerce.com/products/product-add-ons/
            var $elements = form.find('.wc-pao-required-addon, .required-product-addon');

            // https://codecanyon.net/item/woocommerce-extra-product-options/7908619
            $elements = $.merge(
                $elements,
                form.find('.tm-has-required + div.tm-extra-product-options-container').not('.tc-hidden div.tm-extra-product-options-container')
            );

            // https://wordpress.org/plugins/woocommerce-product-addon/
            $elements = $.merge(
                $elements,
                form.find('.ppom-field-wrapper .show_required').closest('.form-group')
            );

            // https://woocommerce.com/products/gravity-forms-add-ons/
            $elements = $.merge(
                $elements,
                form.find('.gfield_contains_required')
            );

            $elements.each(function () {

                var $row = $(this);

                if ($row.is(':visible')) {
                    var $input = $row.find(':input');

                    if ($input.attr('type') === 'checkbox' || $input.attr('type') === 'radio') {
                        $row.removeClass('xt_atc-error');
                        if (!$input.is(':checked')) {
                            errors++;
                            $row.addClass('xt_atc-error');
                        }
                    } else {
                        $row.removeClass('xt_atc-error');
                        if ($input.val() === '') {
                            errors++;
                            $row.addClass('xt_atc-error');
                        }
                    }
                } else {
                    $row.removeClass('xt_atc-error');
                }
            });

            if (errors > 0) {
                var $firstError = form.find('.xt_atc-error').first();
                var $scrollElm = maybeInQuickView(trigger) ? form : $('html,body');

                if ($firstError.length) {
                    $scrollElm.animate({scrollTop: $firstError.offset().top - 100}, 500);
                }
            }

            return (errors === 0);
        }

        function skipSingleAddToCart(trigger) {

            if(trigger.closest('.wc-product-table').length) {
                return true;
            }

            if(!XT_ATC.ajaxSinglePageAddToCart && isSingleProductPage(trigger)) {
                return true;
            }

            return false;
        }

        function isButtonLoading(trigger) {

            return !!trigger.data('loading');
        }

        function isButtonDisabled(trigger) {

            return trigger.hasClass('disabled');
        }

        function startButtonLoader(trigger) {

            trigger.data('loading', true);
            trigger.removeClass('added loading');

            if (XT_ATC.overrideSpinner) {

                if (startButtonLoaderTimeout) {
                    clearTimeout(startButtonLoaderTimeout);
                }

                var trigger_html = trigger.html();

                var computedStyles = window.getComputedStyle(trigger.get(0));

                var trigger_color = computedStyles.color;
                var trigger_width = computedStyles.width;
                var trigger_height = computedStyles.height;

                trigger.data('html', trigger_html);
                trigger.addClass('xt_atc-loading');

                trigger.css({
                    color: trigger_color,
                    width: trigger_width,
                    height: trigger_height
                });

                var $spinnerWrap = trigger.find('.xt_atc-button-spinner-wrap');
                var $spinner;

                if ($spinnerWrap.length === 0) {
                    $spinnerWrap = $('<span class="xt_atc-button-spinner-wrap"></span>');
                    $spinner = $('<span class="xt_atc-button-spinner ' + XT_ATC.spinnerIcon + '"></span>');
                    $spinnerWrap.html($spinner);
                    trigger.html($spinnerWrap);
                } else {
                    $spinner = $spinnerWrap.find('.xt_atc-button-spinner');
                    $spinner.removeClass(XT_ATC.checkmarkIcon).addClass(XT_ATC.spinnerIcon);
                }

                startButtonLoaderTimeout = setTimeout(function () {
                    $spinnerWrap.addClass('xt_atc-button-spinner-ready');
                }, 5);

            }else{

                trigger.addClass('loading');
            }
        }

        function stopButtonLoader(trigger) {

            if (XT_ATC.overrideSpinner) {

                if (stopButtonLoaderTimeout) {
                    clearTimeout(stopButtonLoaderTimeout);
                }

                var $spinnerWrap = trigger.find('.xt_atc-button-spinner-wrap');

                // remove spinner
                if ($spinnerWrap.length) {

                    $spinnerWrap.removeClass('xt_atc-button-spinner-ready');

                    var $spinner = $spinnerWrap.find('.xt_atc-button-spinner');

                    var resetStyles = {
                        width: '',
                        height: ''
                    };

                    stopButtonLoaderTimeout = setTimeout(function () {

                        // add checkmark
                        $spinner.removeClass(XT_ATC.spinnerIcon).addClass(XT_ATC.checkmarkIcon);
                        $spinnerWrap.addClass('xt_atc-button-spinner-ready');

                        setTimeout(function () {

                            trigger.html(trigger.data('html'));

                            trigger.removeClass('xt_atc-loading').addClass('added');
                            trigger.removeData('loading');

                            trigger.css(resetStyles);

                        }, 2000);

                    }, 300);
                }

            } else {

                trigger.removeClass('loading').addClass('added');
                trigger.removeData('loading');
            }
        }

        function singleAddToCart(trigger) {

            trigger.removeClass('added');

            var form = trigger.closest('form');
            var args = form.serializeJSON();

            if (typeof args === 'string') {
                args = $.parseJSON(args);
            }

            if (typeof args === 'object') {
                args['add-to-cart'] = form.find('[name="add-to-cart"]').val();
            }

            $(document.body).trigger('xt_atc_single_adding_to_cart', [trigger, form]);
            $(form).trigger('xt_atc_single_adding_to_cart', [trigger]);

            startButtonLoader(trigger);

            //update cart product list
            var params = {
                action: 'xt_atc_add_to_cart',
            };

            params = $.extend(params, args);

            $.XT_Ajax_Queue({

                url: XT_ATC.ajaxUrl.toString().replace('%%endpoint%%', 'xt_atc_single'),
                data: params,
                type: 'post'

            }).done(function(data) {

                onSingleAddedToCart(data, trigger, form);
            });

        }

        function onSingleAddedToCart(data, trigger, form) {

            stopButtonLoader(trigger);

            $.each( data.fragments, function( key, value ) {

                $(key).replaceWith(value);
            });

            // Redirect to cart option
            if (XT_ATC.redirectionEnabled) {
                window.location = XT_ATC.redirectionTo;
                return;
            }

            if ( !isSingleProductPage(trigger) && !maybeInQuickView(trigger) && !wc_add_to_cart_params.is_cart && trigger.parent().find( '.added_to_cart' ).length === 0 ) {
                trigger.after( '<a href="' + wc_add_to_cart_params.cart_url + '" class="added_to_cart wc-forward" title="' + wc_add_to_cart_params.i18n_view_cart + '">' + wc_add_to_cart_params.i18n_view_cart + '</a>' );
            }

            $(document.body).trigger('xt_atc_single_added_to_cart', [data, trigger, form]);

            maybeScrollToNotice(trigger);
        }

        function maybeInQuickView(trigger) {

            var maybeQuickViewContainer = trigger.closest('.single-product');
            return maybeQuickViewContainer.length > 0 && (maybeQuickViewContainer.prop('tagName') !== 'BODY');
        }

        function maybeInProductList(trigger) {

            var maybeProductListContainer = trigger.closest('.products');
            return maybeProductListContainer.length > 0;
        }

        function isSingleProductPage(trigger) {

            return (maybeInQuickView(trigger) || maybeInProductList(trigger)) ? false : XT_ATC.isProductPage;
        }

        function maybeScrollToNotice(trigger) {

            var wooNotices = $('.woocommerce-notices-wrapper')

            if(isSingleProductPage(trigger) && wooNotices.length && XT_ATC.singleScrollToNotice) {

                // If cart has errors, scroll to error
                setTimeout(function () {

                    $('html,body').animate({scrollTop: wooNotices.offset().top - 100}, 500);

                }, (XT_ATC.singleScrollToNoticeTimeout + 500));
            }
        }

        init();

    });

})( jQuery, window );