<?php
/**
 * The template for displaying the About Sereno page.
 *
 *
 * Template name: About Sereno
 *
 * @package storefront
 */

get_header(); ?>

<?php
/*SETUP THE ARRAYS*/
     $image_aboutsereno=array(
	 	wp_get_attachment_image_src(967, "full"), //illustration about sereno
        wp_get_attachment_image_src(966, "full"), //sound absorbing
        wp_get_attachment_image_src(964, "full"), //100% recyclable
        wp_get_attachment_image_src(961, "full"), //non-toxic
        wp_get_attachment_image_src(963, "full"), //polyester fibre
		wp_get_attachment_image_src(965, "full"), //size
		wp_get_attachment_image_src(962, "full"), //free of offgasing
		wp_get_attachment_image_src(960, "full"), //simple maintenance
     );
?>

<div id="primary" class="content-area">

	<main id="main" class="site-main" role="main">
	
		<div class="maxwidth">
		<?php do_action( 'storefront_content_top' ); ?><!--breadcrumb-->
		</div>

		<div class="aboutsereno">
			<div class="mainbox-1">
				<h1 class="cat-header no-top-pad">About Sereno</h1>
				<p class="cat-body about-sereno-text-1">
				Ever wonder where plastic bottles go when you recycle them? Well, some of them end up as Sereno Panels.
				</p>
				<div class="about-sereno-image-1"><img src="<?php echo $image_aboutsereno[0][0]; ?>" alt="image"/></div>
			</div> <!-- .mainbox1 -->
			
			<div class="mainbox-2">
			<div class="maxwidth">
			<h1 class="cat-header">Specifications</h1>
			<div class="banner-spec">
				<div class="specbox">
					<div class="spec-image">
					<img src="<?php echo $image_aboutsereno[1][0]; ?>" alt="image" class="slide-image"/>
					</div>
					<div class="spec-text">
						<h2 class="cat-sub-header">Sound Absorbing</h2>
						<p class="cat-body">
						Sereno Panel is filled with many tiny holes that allow sound to pass through. 
						As the sound travels through, it loses energy and  the noise is dampened. 
						The result is you enjoying your conversation and music without the distraction of ambient noise. 
						</p>
					</div>
				</div>
				<div class="specbox">
					<div class="spec-image">
					<img src="<?php echo $image_aboutsereno[2][0]; ?>" alt="image" class="slide-image"/>
					</div>
					<div class="spec-text">
						<h2 class="cat-sub-header">100% Recyclable</h2>
						<p class="cat-body">
						Nothing lasts forever. But even when your Sereno Panel is at the end of its life, 
						you can rest easy knowing that in disposal you’re doing your part in being environmentally responsible.
						</p>
					</div>
				</div>
				<div class="specbox">
					<div class="spec-image">
					<img src="<?php echo $image_aboutsereno[3][0]; ?>" alt="image" class="slide-image"/>
					</div>
					<div class="spec-text">
						<h2 class="cat-sub-header">Non-toxic and Flame Retardant</h2>
						<p class="cat-body">
						Sereno is made with non toxic substances and has a Class A fire rating. That's one less thing for you to worry about.
						</p>
					</div>
				</div>
				<div class="specbox">
					<div class="spec-image">
					<img src="<?php echo $image_aboutsereno[4][0]; ?>" alt="image" class="slide-image"/>
					</div>
					<div class="spec-text">
						<h2 class="cat-sub-header">100% Polyester Fibre</h2>
						<p class="cat-body">
						With no additional chemical bindings or agents, Sereno Panel represents quality construction at its best.
						</p>
					</div>
				</div>
				<div class="specbox">
					<div class="spec-image">
					<img src="<?php echo $image_aboutsereno[5][0]; ?>" alt="image" class="slide-image"/>
					</div>
					<div class="spec-text">
						<h2 class="cat-sub-header">Size</h2>
						<p class="cat-body">
						Most Sereno Panel products come in a selection of different sizes to suit your needs.
						</p>
					</div>
				</div>
				<div class="specbox">
					<div class="spec-image">
					<img src="<?php echo $image_aboutsereno[6][0]; ?>" alt="image" class="slide-image"/>
					</div>
					<div class="spec-text">
						<h2 class="cat-sub-header">Free of Offgassing</h2>
						<p class="cat-body">
						This means Sereno Panel won’t put harmful chemicals in your air so you can breathe easy.
						</p>
					</div>
				</div>
			</div><!--.banner-spec-->
			
			<div class="swiper-container"><!--CLICKABLE FEATURE LOCATED IN FOOTER!!!!-->
				<div class="swiper-wrapper">
					<div class="specbox swiper-slide">
						<div class="spec-image">
						<img src="<?php echo $image_aboutsereno[1][0]; ?>" alt="image" class="slide-image"/>
						</div>
						<div class="spec-text">
							<h2 class="cat-sub-header">Sound Absorbing</h2>
							<p class="cat-body">
							Sereno Panel is filled with many tiny holes that allow sound to pass through. 
							As the sound travels through, it loses energy and  the noise is dampened. 
							The result is you enjoying your conversation and music without the distraction of ambient noise. 
							</p>
						</div>
					</div>
					<div class="specbox swiper-slide">
						<div class="spec-image">
						<img src="<?php echo $image_aboutsereno[2][0]; ?>" alt="image" class="slide-image"/>
						</div>
						<div class="spec-text">
							<h2 class="cat-sub-header">100% Recyclable</h2>
							<p class="cat-body">
							Nothing lasts forever. But even when your Sereno Panel is at the end of its life, 
							you can rest easy knowing that in disposal you’re doing your part in being environmentally responsible.
							</p>
						</div>
					</div>
					<div class="specbox swiper-slide">
						<div class="spec-image">
						<img src="<?php echo $image_aboutsereno[3][0]; ?>" alt="image" class="slide-image"/>
						</div>
						<div class="spec-text">
							<h2 class="cat-sub-header">Non-toxic and Flame Retardant</h2>
							<p class="cat-body">
							Sereno is made with non toxic substances and has a Class A fire rating. That's one less thing for you to worry about.
							</p>
						</div>
					</div>
					<div class="specbox swiper-slide">
						<div class="spec-image">
						<img src="<?php echo $image_aboutsereno[4][0]; ?>" alt="image" class="slide-image"/>
						</div>
						<div class="spec-text">
							<h2 class="cat-sub-header">100% Polyester Fibre</h2>
							<p class="cat-body">
							With no additional chemical bindings or agents, Sereno Panel represents quality construction at its best.
							</p>
						</div>
					</div>
					<div class="specbox swiper-slide">
						<div class="spec-image">
						<img src="<?php echo $image_aboutsereno[5][0]; ?>" alt="image" class="slide-image"/>
						</div>
						<div class="spec-text">
							<h2 class="cat-sub-header">Size</h2>
							<p class="cat-body">
							Most Sereno Panel products come in a selection of different sizes to suit your needs.
							</p>
						</div>
					</div>
					<div class="specbox swiper-slide">
						<div class="spec-image">
						<img src="<?php echo $image_aboutsereno[6][0]; ?>" alt="image" class="slide-image"/>
						</div>
						<div class="spec-text">
							<h2 class="cat-sub-header">Free of Offgassing</h2>
							<p class="cat-body">
							This means Sereno Panel won’t put harmful chemicals in your air so you can breathe easy.
							</p>
						</div>
					</div>
				</div> <!--.swiper-wrapper-->
				<!-- Add Pagination -->
		        <div class="swiper-pagination"></div>
				<!-- Add Arrows -->
		       <!-- <div class="swiper-button-next"></div>
		        <div class="swiper-button-prev"></div>-->
			</div><!--.swiper-container-->
		
			</div> <!-- .maxwidth -->
			</div> <!-- .mainbox2 -->
			
			<div class="mainbox-1">
				<h1 class="cat-header">Simple Maintenance</h1>
				<div class="about-sereno-image-2"><img src="<?php echo $image_aboutsereno[7][0]; ?>" alt="image"/></div>
				<p class="cat-body about-sereno-text-2">
				Sereno is moisture and mildew resistant meaning you don't have to worry about it being damaged in humid 
				environments. It's also easy to clean - just vacuum occassionally to remove
				dust and use warm water with soap to clear up blots.
				</p>
			</div> <!-- .mainbox1 -->

		</div>
	</main><!-- #main -->
</div><!--#primary-->

<?php
get_footer();	