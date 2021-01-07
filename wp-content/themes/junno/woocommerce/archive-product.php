<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */


//do_action( 'woocommerce_before_main_content' );

?>



<!-- breadcrumb-section start -->
<nav class="breadcrumb-section theme1 bg-lighten2 pt-40 pb-40">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title text-center mb-15">
                	<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
                    <h2 class="title text-dark text-capitalize"><?php woocommerce_page_title(); ?></h2>
                    <?php endif;

                    /**
	 * Hook: woocommerce_archive_description.
	 *
	 * @hooked woocommerce_taxonomy_archive_description - 10
	 * @hooked woocommerce_product_archive_description - 10
	 */
	do_action( 'woocommerce_archive_description' );




                     ?>

                </div>
            </div>
            <div class="col-12">
               
                    
                    <?php do_action( 'woocommerce_before_main_content' );?>
              
            </div>
        </div>
    </div>
</nav>

<!-- product tab start -->
<div class="product-tab bg-white pt-80 pb-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 mb-30">
                <div class="grid-nav-wraper bg-lighten2 mb-30">
                    <div class="row align-items-center">
                        <div class="col-12 col-md-6 mb-3 mb-md-0">
                            <nav class="shop-grid-nav">
                                <ul class="nav nav-pills align-items-center" id="pills-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="pills-home-tab" data-toggle="pill"
                                            href="#pills-home" role="tab" aria-controls="pills-home"
                                            aria-selected="true">
                                            <i class="fa fa-th"></i>

                                        </a>
                                    </li>
                                    <li class="nav-item mr-0">
                                        <a class="nav-link" id="pills-profile-tab" data-toggle="pill"
                                            href="#pills-profile" role="tab" aria-controls="pills-profile"
                                            aria-selected="false"><i class="fa fa-list"></i></a>
                                    </li>
                                    <li> <span class="total-products text-capitalize"><?php woocommerce_result_count(); ?></span></li>
                                </ul>
                            </nav>
                        </div>
                        <div class="col-12 col-md-6 position-relative">
                            <div class="shop-grid-button d-flex align-items-center">
                                <span class="sort-by">Sort by:</span>

                                <?php woocommerce_catalog_ordering();?>

                                <!-- <button class="btn-dropdown rounded d-flex justify-content-between" type="button"
                                    id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    Relevance <span class="ion-android-arrow-dropdown"></span>
                                </button>
                                <div class="dropdown-menu shop-grid-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="#">Relevance</a>
                                    <a class="dropdown-item" href="#"> Name, A to Z</a>
                                    <a class="dropdown-item" href="#"> Name, Z to A</a>
                                    <a class="dropdown-item" href="#"> Price, low to high</a>
                                    <a class="dropdown-item" href="#"> Price, high to low</a>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- product-tab-nav end -->
                <div class="tab-content" id="pills-tabContent">
                    <!-- first tab-pane -->
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                        aria-labelledby="pills-home-tab">
                        <div class="row grid-view theme1">




<?php


