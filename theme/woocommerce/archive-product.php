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
 * @see 	    https://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); ?>

<?php 
$image_pro=array(
        wp_get_attachment_image_src(434, "full"),       /*Top Banner*/
        wp_get_attachment_image_src(894, "full"),       /*Wall Panel*/
        wp_get_attachment_image_src(897, "full"),       /*Ceiling Tiles*/
        wp_get_attachment_image_src(896, "full"),       /*Ceiling Baffles*/
        wp_get_attachment_image_src(893, "full"),       /*Wall coverings*/
        wp_get_attachment_image_src(898, "full"),       /*Dividers/Screens*/
        wp_get_attachment_image_src(895, "full")        /*Acoustic Furniture*/
);
?>

<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

        <?php do_action( 'storefront_content_top' ); ?><!--breadcrumb-->

            <ul class="product-page">
                <li>
                    <a href="<?php echo esc_url( get_page_link( 166 )); ?>">
                        <img src="<?php echo $image_pro[1][0]; ?>" alt="image"/>
                    </a>
                </li>
                <li>
                    <a href="<?php echo esc_url( get_page_link( 170 )); ?>">
                        <img src="<?php echo $image_pro[2][0]; ?>" alt="image"/>
                    </a>
                </li>
                <li>
                    <a href="<?php echo esc_url( get_page_link( 174 )); ?>">
                        <img src="<?php echo $image_pro[3][0]; ?>" alt="image"/>
                    </a>
                </li>
                <li>
                    <a href="<?php echo esc_url( get_page_link( 179 )); ?>">
                        <img src="<?php echo $image_pro[4][0]; ?>" alt="image"/>
                    </a>
                </li>
                <li>
                    <a href="<?php echo esc_url( get_page_link( 177 )); ?>">
                        <img src="<?php echo $image_pro[5][0]; ?>" alt="image"/>
                    </a>
                </li>
                <li>
                    <a href="<?php echo esc_url( get_page_link( 172 )); ?>">
                        <img src="<?php echo $image_pro[6][0]; ?>" alt="image"/>
                    </a>
                </li>
            </ul>

        </main><!-- #main -->
</div><!-- #primary -->


<?php
		/**
		 * woocommerce_before_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 *
		do_action( 'woocommerce_before_main_content' );
	
		/**
		 * woocommerce_before_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 *
		do_action( 'woocommerce_before_main_content' );
	
        if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>

			<h1 class="page-title"><?php woocommerce_page_title(); ?></h1>

		<?php endif; 

			/**
			 * woocommerce_archive_description hook.
			 *
			 * @hooked woocommerce_taxonomy_archive_description - 10
			 * @hooked woocommerce_product_archive_description - 10
			 *
			do_action( 'woocommerce_archive_description' );
		 
            if ( have_posts() ) : 
		
				/**
				 * woocommerce_before_shop_loop hook.
				 *
				 * @hooked woocommerce_result_count - 20
				 * @hooked woocommerce_catalog_ordering - 30
				 *
				 do_action( 'woocommerce_before_shop_loop' );
			
                woocommerce_product_loop_start(); 

				woocommerce_product_subcategories(); 

				while ( have_posts() ) : the_post(); 

					wc_get_template_part( 'content', 'product' ); 

			    endwhile; // end of the loop.

			        woocommerce_product_loop_end();

				/**
				 * woocommerce_after_shop_loop hook.
				 *
				 * @hooked woocommerce_pagination - 10
				 *
				do_action( 'woocommerce_after_shop_loop' );
			

		    elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) :

			wc_get_template( 'loop/no-products-found.php' );

		    endif; 

		/**
		 * woocommerce_after_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 *
		do_action( 'woocommerce_after_main_content' );
	
		/**
		 * woocommerce_sidebar hook.
		 *
		 * @hooked woocommerce_get_sidebar - 10
		 *
		do_action( 'woocommerce_sidebar' );*/ ?>
	
<?php get_footer( 'shop' ); ?>
