<?php

/**
 * The Ajax functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    XT_Woo_Floating_Cart
 * @subpackage XT_Woo_Floating_Cart_Ajax/public
 * @author     XplodedThemes
 */
// If this file is called directly, abort.
if ( !defined( 'WPINC' ) ) {
    die;
}
class XT_Woo_Floating_Cart_Ajax
{
    /**
     * Core class reference.
     *
     * @since    1.0.0
     * @access   private
     * @var      XT_Woo_Floating_Cart    $core    Core Class
     */
    public function __construct( &$core )
    {
        $this->core = $core;
        // Add WC Ajax Events
        $this->core->plugin_loader()->add_filter(
            $this->core->plugin_prefix( 'wc_ajax_add_events' ),
            $this,
            'ajax_add_events',
            1,
            1
        );
        // Remove WC Ajax Events
        $this->core->plugin_loader()->add_filter(
            $this->core->plugin_prefix( 'wc_ajax_remove_events' ),
            $this,
            'ajax_remove_events',
            1,
            1
        );
        // Set Fragments
        $this->core->plugin_loader()->add_filter(
            'woocommerce_add_to_cart_fragments',
            $this,
            'cart_fragments',
            1,
            1
        );
        $this->core->plugin_loader()->add_filter(
            'woocommerce_update_order_review_fragments',
            $this,
            'cart_fragments',
            1,
            1
        );
        // Remove / Restore hooks
        $this->core->plugin_loader()->add_filter(
            'woocommerce_remove_cart_item',
            $this,
            'remove_cart_item',
            10,
            2
        );
        $this->core->plugin_loader()->add_filter(
            'woocommerce_cart_item_restored',
            $this,
            'cart_item_restored',
            10,
            2
        );
    }
    
    /**
     * Add ajax events
     */
    public function ajax_add_events( $ajax_events )
    {
        $ajax_events[] = array(
            'function' => 'xt_woofc_update_cart',
            'callback' => array( $this, 'update_cart' ),
            'nopriv'   => true,
        );
        return $ajax_events;
    }
    
    /**
     * Remove ajax events
     */
    public function ajax_remove_events( $ajax_events )
    {
        if ( xt_woo_floating_cart()->access_manager()->can_use_premium_code__premium_only() && !xt_woo_floating_cart()->frontend()->is_checkout_page() ) {
            $ajax_events[] = array(
                'function' => 'update_order_review',
                'callback' => array( WC_AJAX::class, 'update_order_review' ),
                'nopriv'   => true,
            );
        }
        return $ajax_events;
    }
    