if ( woocommerce_product_loop() ) {


	/**
	 * Hook: woocommerce_before_shop_loop.
	 *
	 * @hooked woocommerce_output_all_notices - 10
	 * @hooked woocommerce_result_count - 20
	 * @hooked woocommerce_catalog_ordering - 30
	 */


	//do_action( 'woocommerce_before_shop_loop' );


	//woocommerce_product_loop_start();

	if ( wc_get_loop_prop( 'total' ) ) {
		while ( have_posts() ) {
			the_post();?>

			
			<?php

			//do_action( 'woocommerce_shop_loop' );

			//wc_get_template_part( 'content', 'product' );

			?>



                            <div class="col-sm-6 col-lg-4 col-xl-3 mb-30">
                                <div class="card product-card">
                                    <div class="card-body">
                                        <div class="product-thumbnail position-relative">
                                            <span class="badge badge-danger top-right">New</span>
                                            <a href="<?php  echo get_permalink(); ?>">
                                           <?php  woocommerce_template_loop_product_thumbnail(); ?>
                                            </a>
                                            <!-- product links -->
                                            <ul class="product-links d-flex justify-content-center">
                                                <li>
                                                    <a href="wishlist.html">
                                                        <span data-toggle="tooltip" data-placement="bottom"
                                                            title="add to wishlist" class="icon-heart"> </span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" data-toggle="modal" data-target="#compare">
                                                        <span data-toggle="tooltip" data-placement="bottom"
                                                            title="Add to compare" class="icon-shuffle"></span>
                                                    </a>
                                                </li>

                                                <?php //echo do_shortcode('[yith_quick_view product_id=”30″ type=”button” label="Quick View"]')?>
                                                <li>
                                                <?php  quick_view($product->get_id());?>
                                                </li>
                                               <!--  <li>
                                                    <a href="<?php the_permalink();?>" data-toggle="modal" data-target="#quick-view">
                                                        <span data-toggle="tooltip" data-placement="bottom"
                                                            title="Quick view" class="icon-magnifier"></span>
                                                    </a>
                                                </li> -->
                                            </ul>
                                            <!-- product links end-->
                                        </div>
                                        <div class="product-desc py-0">
                                            <h3 class="title"><a href="shop-grid-4-column.html"><?php  woocommerce_template_loop_product_title(); ?></a>
                                            </h3>
                                            <?php//  woocommerce_template_loop_rating(); ?>
                                            <!-- <div class="star-rating">
                                                <span class="ion-ios-star"></span>
                                                <span class="ion-ios-star"></span>
                                                <span class="ion-ios-star"></span>
                                                <span class="ion-ios-star"></span>
                                                <span class="ion-ios-star de-selected"></span>
                                            </div> -->
                                            <div class="d-flex align-items-center justify-content-between">
                                               <h5> <?php  woocommerce_template_loop_price(); ?></h5>
                                                <!-- <button class="" data-toggle="modal"
                                                    data-target="#add-to-cart"> --><?php  woocommerce_template_loop_add_to_cart(); ?>
                                                    <!-- <i class="icon-basket"></i> -->
                                               <!--  </button> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- product-list End -->
                            </div>


	<?php
		}
	}

	//woocommerce_product_loop_end();

	/**
	 * Hook: woocommerce_after_shop_loop.
	 *
	 * @hooked woocommerce_pagination - 10
	 */
	do_action( 'woocommerce_after_shop_loop' );
} else {
	/**
	 * Hook: woocommerce_no_products_found.
	 *
	 * @hooked wc_no_products_found - 10
	 */
	do_action( 'woocommerce_no_products_found' );
}



?>
                     
                        </div>
                    </div>
                    <!-- second tab-pane -->
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <div class="row grid-view-list theme1">


<?php


