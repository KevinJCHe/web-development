<?php
/**
 * The template for displaying the homepage.
 *
 * This page template will display any functions hooked into the `homepage` action.
 * By default this includes a variety of product displays and the page content itself. To change the order or toggle these components
 * use the Homepage Control plugin.
 * https://wordpress.org/plugins/homepage-control/
 *
 * Template name: Inspiration
 *
 * @package storefront
 */

get_header(); ?>

<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

            <?php do_action( 'storefront_content_top' ); ?><!--breadcrumb-->

            <?php while ( have_posts() ) : the_post();
				do_action( 'storefront_page_before' );
				get_template_part( 'content', 'page' );
			endwhile; // End of the loop. ?>

           <?php 

            $parent_cat_ID=32; /*ID of category Inspiration*/
            $p=0; //initialize counter

            $args = array('hierarchical' => 1,'show_option_none' => '','hide_empty' => 0,'parent' => $parent_cat_ID,'taxonomy' => 'product_cat');
            $subcats = get_categories($args);

            echo '<ul class="inspiration">';
            
            foreach ($subcats as $sc) {

                $subcategory_name = $sc->name;
                $subcategory_id = $sc->term_id;
                
                $subcategory_imageID = get_woocommerce_term_meta( $subcategory_id, 'thumbnail_id', true );
                $subcategory_img = wp_get_attachment_image_src( $subcategory_imageID, 'full' );
                $subcategory_link = get_term_link( $sc, 'product_cat' );

                echo '<li class="image-insp">
                        <a href=" '.$subcategory_link. ' ">
                            <div id="insp-name-'.$p.'" class="insp-name"><p class="font-caption">' .$subcategory_name. '</p></div>
                            <img id="insp-img-'.$p.'" class="insp-img" src=" '.$subcategory_img[0]. ' " alt="image" />
                            <span></span>
                        </a>
                      </li>

                    <script>
                        $(document).ready(function () {
                            $("#insp-name-'.$p.'").mouseover(function () {
                                $("#insp-img-'.$p.'").css("opacity", "0.4");
                            });
                            $("#insp-name-'.$p.'").mouseout(function () {
                                $("#insp-img-'.$p.'").css("opacity", "1.0");
                            });
                            $("#insp-img-'.$p.'").mouseover(function () {
                                $("#insp-img-'.$p.'").css("opacity", "0.4");
                            });
                            $("#insp-img-'.$p.'").mouseout(function () {
                                $("#insp-img-'.$p.'").css("opacity", "1.0");
                            });
                        });
                    </script>
                ';
                $p= $p + 1;
            }
            echo '</ul>';
         ?>




<!-------------------------------------------------------------------------------TESTING---------------------------------------------------------------------------------------->

        <!--TABLET CHANGES-->
        <?php
        
        echo '  <script>

                    if (matchMedia) {
                        var mq = window.matchMedia("(min-width: 751px)");
                        mq.addListener(WidthChange);
                        WidthChange(mq);
                    }
                    function WidthChange(mq) {
                        if (mq.matches) {
                            
                        } else {
                            
                        }

                    }
                </script>'
         ;?>

<!-------------------------------------------------------------------------------TESTING---------------------------------------------------------------------------------------->
           


        </main><!-- #main -->
</div><!-- #primary -->


<?php
get_footer();