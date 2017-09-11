<?php
/**
 * The template for displaying the Downloads page.
 *
 *
 * Template name: Downloads
 *
 * @package storefront
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<div class="maxwidth">
			<?php do_action( 'storefront_content_top' ); ?><!--breadcrumb-->
		</div>
		 
		<div class="downloads">

			<div class="catalogues">
				 <p class="cat-caption-1">Catalogues</p>
				 <a class="download-link" href="<?php echo get_stylesheet_directory_uri(); ?>\downloads\AK_Catalog_C1701_VF_edit_web (1).pdf" target="_blank"><p class="cat-body">Catalogue 2017 January</p></a>
				 <a class="download-link" href="<?php echo get_stylesheet_directory_uri(); ?>\downloads\AK_Catalog_C1701_VF_edit_web (1).pdf" target="_blank"><p class="cat-body">Catalogue 2017 November</p></a>
			</div>

			<div class="brochures">
				 <p class="cat-caption-1">Brochures</p>
				 <a class="download-link" href="<?php echo get_stylesheet_directory_uri(); ?>\downloads\AK_Brochure_B1701.pdf" target="_blank"><p class="cat-body">Brochure 2017 January</p></a>
				 <a class="download-link" href="<?php echo get_stylesheet_directory_uri(); ?>\downloads\AK_Brochure_B1701.pdf" target="_blank"><p class="cat-body">Brochure 2017 November</p></a>
				 <a class="download-link" href="<?php echo get_stylesheet_directory_uri(); ?>\downloads\AK_Brochure_B1701.pdf" target="_blank"><p class="cat-body">Brochure 2017 March</p></a>
			</div>

			<div class="color-codes">
				 <p class="cat-caption-1">Color Codes</p>
				 <a class="download-link" href="<?php echo get_stylesheet_directory_uri(); ?>\downloads\AK_SP_Colour Codes_VF_Web.pdf" target="_blank"><p class="cat-body">Sereno Panel Colours</p></a>
			</div>

			<div class="instructions">
				 <p class="cat-caption-1">Instructions</p>
				 <a class="download-link" href="<?php echo get_stylesheet_directory_uri(); ?>\downloads\SerenoPanel_InstallationGuide.pdf" target="_blank"><p class="cat-body">Installation Guide</p></a>
				 <a class="download-link" href="<?php echo get_stylesheet_directory_uri(); ?>\downloads\AK_SP_Colour Codes_VF_Web.pdf" target="_blank"><p class="cat-body">Care Instruction</p></a>
			</div>

			<div class="download-5">
				 <p class="cat-caption-1">Download 5</p>
				 <a class="download-link" href="<?php echo get_stylesheet_directory_uri(); ?>\downloads\AK_SP_Colour Codes_VF_Web.pdf" target="_blank"><p class="cat-body">Download 5_1</p></a>
				 <a class="download-link" href="<?php echo get_stylesheet_directory_uri(); ?>\downloads\AK_SP_Colour Codes_VF_Web.pdf" target="_blank"><p class="cat-body">Download 5_2</p></a>
			</div>

			<div class="download-6">
				 <p class="cat-caption-1">Download 6</p>
				 <a class="download-link" href="<?php echo get_stylesheet_directory_uri(); ?>\downloads\AK_SP_Colour Codes_VF_Web.pdf" target="_blank"><p class="cat-body">Download 6_1</p></a>
				 <a class="download-link" href="<?php echo get_stylesheet_directory_uri(); ?>\downloads\AK_SP_Colour Codes_VF_Web.pdf" target="_blank"><p class="cat-body">Download 6_2</p></a>
			</div>
          
			
		</div> <!-- .downloads -->
	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();