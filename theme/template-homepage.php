<?php
/**
 * The template for displaying the homepage.
 *
 * This page template will display any functions hooked into the `homepage` action.
 * By default this includes a variety of product displays and the page content itself. To change the order or toggle these components
 * use the Homepage Control plugin.
 * https://wordpress.org/plugins/homepage-control/
 *
 * Template name: Homepage
 *
 * @package storefront
 */

get_header(); ?>

<?php
  /*SETUP THE ARRAYS*/
  $product_id_hp=array(                                       /*This is for the Featured Products*/
            704,        /*Sq S*/
            383,        /*Hex L*/
            692,        /*Sq L*/
            382,        /*Hex S*/
            381,        /*Rec L*/
  );  
  $arraylength = count($product_id_hp);                       /*This counts the array made above*/

  for($x = 0; $x < $arraylength; $x++){
    $product_homepage[$x] = new WC_product($product_id_hp[$x]);                      /*Set Up New Product*/
    $prod_image_id_hp[$x] = $product_homepage[$x]->get_image_id();                   /*Product Image Id*/
    $prod_image_hp[$x] = wp_get_attachment_image_src($prod_image_id_hp[$x], "full"); /*Product Image*/
    $prod_title_hp[$x]=$product_homepage[$x]->get_title();                           /*Product title*/
    $prod_desc_hp[$x] = $product_homepage[$x]->post->post_excerpt;                   /*Product description*/
    $prod_url_hp[$x]= get_permalink($product_id_hp[$x]);                             /*Product detail page url(using product ID!)*/
  }

  $image_homepage=array(

    //Three Points
    wp_get_attachment_image_src(983, "full"), //Design & Plan Your Space
    wp_get_attachment_image_src(984, "full"), //Place Your Order
    wp_get_attachment_image_src(986, "full"), //Easy to Install

    //First Banner
    wp_get_attachment_image_src(981, "full"), //Functionality + Aesthetic = Sereno Panel

    //Second Banner
    wp_get_attachment_image_src(980, "full"), //Proudly Made in Vancouver

    //First Banner - MOBILE
    wp_get_attachment_image_src(994, "full"), //Functionality + Aesthetic = Sereno Panel

    //Second Banner - MOBILE
    wp_get_attachment_image_src(993, "full"), //Proudly Made in Vancouver
  );

?>

