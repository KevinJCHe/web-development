<?php
/**
 * Template used to display post content. THIS IS FOR A INDIVIDUAL SEARCH RESULT ITEM!!!
 *
 * @package storefront
 */

?>

<?php 
        $product = new WC_product(get_the_ID());                                    /*https://docs.woocommerce.com/wc-apidocs/class-WC_Product.html*/
        $img_id = $product->get_image_id();
        $image=wp_get_attachment_image_src($img_id, 'shop_single');
        $product_title = $product->get_title();
        $product_url= get_permalink(get_the_ID());
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    
    <h2><?php echo $product_title; ?></h2>
    <a href="<?php echo $product_url; ?>"><img src="<?php echo $image[0]; ?>" alt="image" /></a>

	<?php
	/**
	 * Functions hooked in to storefront_loop_post action.
	 *
	 * @hooked storefront_post_header          - 10
	 * @hooked storefront_post_meta            - 20
	 * @hooked storefront_post_content         - 30
	 * @hooked storefront_init_structured_data - 40
	 */
	//do_action( 'storefront_loop_post' );
	?>

</article><!-- #post-## -->
