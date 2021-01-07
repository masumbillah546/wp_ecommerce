<?php get_header();?>

<div class="container">

	<nav class="breadcrumb-section theme1 bg-lighten2 pt-40 pb-40">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title text-center mb-15">
                	<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
                    <h2 class="title text-dark text-capitalize"><?php the_title(); ?></h2>
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

	<?php while( have_posts() ) {
				the_post(); 

 the_content();

}


//get_sidebar();

 ?></div>

<?php get_footer();?>