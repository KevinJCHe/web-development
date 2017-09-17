<?php
/**
 * The template for displaying the homepage.
 *
 * This page template will display any functions hooked into the `homepage` action.
 * By default this includes a variety of product displays and the page content itself. To change the order or toggle these components
 * use the Homepage Control plugin.
 * https://wordpress.org/plugins/homepage-control/
 *
 * Template name: WallPanel
 *
 * @package storefront
 */

get_header(); ?>

<?php
/*SETUP THE ARRAYS*/

     $image_wallpanel=array(
        wp_get_attachment_image_src(549, 'full'),

        /*For tablet images*/
        wp_get_attachment_image_src(456, 'full')
     );
?>

<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

            <?php do_action( 'storefront_content_top' ); ?><!--breadcrumb-->

            <?php 
                $name='wall-panel'; 
                
                $ProductSortedBy=product_search_bar($name);
                
                if(empty($ProductSortedBy))
                    $ProductSortedBy = array( 'post_type' => 'product', 'posts_per_page' => -1, 'product_cat' => $name, 'orderby' => 'date', 'order' => 'desc'); /*Defualt Sort*/
            ?>

            <?php product_category_display($ProductSortedBy); ?>

        </main><!-- #main -->

        <!--TABLET CHANGES (INCLUDING HOVER EFFECT)-->
        <?php product_category_mobile(); ?><!--WHY I PUT THIS HERE: IN CSS I PUT #main > * {display: inline-block}. THIS INCLUDES <SCRIPT> TAG. IT WILL PRINT OUT THE JAVASCRIPT ON THE SITE-->

</div><!-- #primary -->

<?php
get_footer();