    public function cart_fragments( $fragments )
    {
        WC()->cart->calculate_totals();
        $core = xt_woo_floating_cart();
        $customizer = $core->customizer();
        $type = ( !empty($_POST['type']) ? filter_var( $_POST['type'], FILTER_SANITIZE_STRING ) : null );
        $refresh_fragments = !empty($_GET['wc-ajax']) && ($_GET['wc-ajax'] === 'get_refreshed_fragments' || $_GET['wc-ajax'] === 'get_refreshed_fragments');
        $add_to_cart = !empty($_GET['wc-ajax']) && $_GET['wc-ajax'] === 'add_to_cart';
        $update_order_review = !empty($_GET['wc-ajax']) && $_GET['wc-ajax'] === 'update_order_review';
        $coupon_action = !empty($_GET['wc-ajax']) && ($_GET['wc-ajax'] === 'xt_woofc_apply_coupon' || $_GET['wc-ajax'] === 'xt_woofc_remove_coupon');
        $notices_selector = ( $coupon_action || $update_order_review || $refresh_fragments ? 'xt_woofc-notices-wrapper' : 'woocommerce-notices-wrapper' );
        $total = xt_woofc_checkout_total();
        $count = WC()->cart->get_cart_contents_count();
        
        if ( !empty($header_msg) || !$update_order_review ) {
            // get notices
            $notices = wc_print_notices( true );
            $fragments["." . $notices_selector] = '<div class="' . esc_attr( $notices_selector ) . '">' . $notices . '</div>';
        }
        
        
        if ( !in_array( $type, array(
            'remove',
            'undo',
            'update',
            'totals'
        ) ) && !$update_order_review && !$coupon_action || $add_to_cart ) {
            $list = $core->get_template( 'parts/cart/list', array(), true );
            $fragments['.xt_woofc-list-wrap'] = $list;
        } else {
            
            if ( in_array( $type, array( 'update' ) ) && !empty($_POST['cart_item_key']) ) {
                $cart_item_key = sanitize_text_field( $_POST['cart_item_key'] );
                $cart_item = WC()->cart->cart_contents[$cart_item_key];
                $product = xt_woofc_item_product( $cart_item, $cart_item_key );
                $vars = array(
                    'cart_item_key' => $cart_item_key,
                    'cart_item'     => $cart_item,
                    'product'       => $product,
                );
                $price = $core->get_template( 'parts/cart/list/product/price', $vars, true );
                $quantity = $core->get_template( 'parts/cart/list/product/quantity', $vars, true );
                $fragments['li[data-key="' . $cart_item_key . '"] .xt_woofc-price'] = $price;
                $fragments['li[data-key="' . $cart_item_key . '"] .xt_woofc-quantity'] = $quantity;
            }
        
        }
        
        if ( $type != 'undo' || $type === 'totals' ) {
            $fragments['.xt_woofc-checkout span.amount'] = '<span class="amount">' . $total . '</span>';
        }
        $fragments['.xt_woofc-count li:nth-child(1)'] = '<li>' . $count . '</li>';
        $fragments['.xt_woofc-count li:nth-child(2)'] = '<li>' . ($count + 1) . '</li>';
        $fragments['.xt_woofc-spinner-wrap'] = xt_woofc_spinner_html( true );
        return $fragments;
    }
    
    /**
     * Update floating cart
     */
    public function update_cart()
    {
        $type = filter_var( $_POST['type'], FILTER_SANITIZE_STRING );
        $cart_item_key = null;
        if ( !empty($_POST['cart_item_key']) ) {
            $cart_item_key = filter_var( $_POST['cart_item_key'], FILTER_SANITIZE_STRING );
        }
        
        if ( $type == 'update' && !empty($cart_item_key) ) {
            $cart_item_qty = intval( $_POST['cart_item_qty'] );
            WC()->cart->set_quantity( $cart_item_key, $cart_item_qty, true );
        } else {
            
            if ( $type == 'remove' && !empty($cart_item_key) ) {
                WC()->cart->remove_cart_item( $cart_item_key );
            } else {
                if ( $type == 'undo' && !empty($cart_item_key) ) {
                    WC()->cart->restore_cart_item( $cart_item_key );
                }
            }
        
        }
        
        WC_Ajax::get_refreshed_fragments();
    }
    
    /**
     * AJAX apply coupon on checkout page.
     */
    public function apply_coupon()
    {
        
        if ( !empty($_POST['coupon_code']) ) {
            WC()->cart->add_discount( wc_format_coupon_code( wp_unslash( $_POST['coupon_code'] ) ) );
        } else {
            wc_add_notice( WC_Coupon::get_generic_coupon_error( WC_Coupon::E_WC_COUPON_PLEASE_ENTER ), 'error' );
        }
        
        WC_Ajax::get_refreshed_fragments();
    }
    
    /**
     * AJAX remove coupon on cart and checkout page.
     */
    public function remove_coupon()
    {
        $coupon = ( isset( $_POST['coupon'] ) ? wc_format_coupon_code( wp_unslash( $_POST['coupon'] ) ) : false );
        
        if ( empty($coupon) ) {
            wc_add_notice( __( 'Sorry there was a problem removing this coupon.', 'woocommerce' ), 'error' );
        } else {
            WC()->cart->remove_coupon( $coupon );
            wc_add_notice( __( 'Coupon has been removed.', 'woocommerce' ) );
        }
        
        WC_Ajax::get_refreshed_fragments();
    }
    
