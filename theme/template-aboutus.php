<?php
/**
 * The template for displaying the About Us page.
 *
 *
 * Template name: About Us
 *
 * @package storefront
 */

get_header(); ?>

<?php
/*SETUP THE ARRAYS*/
     $image_aboutus=array(
        wp_get_attachment_image_src(955, "full"), //what we do 1 
        wp_get_attachment_image_src(956, "full"), //what we do 2 - keep the beauty
        wp_get_attachment_image_src(958, "full"), //Where w'ere from
		wp_get_attachment_image_src(954, "full"), //What we value 1 - Your Experiences
        wp_get_attachment_image_src(957, "full"), //What we value 2 - Our surroundings
        wp_get_attachment_image_src(959, "full"), //who we support
     );
?>
    
    <div id="primary" class="content-area">
	
		<main id="main" class="site-main" role="main">
            <?php do_action( 'storefront_content_top' ); ?><!--breadcrumb-->
			
			
			<div class="mainbox1">
				<h1 class="cat-header no-top-pad">What We Do</h1>
				<div class="aboutus-banner">
					<div class="banner-image"><img src="<?php echo $image_aboutus[0][0]; ?>" alt="image"/></div>
					<div class="banner-text">
						<h2 class="cat-sub-header">Decrease Noise</h2>
						<p class="cat-body">
						Ever tried to have a conversation with several friends but your echoey room was getting in the way? 
						That’s where we can help. We want to filter out those unnecessary noises from your room.
						</p> 
					</div>
				</div>
				<div class="aboutus-banner">
					<div class="banner-image"><img src="<?php echo $image_aboutus[1][0]; ?>" alt="image"/></div>
					<div class="banner-text">
						<h2 class="cat-sub-header">Increase Beauty</h2>
						<p class="cat-body">
						Many acoustic products are designed with only practicality in mind. However, we want to go beyond just reducing 
						noise and add something new to the equation - aesthetic.  We believe that in all aspects of life, you shouldn’t have to 
						sacrifice beauty for something that works. 
						That’s why with Akustus, you won’t have to and you’ll feel good about your spaces in more ways than one. 
						</p>
					</div>
				</div>
			</div> <!-- .mainbox1 -->
				
			<div class="mainbox2">
				<div class="maxwidth">
				<h1 class="cat-header">Where We're From</h1>
				<div class="aboutus-banner">
				<div class="banner-image"><img src="<?php echo $image_aboutus[2][0]; ?>" alt="image"/></div>
				<div class="banner-text">
					<p class="cat-body">We’re from Vancouver, and we’re proud to say that 
					Vancouver has developed a very distinct urban planning style. 
					Glass buildings that allow for a breathtaking view of the mountains, 
					or gardens and parks built to counterbalance urban expansion. 
					The way Vancouver beautifully coexists with its surroundings reminds us that 
					Akustus too should strive to maintain that balance between functionality, aesthetics and sustainability.
					</p>
				</div>
				</div>
				</div><!-- .maxwidth -->
			</div> <!-- .mainbox2 -->
				
			<div class="mainbox1">
				<h1 class="cat-header">What We Value</h1>
				<div class="aboutus-banner">
					<div class="banner-image"><img src="<?php echo $image_aboutus[3][0]; ?>" alt="image"/></div>
					<div class="banner-text">
						<h2 class="cat-sub-header">Your Experiences</h2>
						<p class="cat-body">
						Every space holds it own special experiences. Whether it’s the dining room where you 
						laugh with friends and family, or your office where you’re hard at work (or not). 
						No matter the space, we want to help you sift out unwanted sounds while creating a 
						captivating backdrop for your interactions. 
						</p>
					</div>
				</div>
				<div class="aboutus-banner">
					<div class="banner-image"><img src="<?php echo $image_aboutus[4][0]; ?>" alt="image"/></div>
					<div class="banner-text">
						<h2 class="cat-sub-header">Our Surroundings</h2>
						<p class="cat-body">
						Surrounded by nature’s allure, we do our part to protect what inspires us 
						every day — the environment. Whether it’s using green materials in our products or being smart 
						about business practices, sustainability is always one of our top priorities. 
						</p>
					</div>
				</div>
			</div> <!-- .mainbox1 -->
				
			<div class="mainbox2">
				<div class="maxwidth">
				<h1 class="cat-header">Who We Support</h1>
				<div class="aboutus-banner">
					<div class="banner-image"><img src="<?php echo $image_aboutus[5][0]; ?>" alt="image"/></div>
					<div class="banner-text">
						<p class="cat-body">
						Our mission is to help make people’s lives better, 
						but we don’t want to help just by putting a band-aid solution on a larger problem. 
						This is why we’ve partnered with locals in Vietnam to provide clean drinking water to 
						100 families in a rural village. That’s our goal, and by supporting us, you can 
						help make a long-lasting and tangible difference as well.  
						</p>
					</div>
				</div>
				</div><!--.maxwidth-->
			</div> <!-- .mainbox2 -->

        </main><!-- #main -->
</div><!-- #primary -->


<?php
get_footer();