<div id="primary" class="content-area">
  <main id="main" class="site-main" role="main">
  <div class="maxwidth">

    <div class="homepagebox-1">
      <h1 class="hp-header-main">Colour. Creativity. Acoustics.</h1>
      <p class="cat-body">
        We are AKUSTUS, an acoustic product design company based out of Vancouver, Canada. Our passion lies in bringing life to spaces through beautifully crafted and functional acoustic products. Every piece we design, from basic shapes to complex art pieces, is meant to make your space pop while providing an acoustic experience that sounds as incredible as it looks.
      </p>
      <a href="<?php echo esc_url( get_page_link( 461 )); ?>"><button type="button" class="cat-button">About Us</button></a>
    </div>

    <div class="homepagebox-2">
      <h1 class="hp-header-main">Three steps to make your space look and sound amazing!</h1>
      
      <div id="point_1" class="hp-box2-point">
        <div class="hp-box2-text">
          <p class="cat-caption-1">1. Design & Plan Your Space</p>
          <p class="cat-body">
            With a wide variety of designs and patterns to choose from, there’s bound to be something to suit your space. Still not sure? Let us know and our design consultants would be happy to help.
          </p>
        </div>
        <div class="hp-box2-image"><img src="<?php echo $image_homepage[0][0]; ?>" /></div>
      </div>
      <div id="point_2" class="hp-box2-point">
        <div class="hp-box2-image"><img src="<?php echo $image_homepage[1][0]; ?>" /></div>
        <div class="hp-box2-text">
          <p class="cat-caption-1">2. Place Your Order</p>
          <p class="cat-body">
            Once you place your order, we manufacture the products right here in Vancouver. Each order goes through a rigorous quality control process before being shipped out to you. Most orders take 2-3 weeks to produce.
          </p>
        </div>
      </div>
      <div id="point_3" class="hp-box2-point">
        <div class="hp-box2-text">
          <p class="cat-caption-1">3. Install and Enjoy!</p>
          <p class="cat-body">
            Our products are simple to install for both professionals and as a do-it-yourself project. Every order comes with its own easy to follow instruction manual.
          </p>
        </div>
        <div class="hp-box2-image"><img src="<?php echo $image_homepage[2][0]; ?>" /></div>
      </div>

      <!--Swiper-1-->
      <div class="swiperbox-1">
      <div class="swiper-container">
          <div class="swiper-wrapper">
            <div class="swiper-slide">
              <div class="hp-box2-image"><img src="<?php echo $image_homepage[0][0]; ?>" /></div>
              <div class="hp-box2-text">
                <p class="cat-caption-1">Design & Plan Your Space</0>
                <p class="cat-body">
                  With a wide variety of designs and patterns to choose from, there’s bound to be something to suit your space. Still not sure? Let us know and our design consultants would be happy to help.
                </p>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="hp-box2-image"><img src="<?php echo $image_homepage[1][0]; ?>" /></div>
              <div class="hp-box2-text">
                <p class="cat-caption-1">Place Your Order</0>
                <p class="cat-body">
                  Once you place your order, we manufacture the products right here in Vancouver. Each order goes through a rigorous quality control process before being shipped out to you. Most orders take 2-3 weeks to produce.
                </p>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="hp-box2-image"><img src="<?php echo $image_homepage[2][0]; ?>" /></div>
              <div class="hp-box2-text">
                <p class="cat-caption-1">Install and Enjoy!</0>
                <p class="cat-body">
                  Our products are simple to install for both professionals and as a do-it-yourself project. Every order comes with its own easy to follow instruction manual.
                </p>
              </div>
            </div>
          </div>
          <!-- Add Pagination -->
          <div class="swiper-pagination"></div>
        </div><!--.swiper-container-->
      </div>
    </div>

    <div class="homepagebox-3">
      <img id="tagline-banner" src="<?php echo $image_homepage[3][0]; ?>" />
    </div>

    <div class="homepagebox-4">
      <!--Main Title-->
      <h1 class="hp-header-main feat-prod-title">Featured Products</h1>
      <!--Main Featured Products-->
      <div class="first-row">
        <div class="feat-prod-1">
          <img src="<?php echo $prod_image_hp[0][0]; ?>" />
          <h1 class="hp-header-main"><?php echo $prod_title_hp[0]; ?></h1>
          <p class="cat-body"><?php echo $prod_desc_hp[0]; ?></p>
          <a href="<?php echo $prod_url_hp[0]; ?>"><button type="button" class="cat-button">View</button></a>
        </div>
        <div class="feat-prod-2">
          <img src="<?php echo $prod_image_hp[1][0]; ?>" />
          <h1 class="hp-header-main"><?php echo $prod_title_hp[1]; ?></h1>
          <p class="cat-body"><?php echo $prod_desc_hp[1]; ?></p>
          <a href="<?php echo $prod_url_hp[1]; ?>"><button type="button" class="cat-button">View</button></a>
        </div>
      </div>
      <!--Secondary Featured Products-->
      <div class="second-row">
        <div class="feat-prod-3">
          <img src="<?php echo $prod_image_hp[2][0]; ?>" />
          <h2 class="cat-sub-header"><?php echo $prod_title_hp[2]; ?></h2>
          <a href="<?php echo $prod_url_hp[2]; ?>"><button type="button" class="cat-button">View</button></a>
        </div>
        <div class="feat-prod-4">
          <img src="<?php echo $prod_image_hp[3][0]; ?>" />
          <h2 class="cat-sub-header"><?php echo $prod_title_hp[3]; ?></h2>
          <a href="<?php echo $prod_url_hp[3]; ?>"><button type="button" class="cat-button">View</button></a>
        </div>
        <div class="feat-prod-5">
          <img src="<?php echo $prod_image_hp[4][0]; ?>" />
          <h2 class="cat-sub-header"><?php echo $prod_title_hp[4]; ?></h2>
          <a href="<?php echo $prod_url_hp[4]; ?>"><button type="button" class="cat-button">View</button></a>
        </div>
      </div>
      <!--Swiper-2-->
      <div class="swiperbox-2">
        <div class="swiper-container">
          <div class="swiper-wrapper">
            <div class="swiper-slide">
              <a href="<?php echo $prod_url_hp[2]; ?>"><img src="<?php echo $prod_image_hp[2][0]; ?>" /></a>
              <h1 class="hp-header-main"><?php echo $prod_title_hp[2]; ?></h1>
            </div>
            <div class="swiper-slide">
              <a href="<?php echo $prod_url_hp[3]; ?>"><img src="<?php echo $prod_image_hp[3][0]; ?>" /></a>
              <h1 class="hp-header-main"><?php echo $prod_title_hp[3]; ?></h1>
            </div>
            <div class="swiper-slide">
              <a href="<?php echo $prod_url_hp[4]; ?>"><img src="<?php echo $prod_image_hp[4][0]; ?>" /></a>
              <h1 class="hp-header-main"><?php echo $prod_title_hp[4]; ?></h1>
            </div>
          </div>
          <div class="swiper-pagination"></div><!--UMMMMMM okay I dont know why BUT U NEED THIS LINE for the top swiper to work properly...WHAT!???-->
          <!-- Add Arrows -->
          <div class="swiper-button-next"></div>
          <div class="swiper-button-prev"></div>
        </div>
      </div>
      <!--View All Button-->
      <a href="#"><button type="button" class="cat-button">View All Products</button></a>
    </div>

    <div class="homepagebox-5">
      <img id="scene-banner" src="<?php echo $image_homepage[4][0]; ?>" />
    </div>

    <!--MOBILE CHANGES-->
    <?php

    echo '  <script>

                if (matchMedia) {
                    var mq = window.matchMedia("(min-width: 500px)");
                    mq.addListener(WidthChange);
                    WidthChange(mq);
                }
                function WidthChange(mq) {
                    if (mq.matches) {
                        document.getElementById("tagline-banner").src= "' .$image_homepage[3][0]. '" ;
                        document.getElementById("scene-banner").src= "' .$image_homepage[4][0]. '" ;
                    } else {
                        document.getElementById("tagline-banner").src= "' .$image_homepage[5][0]. '" ;
                        document.getElementById("scene-banner").src= "' .$image_homepage[6][0]. '" ;
                    }

                }
            </script>'
     ;?>


    <!--Animation Effects-->
    <script>
    $(document).ready(function() {
        /* Every time the window is scrolled ... */
        $(window).scroll( function(){

            var bottom_of_window = $(window).scrollTop() + $(window).height();

            //HOMEPAGEBOX-1
            var start_point_hpbx1 = $('.homepagebox-1').position().top + $('.homepagebox-1').outerHeight()/3;
            var hpbx1_opacity = $('.homepagebox-1').css('opacity');
            if( bottom_of_window > start_point_hpbx1){
              if (hpbx1_opacity == 0){
                $('.homepagebox-1').animate({
                  'opacity':'1',
                  //By default, all HTML elements have a static position, and cannot be moved. To manipulate the position, remember to first set the CSS position property of the element to relative, fixed, or absolute!
                  'top':'-60px'
                },1000);
              }
            }

            //HOMEPAGEBOX-2 - Point 1
            var start_point_1 = $('#point_1').position().top + $('#point_1').outerHeight()/2;
            var point_1_opacity = $('#point_1 .hp-box2-text').css('opacity');
            if( bottom_of_window > start_point_1){
              if (point_1_opacity == 0){
                $('#point_1 .hp-box2-image').animate({'opacity':'1','left':'-600px'},700);
                $('#point_1 .hp-box2-text').delay(400).animate({'opacity':'1','left':'-400px'},900);
              }
            }

            //HOMEPAGEBOX-2 - Point 2
            var start_point_2 = $('#point_2').position().top + $('#point_2').outerHeight()/2;
            var point_2_opacity = $('#point_2 .hp-box2-text').css('opacity');
            if( bottom_of_window > start_point_2){
              if (point_2_opacity == 0){
                $('#point_2 .hp-box2-image').animate({'opacity':'1','left':'400px'},900);
                $('#point_2 .hp-box2-text').delay(400).animate({'opacity':'1','left':'600px'},700);
              }
            }

            //HOMEPAGEBOX-2 - Point 3
            var start_point_3 = $('#point_3').position().top + $('#point_3').outerHeight()/2;
            var point_3_opacity = $('#point_3 .hp-box2-text').css('opacity');
            if( bottom_of_window > start_point_3){
              if (point_3_opacity == 0){
                $('#point_3 .hp-box2-image').animate({'opacity':'1','left':'-600px'},700);
                $('#point_3 .hp-box2-text').delay(400).animate({'opacity':'1','left':'-400px'},900);
              }
            }

            //HOMEPAGEBOX-4
            var start_point_hpbx4 = $('.homepagebox-4').position().top + $('.homepagebox-4').outerHeight()/8;
            var hpbx4_opacity = $('.feat-prod-title').css('opacity');
            if( bottom_of_window > start_point_hpbx4){
              if (hpbx4_opacity == 0){
                $('.feat-prod-title').animate({'opacity':'1','top':'-80px'},1000);
                $('.first-row').delay(500).animate({'opacity':'1','top':'-80px'},900);
              }
            }

        });
    });
    </script>
  
  </div><!-- .maxwidth -->
  </main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();