if ( woocommerce_product_loop() ) {


	/**
	 * Hook: woocommerce_before_shop_loop.
	 *
	 * @hooked woocommerce_output_all_notices - 10
	 * @hooked woocommerce_result_count - 20
	 * @hooked woocommerce_catalog_ordering - 30
	 */


	//do_action( 'woocommerce_before_shop_loop' );


	//woocommerce_product_loop_start();

	if ( wc_get_loop_prop( 'total' ) ) {
		while ( have_posts() ) {
			the_post();?>

			
			<?php

			do_action( 'woocommerce_shop_loop' );

			//wc_get_template_part( 'content', 'product' );

			?>




                            <div class="col-12 mb-30">
                                <div class="card product-card">
                                    <div class="card-body">
                                        <div class="media flex-column flex-md-row">
                                            <div class="product-thumbnail position-relative">
                                                <span class="badge badge-danger top-right">New</span>
                                                <a href="<?php  echo get_permalink(); ?>">
                                                     <?php   
                                                      echo woocommerce_template_loop_product_thumbnail(); ?>
                                                </a>
                                                <!-- product links -->
                                                <ul class="product-links d-flex justify-content-center">
                                                    <li>
                                                        <a href="wishlist.html">
                                                            <span data-toggle="tooltip" data-placement="bottom"
                                                                title="add to wishlist" class="icon-heart"> </span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#" data-toggle="modal" data-target="#compare">
                                                            <span data-toggle="tooltip" data-placement="bottom"
                                                                title="Add to compare" class="icon-shuffle"></span>
                                                        </a>
                                                    </li>

                                                    <?php //echo do_shortcode('[yith_quick_view product_id=”30″ type=”button” label=”Quick View”]')?>
                                                    <li>
                                                         <?php  quick_view($product->get_id());?>
                                                    </li>
                                                    <!-- <li>
                                                        <a href="#" data-toggle="modal" data-target="#quick-view">
                                                            <span data-toggle="tooltip" data-placement="bottom"
                                                                title="Quick view" class="icon-magnifier"></span>
                                                        </a>
                                                    </li> -->
                                                </ul>
                                                <!-- product links end-->
                                            </div>
                                            <div class="media-body pl-30">
                                                <div class="product-desc py-0">
                                                    <h3 class="title"><a href="shop-grid-4-column.html"><?php  woocommerce_template_loop_product_title(); ?></a></h3>
                                                    <div class="star-rating mb-10">
                                                        <span class="ion-ios-star"></span>
                                                        <span class="ion-ios-star"></span>
                                                        <span class="ion-ios-star"></span>
                                                        <span class="ion-ios-star"></span>
                                                        <span class="ion-ios-star de-selected"></span>
                                                    </div>
                                                    <h6 class="product-price"><?php  woocommerce_template_loop_price(); ?></h6>
                                                </div>

                                                <?php //do_action('woocommerce_archive_description');?>
                                                <!-- <ul class="product-list-des">
                                                    <li>
                                                        Block out the haters with the fresh adidas® Originals Kaval
                                                        Windbreaker
                                                        Jacket.
                                                    </li>
                                                    <li>
                                                        Part of the Kaval Collection.
                                                    </li>
                                                    <li>
                                                        Regular fit is eased, but not sloppy, and perfect for any
                                                        activity.
                                                    </li>
                                                    <li>
                                                        Plain-woven jacket specifically constructed for freedom of
                                                        movement.
                                                    </li>
                                                </ul> -->
                                              
                                                <button class="btn theme-btn--dark1 btn--xl rounded-5"
                                                    data-toggle="modal" data-target="#add-to-cart">
                                                    Add to cart
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- product-list End -->
                            </div>




	<?php
		}
	}

	//woocommerce_product_loop_end();

	/**
	 * Hook: woocommerce_after_shop_loop.
	 *
	 * @hooked woocommerce_pagination - 10
	 */
	do_action( 'woocommerce_after_shop_loop' );
} else {
	/**
	 * Hook: woocommerce_no_products_found.
	 *
	 * @hooked wc_no_products_found - 10
	 */
	do_action( 'woocommerce_no_products_found' );
}



?>



                            
                        </div>
                    </div>
                   
                </div>
                <div class="row">
                    <div class="col-12">
                        <nav class="pagination-section mt-30">
                            <div class="row align-items-center">
                             <?php // bittersweet_pagination();?>
                             <?php  custom_pagination();?>
                             <?php // pagination_nav();?>
                               <!--  <div class="col-12">
                                    <ul class="pagination justify-content-center">
                                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="#"><i class="ion-chevron-right"></i></a>
                                        </li>
                                    </ul>
                                </div> -->
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 mb-30 order-lg-first">
                <aside class="left-sidebar theme1">
                    <!-- search-filter start -->
                    <?php dynamic_sidebar('home_page_sidebar'); ?>
                    <?php dynamic_sidebar('filter'); ?>
                    <?php dynamic_sidebar('tag'); ?>

                    <!--second banner end-->
                </aside>
            </div>
        </div>
    </div>
</div>
<!-- product tab end -->












    


		





                        

                       
<?php
/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action( 'woocommerce_after_main_content' );

/**
 * Hook: woocommerce_sidebar.
 *
 * @hooked woocommerce_get_sidebar - 10
 */


















//do_action( 'woocommerce_sidebar' );

get_footer( 'shop' );
