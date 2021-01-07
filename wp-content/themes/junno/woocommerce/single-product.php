<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); ?>





<!-- breadcrumb-section start -->
<nav class="breadcrumb-section theme1 bg-lighten2 pt-50 pb-50">
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
	//do_action( 'woocommerce_archive_description' );




                     ?>

                </div>
            </div>
            <div class="col-12">
               
                    
                    <?php do_action( 'woocommerce_before_main_content' );?>
              
            </div>
        </div>
    </div>
</nav>
<div class="product-tab bg-white pt-80 pb-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 mb-30">







		<?php while ( have_posts() ) : ?>
			<?php the_post(); ?>

			<?php wc_get_template_part( 'content', 'single-product' ); ?>

		<?php endwhile; // end of the loop. ?>

	<?php

		/**
		 * woocommerce_after_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		//do_action( 'woocommerce_after_main_content' );
	?>
</div>





	<div class="col-lg-3 mb-30 order-lg-first">
                <aside class="left-sidebar theme1">

                	<!-- <div class="search-filter">
                        <div class="check-box-inner pt-0">
                            <h4 class="title">Bags &amp; Shoes</h4>
                        </div></div> -->
                   
<?php dynamic_sidebar('home_page_sidebar'); ?>
<?php dynamic_sidebar('tag'); ?>
                    <!-- <div class="search-filter">
                        <div class="check-box-inner pt-0">
                            <h4 class="title">Bags &amp; Shoes</h4>
                        </div>

                    </div>

                    <ul id="offcanvas-menu2" class="blog-ctry-menu">
                        <li><a href="javascript:void(0)">Shoes</a>
                            <ul class="category-sub-menu">
                                <li><a href="#">Women Shoes</a></li>
                                <li><a href="#">Men Shoes</a></li>
                                <li><a href="#">Boots</a></li>
                                <li><a href="#">Casual Shoes</a></li>
                                <li><a href="#">Flip Flops</a></li>
                            </ul>

                        </li>
                        <li><a href="javascript:void(0)">Luggage &amp; Bags</a>
                            <ul class="category-sub-menu">
                                <li><a href="#">Stylish Backpacks</a></li>
                                <li><a href="#">Shoulder Bags</a></li>
                                <li><a href="#">Crossbody Bags</a></li>
                                <li><a href="#">Briefcases</a></li>
                                <li><a href="#">Luggage &amp; Travel</a></li>
                            </ul>
                        </li>
                        <li><a href="javascript:void(0)">Accessories</a>
                            <ul class="category-sub-menu">
                                <li><a href="#">Cosmetic Bags &amp; Cases</a></li>
                                <li><a href="#">Wallets &amp; Card Holders</a></li>
                                <li><a href="#">Luggage Covers</a></li>
                                <li><a href="#">Passport Covers</a></li>
                                <li><a href="#">Bag Parts &amp; Accessories</a></li>
                            </ul>
                        </li>
                    </ul>

                    <div class="search-filter">
                        <form action="#">
                            <div class="check-box-inner mt-10">
                                <h4 class="title">Filter By</h4>
                                <h4 class="sub-title pt-10">Categories</h4>
                                <div class="filter-check-box">
                                    <input type="checkbox" id="20820">
                                    <label for="20820">Digital Cameras <span>(13)</span></label>
                                </div>
                                <div class="filter-check-box">
                                    <input type="checkbox" id="20821">
                                    <label for="20821">Camcorders <span>(13)</span></label>
                                </div>
                                <div class="filter-check-box">
                                    <input type="checkbox" id="20822">
                                    <label for="20822">Camera Drones<span>(13)</span></label>
                                </div>
                            </div>
                          

                            <div class="check-box-inner mt-10">
                                <h4 class="sub-title">Price</h4>
                                <div class="price-filter mt-10">
                                    <div class="price-slider-amount">
                                        <input type="text" id="amount" name="price" readonly
                                            placeholder="Add Your Price" />
                                    </div>
                                    <div id="slider-range"></div>
                                </div>
                            </div>
                            <div class="check-box-inner mt-10">
                                <h4 class="sub-title">Size</h4>
                                <div class="filter-check-box">
                                    <input type="checkbox" id="test9">
                                    <label for="test9">s <span>(2)</span></label>
                                </div>
                                <div class="filter-check-box">
                                    <input type="checkbox" id="test10">
                                    <label for="test10">m <span>(2)</span></label>
                                </div>
                                <div class="filter-check-box">
                                    <input type="checkbox" id="test11">
                                    <label for="test11">l <span>(2)</span></label>
                                </div>
                                <div class="filter-check-box">
                                    <input type="checkbox" id="test12">
                                    <label for="test12">xl <span>(2)</span></label>
                                </div>
                            </div>
                           

                            <div class="check-box-inner mt-10">
                                <h4 class="sub-title">color</h4>
                                <div class="filter-check-box color-grey">
                                    <input type="checkbox" id="20826">
                                    <label for="20826">grey <span>(4)</span></label>
                                </div>
                                <div class="filter-check-box color-white">
                                    <input type="checkbox" id="20827">
                                    <label for="20827">white <span>(3)</span></label>
                                </div>
                                <div class="filter-check-box color-black">
                                    <input type="checkbox" id="20828">
                                    <label for="20828">black <span>(6)</span></label>
                                </div>
                                <div class="filter-check-box color-camel">
                                    <input type="checkbox" id="20829">
                                    <label for="20829">camel <span>(2)</span></label>
                                </div>
                            </div>
                         

                            <div class="check-box-inner mt-10">
                                <h4 class="sub-title">Brand</h4>
                                <div class="filter-check-box">
                                    <input type="checkbox" id="20824">
                                    <label for="20824">Graphic Corner<span>(5)</span></label>
                                </div>
                                <div class="filter-check-box">
                                    <input type="checkbox" id="20825">
                                    <label for="20825">Studio Design<span>(8)</span></label>
                                </div>
                            </div>
                        </form>
                    </div>
                

                    <div class="product-widget mb-60 mt-30">
                        <h3 class="title">Product Tags</h3>
                        <ul class="product-tag d-flex flex-wrap">
                            <li><a href="#">shopping</a></li>
                            <li><a href="#">New products</a></li>
                            <li><a href="#">Accessories</a></li>
                            <li><a href="#">sale</a></li>
                        </ul>
                    </div>
                   

                    <div class="banner hover-animation position-relative overflow-hidden">
                        <a href="shop-grid-4-column.html" class="d-block">
                            <img src="<?php echo get_template_directory_uri();?>/assets/img/banner/2.jpg" alt="img">
                        </a>
                    </div> -->
                

                </aside>
    </div>





</div></div>

	<?php
		/**
		 * woocommerce_sidebar hook.
		 *
		 * @hooked woocommerce_get_sidebar - 10
		 */
		//do_action( 'woocommerce_sidebar' );
	?>

<?php
get_footer( 'shop' );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
