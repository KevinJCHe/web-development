<?php
/**
 * The template for displaying the About Us page.
 *
 *
 * Template name: Coming Soon
 *
 * @package storefront
 */

get_header(); ?>

<?php
 $image_aboutus=array(
        wp_get_attachment_image_src(716, "full") //coming soon
		);
?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		
			<?php do_action( 'storefront_content_top' ); ?><!--breadcrumb-->
		 
			<div class="comingsoon">
				<h1 class="cat-header">Something new is coming! <br> Please come back soon!</br></h1>
				<div class ="comingsoon-img"><img src="<?php echo $image_aboutus[0][0]; ?>" alt="image"/></div>
				<p class="cat-body">If you would like to get notified when it launches, please enter your email address below. </p>     
			</div>
	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();