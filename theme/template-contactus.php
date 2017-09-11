<?php
/**
 * The template for displaying the homepage.
 *
 * This page template will display any functions hooked into the `homepage` action.
 * By default this includes a variety of product displays and the page content itself. To change the order or toggle these components
 * use the Homepage Control plugin.
 * https://wordpress.org/plugins/homepage-control/
 *
 * Template name: Contact Us
 *
 * @package storefront
 */

get_header(); ?>

<?php
/*SETUP THE ARRAYS*/

     $image_wallpanel=array(
        wp_get_attachment_image_src(724, "full"),   /*our showroom*/
     );

?>
    
<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<div class="maxwidth">
            <?php do_action( 'storefront_content_top' ); ?><!--breadcrumb-->
		</div><!-- .maxwidth -->
	
			
        <div class="contactus">
			<div class="mainbox_1">
				<div class="contactus-banner"> <!-- use same class from about-us page -->
					<div class="banner-image"><img src="<?php echo $image_wallpanel[0][0]; ?>" alt="image"/></div>
					<div class="banner-text">
						<h1 class="cat-header">Showroom</h1>
						<p class="cat-body">
						518 East Kent Ave South<br>Vancouver, BC, Canada<br>V5X 4V6
						</p>
					</div>
				</div>
			</div><!-- .mainbox1 -->
			
			<!--<div class="mainbox2">
			<div class="maxwidth">
				<h1 class="font-header">Our Dealers</h1>
				<div class="banner-dealer">
					<div class="dealerbox"><p class="font-body-1"> 518 East Kent Avenue<br>Vancouver . BC . Canada<br>VSX 4V6</p></div>
					<div class="dealerbox"><p class="font-body-1"> 518 East Kent Avenue<br>Vancouver . BC . Canada<br>VSX 4V6</p></div>
					<div class="dealerbox"><p class="font-body-1"> 518 East Kent Avenue<br>Vancouver . BC . Canada<br>VSX 4V6</p></div>
				</div>
			</div><!-- .maxwidth -->
			<!--</div>--><!-- .mainbox2 -->
			
              
			<div class="mainbox_3">
				<div class="interested-box">
					<h1 class="cat-header">Interested in becoming a dealer?</h1>
					<p class="cat-body">Contact for more information!</p>
				</div>
			</div><!-- .mainbox3 -->
			
			<div class="mainbox_4">
			<div class="maxwidth">
                    <div class="contactus-form">
                        <h1 class="cat-header">Email AKUSTUS</h1>
						<p class="cat-body">Any questions or comments? We'd love to help!</p>
                        <div class="contactus-form-ninja"> <?php ninja_forms_display_form( 1 );?></div>
                    </div>
            </div><!-- .maxwidth -->
			</div><!-- .mainbox4 -->

		</div><!--.contactus-->

	</main><!-- #main -->

</div><!-- #primary -->

<?php
get_footer();