<?php

//  fontawesome,bootstrap,plugins and main style css

function load_stylesheets(){

	wp_register_style('stylesheet1', get_template_directory_uri()."/assets/css/fontawesome.min.css");
	wp_register_style('stylesheet2', get_template_directory_uri()."/assets/css/ionicons.min.css");
	wp_register_style('stylesheet3', get_template_directory_uri()."/assets/css/simple-line-icons.css");
	wp_register_style('stylesheet4', get_template_directory_uri()."/assets/css/plugins/jquery-ui.min.css");
	wp_register_style('stylesheet5', get_template_directory_uri()."/assets/css/bootstrap.min.css");
	wp_register_style('stylesheet6', get_template_directory_uri()."/assets/css/plugins/plugins.css");
	wp_register_style('stylesheet7', get_template_directory_uri()."/assets/css/style.min.css");

	wp_enqueue_style('stylesheet1');
	wp_enqueue_style('stylesheet2');
	wp_enqueue_style('stylesheet3');
	wp_enqueue_style('stylesheet4');
	wp_enqueue_style('stylesheet5');
	wp_enqueue_style('stylesheet6');
	wp_enqueue_style('stylesheet7');
	wp_enqueue_style('style',get_stylesheet_uri('style.css'));
	wp_enqueue_script('jQuery');
	wp_enqueue_script('shoppingcart', get_template_directory_uri()."/assets/js/shoppingcart-main.js");
}

add_action('wp_enqueue_scripts','load_stylesheets');



// add menu
add_theme_support('menus');
add_theme_support('widgets');

add_theme_support('post-thumbnails');


//Register Menu Location
register_nav_menus( [ 
	'primary' => __( 'Primary Menu' ),
	'social_menu' => __( 'Social Menu' )
] );


//slider
function slider(){


	$args= array(
	//'post_type' => 'slider',
	'label' => 'Sliders',
	'description' => 'Hold our Slider entries',
	'public' => true,
	'menu_position' => 5,
	'supports' => array('title','thumbnail', 'editor', 'revisions'),
	'has_archive' => true

	);

	register_post_type('sliders',$args);

}

add_action('after_setup_theme', 'slider');




/**
 * Add a sidebar.
 */
function home() {
    register_sidebar( array(
        'name'          => __( 'Home_page Sidebar', 'textdomain' ),
        'id'            => 'home_page_sidebar',
        'description'   => __( 'Widgets home_page_sidebar', 'textdomain' ),
        'before_widget' => '<div class="search-filter">
                        <div class="check-box-inner pt-0">',
        'after_widget'  => '</div></div></br></br>',
        'before_title'  => '<h4 class="title">',
        'after_title'   => '</h4>',
    ) );
}
add_action( 'widgets_init', 'home' );




/**
 * Add a sidebar.
 */
function tag() {
    register_sidebar( array(
        'name'          => __( 'Home_page Sidebar2', 'textdomain' ),
        'id'            => 'tag',
        'description'   => __( 'Widgets home_page_sidebar', 'textdomain' ),
        'before_widget' => ' <div class="product-widget mb-60 mt-30">',
        'after_widget'  => '</div></div></br></br>',
        'before_title'  => '<h4 class="title">',
        'after_title'   => '</h4>',
    ) );
}
add_action( 'widgets_init', 'tag' );

/**
 * Add a sidebar filter.
 */
function footer() {
    register_sidebar( array(
        'name'          => __( 'footer Sidebar2 filter', 'textdomain' ),
        'id'            => 'footers',
        'description'   => __( 'Widgets home_page_sidebar', 'textdomain' ),
        'before_widget' => '<div class="col-12 col-md-6 col-lg-2 mb-30">
                    <div id="jfooter" class="footer-widget">',
        'after_widget'  => '</div></div>',
        'before_title'  => '<div class="border-bottom cbb1 mb-25">
                            <div class="section-title pb-20">
                                <h2 class="title text-dark text-uppercase">',
        'after_title'   => '</h2>
                            </div>
                        </div>',
    ) );
}
add_action( 'widgets_init', 'footer' );



function footer2() {
    register_sidebar( array(
        'name'          => __( 'footer2 Sidebar2 filter', 'textdomain' ),
        'id'            => 'footer2',
        'description'   => __( 'Widgets home_page_sidebar', 'textdomain' ),
        'before_widget' => '<div class="col-12 col-md-6 col-lg-4 mb-30">
                    <div class="footer-widget">',
        'after_widget'  => '</div></div>',
        'before_title'  => '<div class="border-bottom cbb1 mb-25"><div class="section-title pb-20"><h2 class="title text-dark text-uppercase">',
        'after_title'   => '</h2></div></div>',
    ) );
}
add_action( 'widgets_init', 'footer2' );








/* Header Right WooCommerce Cart and WishList Icon */
add_action ('shoppingcart_cart_wishlist_icon_display','shoppingcart_cart_wishlist_icon');