    /**
     * AJAX update shipping method on cart page.
     * Override native function because the nonce check is failing if caching plugin enabled
     */
    public function update_shipping_method()
    {
        wc_maybe_define_constant( 'WOOCOMMERCE_CART', true );
        $chosen_shipping_methods = WC()->session->get( 'chosen_shipping_methods' );
        $posted_shipping_methods = ( isset( $_POST['shipping_method'] ) ? wc_clean( wp_unslash( $_POST['shipping_method'] ) ) : array() );
        if ( is_array( $posted_shipping_methods ) ) {
            foreach ( $posted_shipping_methods as $i => $value ) {
                $chosen_shipping_methods[$i] = $value;
            }
        }
        WC()->session->set( 'chosen_shipping_methods', $chosen_shipping_methods );
        WC_Ajax::get_refreshed_fragments();
    }
    
    /**
     * AJAX update order review on checkout.
     */
    public function update_order_review()
    {
        wc_maybe_define_constant( 'WOOCOMMERCE_CHECKOUT', true );
        do_action( 'woocommerce_checkout_update_order_review', ( isset( $_POST['post_data'] ) ? wp_unslash( $_POST['post_data'] ) : '' ) );
        // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized
        $chosen_shipping_methods = WC()->session->get( 'chosen_shipping_methods' );
        $posted_shipping_methods = ( isset( $_POST['shipping_method'] ) ? wc_clean( wp_unslash( $_POST['shipping_method'] ) ) : array() );
        if ( is_array( $posted_shipping_methods ) ) {
            foreach ( $posted_shipping_methods as $i => $value ) {
                $chosen_shipping_methods[$i] = $value;
            }
        }
        WC()->session->set( 'chosen_shipping_methods', $chosen_shipping_methods );
        WC()->session->set( 'chosen_payment_method', ( empty($_POST['payment_method']) ? '' : wc_clean( wp_unslash( $_POST['payment_method'] ) ) ) );
        WC()->customer->set_props( array(
            'billing_country'   => ( isset( $_POST['country'] ) ? wc_clean( wp_unslash( $_POST['country'] ) ) : null ),
            'billing_state'     => ( isset( $_POST['state'] ) ? wc_clean( wp_unslash( $_POST['state'] ) ) : null ),
            'billing_postcode'  => ( isset( $_POST['postcode'] ) ? wc_clean( wp_unslash( $_POST['postcode'] ) ) : null ),
            'billing_city'      => ( isset( $_POST['city'] ) ? wc_clean( wp_unslash( $_POST['city'] ) ) : null ),
            'billing_address_1' => ( isset( $_POST['address'] ) ? wc_clean( wp_unslash( $_POST['address'] ) ) : null ),
            'billing_address_2' => ( isset( $_POST['address_2'] ) ? wc_clean( wp_unslash( $_POST['address_2'] ) ) : null ),
        ) );
        
        if ( wc_ship_to_billing_address_only() ) {
            WC()->customer->set_props( array(
                'shipping_country'   => ( isset( $_POST['country'] ) ? wc_clean( wp_unslash( $_POST['country'] ) ) : null ),
                'shipping_state'     => ( isset( $_POST['state'] ) ? wc_clean( wp_unslash( $_POST['state'] ) ) : null ),
                'shipping_postcode'  => ( isset( $_POST['postcode'] ) ? wc_clean( wp_unslash( $_POST['postcode'] ) ) : null ),
                'shipping_city'      => ( isset( $_POST['city'] ) ? wc_clean( wp_unslash( $_POST['city'] ) ) : null ),
                'shipping_address_1' => ( isset( $_POST['address'] ) ? wc_clean( wp_unslash( $_POST['address'] ) ) : null ),
                'shipping_address_2' => ( isset( $_POST['address_2'] ) ? wc_clean( wp_unslash( $_POST['address_2'] ) ) : null ),
            ) );
        } else {
            WC()->customer->set_props( array(
                'shipping_country'   => ( isset( $_POST['s_country'] ) ? wc_clean( wp_unslash( $_POST['s_country'] ) ) : null ),
                'shipping_state'     => ( isset( $_POST['s_state'] ) ? wc_clean( wp_unslash( $_POST['s_state'] ) ) : null ),
                'shipping_postcode'  => ( isset( $_POST['s_postcode'] ) ? wc_clean( wp_unslash( $_POST['s_postcode'] ) ) : null ),
                'shipping_city'      => ( isset( $_POST['s_city'] ) ? wc_clean( wp_unslash( $_POST['s_city'] ) ) : null ),
                'shipping_address_1' => ( isset( $_POST['s_address'] ) ? wc_clean( wp_unslash( $_POST['s_address'] ) ) : null ),
                'shipping_address_2' => ( isset( $_POST['s_address_2'] ) ? wc_clean( wp_unslash( $_POST['s_address_2'] ) ) : null ),
            ) );
        }
        
        
        if ( isset( $_POST['has_full_address'] ) && wc_string_to_bool( wc_clean( wp_unslash( $_POST['has_full_address'] ) ) ) ) {
            WC()->customer->set_calculated_shipping( true );
        } else {
            WC()->customer->set_calculated_shipping( false );
        }
        
        WC()->customer->save();
        // Calculate shipping before totals. This will ensure any shipping methods that affect things like taxes are chosen prior to final totals being calculated. Ref: #22708.
        WC()->cart->calculate_shipping();
        WC()->cart->calculate_totals();
        // Get order review fragment.
        ob_start();
        woocommerce_order_review();
        $woocommerce_order_review = ob_get_clean();
        // Get checkout payment fragment.
        ob_start();
        woocommerce_checkout_payment();
        $woocommerce_checkout_payment = ob_get_clean();
        // Get messages if reload checkout is not true.
        $reload_checkout = ( isset( WC()->session->reload_checkout ) ? true : false );
        
        if ( !$reload_checkout ) {
            $messages = wc_print_notices( true );
        } else {
            $messages = '';
        }
        
        unset( WC()->session->refresh_totals, WC()->session->reload_checkout );
        wp_send_json( array(
            'result'    => ( empty($messages) ? 'success' : 'failure' ),
            'messages'  => $messages,
            'reload'    => ( $reload_checkout ? 'true' : 'false' ),
            'fragments' => apply_filters( 'woocommerce_update_order_review_fragments', array(
            '.woocommerce-checkout-review-order-table' => $woocommerce_order_review,
            '.woocommerce-checkout-payment'            => $woocommerce_checkout_payment,
        ) ),
        ) );
    }
    
    public function remove_cart_item( $cart_item_key, $cart )
    {
        $position = array_search( $cart_item_key, array_keys( $cart->cart_contents ) );
        WC()->session->set( 'xt_woofc_removed_position', $position );
    }
    
    public function cart_item_restored( $cart_item_key, $cart )
    {
        $bundled_product = function_exists( 'wc_pb_is_bundled_cart_item' );
        
        if ( !$bundled_product ) {
            $position = WC()->session->get( 'xt_woofc_removed_position' );
            $restored_item = $cart->cart_contents[$cart_item_key];
            array_splice(
                $cart->cart_contents,
                $position,
                0,
                array( $restored_item )
            );
            $cart->cart_contents = $this->replace_array_key( $cart->cart_contents, "0", $cart_item_key );
        }
        
        WC()->session->__unset( 'xt_woofc_removed_position' );
    }
    
    public function replace_array_key( $arr, $oldkey, $newkey )
    {
        
        if ( array_key_exists( $oldkey, $arr ) ) {
            $keys = array_keys( $arr );
            $keys[array_search( $oldkey, $keys )] = $newkey;
            return array_combine( $keys, $arr );
        }
        
        return $arr;
    }

}