function shoppingcart_cart_wishlist_icon(){

	if ( class_exists( 'woocommerce' ) ) { ?>
		<div class="cart-box">
			<div class="sx-cart-views">
				<a href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="wcmenucart-contents">
					<i class="fa fa-shopping-basket"></i>
					<span class="cart-value"><?php echo wp_kses_data ( WC()->cart->get_cart_contents_count() ); ?></span>
				</a>
				<div class="my-cart-wrap">
					<div class="my-cart"><?php esc_html_e('Total', 'shoppingcart'); ?></div>
					<div class="cart-total"><?php echo wp_kses_data( WC()->cart->get_cart_subtotal() ); ?></div>
				</div>
			</div>
			
			<?php the_widget( 'WC_Widget_Cart', '' ); ?>
		</div> <!-- end .cart-box -->
	<?php }

	if ( function_exists( 'YITH_WCWL' ) ) {

		$wishlist_url = YITH_WCWL()->get_wishlist_url(); ?>
		<div class="wishlist-box">
			<div class="wishlist-wrap">
				<a class="wishlist-btn" href="<?php echo esc_url( $wishlist_url ); ?>">
					<i class="fa fa-heart-o"> </i>
					<span class="wl-counter"><?php echo absint( yith_wcwl_count_products() ); ?></span>
				</a>
			</div>
		</div> <!-- end .wishlist-box -->

	<?php }

}





function custom_search_form( $form ) {
  $form = '<form role="search" method="get" id="searchform" class="searchform form-inline position-relative" action="' . home_url( '/' ) . '" >
    <div class="custom-search-form"><label class="screen-reader-text" for="s">' . __( 'Search:' ) . '</label>
    <input placeholder="Enter your search key ..." type="text" class="form-control theme1-border" value="' . get_search_query() . '" name="s" id="s" />
    <button class="btn bg-dark search-btn btn-rounded" type="submit" id="searchsubmit" value="'. esc_attr__( 'Search' ) .'" ><i class="icon-magnifier"></i></button>
  </div>
  </form>';

  return $form;
}

add_filter( 'get_search_form', 'custom_search_form', 100 );







// function mytheme_add_woocommerce_support() {
//     add_theme_support( 'woocommerce' );
// }

// add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );


require_once('woocommerce/functions.php');


/**
 * Change several of the breadcrumb defaults
 */
add_filter( 'woocommerce_breadcrumb_defaults', 'jk_woocommerce_breadcrumbs' );
function jk_woocommerce_breadcrumbs() {
    return array(
            'delimiter'   => '',
            'wrap_before' => '<ol class="breadcrumb bg-transparent m-0 p-0 align-items-center justify-content-center">',
            'wrap_after'  => '</ol>',
            'before'      => '<li class="breadcrumb-item active" aria-current="page">',
            'after'       => '</li>',
            'home'        => _x( 'Home', 'breadcrumb', 'woocommerce' ),
        );
}

/**
 * Remove the breadcrumbs 
 */

function woo_remove_wc_breadcrumbs() {
  //  remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
}

add_action( 'init', 'woo_remove_wc_breadcrumbs' );



function woocommerce_result_count2() {
   // remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20, 0 );
}

add_action( 'init', 'woocommerce_result_count2' );

function woocommerce_catalog_ordering2() {
    //remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30, 0 );
}

add_action( 'init', 'woocommerce_catalog_ordering2' );




//unhook

// remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
// remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

// add_action('woocommerce_before_main_content', 'my_theme_wrapper_start', 10);
// add_action('woocommerce_after_main_content', 'my_theme_wrapper_end', 10);


//hook

// function my_theme_wrapper_start() {
//     echo '<section id="main">';
// }

// function my_theme_wrapper_end() {
//     echo '</section>';
// }





add_filter( 'woocommerce_add_to_cart_fragments', 'misha_add_to_cart_fragment' );
 
function misha_add_to_cart_fragment( $fragments ) {
 
	//global $woocommerce;
 
	$fragments['.misha-cart'] = '<a href="' . wc_get_cart_url() . '" class="misha-cart"><span class="badge  cbdg1">'. WC()->cart->cart_contents_count . '</span></a>';
 	return $fragments;
 
 }


//pagination

    function custom_pagination() {
    global $wp_query;
    $big = 999999999;
    $pages = paginate_links(array(
        'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
        'format' => '?page=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages,
        'prev_next' => false,
        'type' => 'array',
        'prev_next' => TRUE,
        'prev_text' => '<i class="ion-chevron-left"></i>',
        'next_text' => '<i class="ion-chevron-right"></i>',
            ));
    if (is_array($pages)) {
        $current_page = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
        echo '<ul class="pagination justify-content-center">';
        foreach ($pages as $i => $page) {
            if ($current_page == 1 && $i == 0) {
                echo "<li class='page-item active'><a class='page-link'>$page</a></li>";
            } else {
                if ($current_page != 1 && $current_page == $i) {
                    echo "<li class='page-item active'><a class='page-link'>$page</a></li>";
                } else {
                    echo "<li class='page-item'>$page</li>";
                }
            }
        }
        echo '</ul>';
    }
}





function r_p(){
	remove_action( 'woocommerce_after_shop_loop', 'woocommerce_pagination', 10 );
	//remove_action( 'get_pagenum_link');

}

add_action('init','r_p');








//add_action( 'woocommerce_archive_description', 'woocommerce_product_archive_description', 10 );

add_theme_support('yith-woocommerce-quick-view');


function quick_view($id){
    echo '<a href="#" class=" yith-wcqv-button" data-product_id='."$id".' style="zoom: 1;">
    <span title="Quick view" class="icon-magnifier"></span></a>';
}