<!DOCTYPE html>
<html <?php language_attributes (); ?> >
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" >
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">  <!--site pings all linked wordpress sites when a post is published -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

	<?php wp_head (); ?> <!--important hook for plugins -->
<head>

<body <?php body_class(); ?>> <!--This function gives the body element different classes: "page page-id-2 page-parent page-template-default logged-in"-->
<div id="page" class="hfeed site">
	<header id="masthead" class="site-header" role="banner" > <!-- --> 
	
		<?php
			$args2 = array ('theme_location' => 'loginheader','container_class' => 'login-nav', ); // create array for loginmenu
			wp_nav_menu ( $args2 );
		?>
			
		<div class="header-container">
			<div class="header-box">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>\images\AK_Logo_VF_Black_RGB.png" alt="LOGO" class="logo"/>
				</a> <!--logo-->
			
				<?php
					wp_nav_menu ( array ('theme_location' => 'header','container_class' => 'header-nav')); //header menu
				?>        
				
			</div>
			<form class="searchbox" method="get" action="<?php bloginfo('home'); ?>/">
				<input type="text" size="put_a_size_here" name="s" placeholder="SEARCH" class="searchbox-input" onkeyup="buttonUp();" required/>
				<input type="submit" class="searchbox-submit" value="">
				<span class="searchbox-icon"></span>
			</form>
            <!--Search Bar-->
                    
			<!--<div class="header-transparent"></div>--> <!--for gray bar on scroll down-->
            <a onclick="phonedropdown()"><!--&#9776;</a> font code for trigram -->
				<img src="<?php echo get_stylesheet_directory_uri(); ?>\images\ICN_Menu.png" alt="menuicon" class="menuicon"/>
			</a> 
			
		</div>


        <!--Mobile-->
        <script>
            function phonedropdown() {
                var x = document.getElementById("menu-header-menu-links");

                if (x.className === "header-nav") {
                    x.className += " mobile";
                    document.getElementsByClassName("header-container")[0].className += " phone_drop_down"; //just puts the gray on header-container in style.css when menu icon is clicked
                }
                else {
                    x.className = "header-nav";
                    document.getElementsByClassName("header-container")[0].className = " header-container";
                }

                //Document (this makes it so if you click outside the menu, the extra padding is deleted)
                document.onclick = function (event) {
                    if (event.target.tagName !== 'A') {
                        document.getElementById("menu-item-162").getElementsByTagName("a")[0].style.paddingTop = "0px";
                    }
                };
            }
		</script>

        <script>
            $(document).ready(function () {
                if (matchMedia) {
                    var mq = window.matchMedia("(min-width: 1025px)");
                    mq.addListener(WidthChange);
                    WidthChange(mq);
                }
                function WidthChange(mq) {
                    if (mq.matches) {
                        //aka if its above 1025px

                        //Hovering Color Effect
                        $("#menu-item-162").mouseover(function () {
                            $(".header-container").css("background-color", "#f2f2f2");
                        });
                        $("#menu-item-162").mouseout(function () {
                            $(".header-container").css("background-color", "transparent");
                        });

                        //Scroll
                        $(window).scroll(function () {
                            if ($(this).scrollTop() > 40) {
                                $('.header-container').css("padding", "0 0 0 0");
                                $('.searchbox').css("top", "14px");
                                $('.header-container').css("background-color", "rgba(242,242,242,0.9)");
                            }
                            else {
                                $('.header-container').css("padding", "30px 0 0 0");
                                $('.searchbox').css("top", "44px");
                                $('.header-container').css("background-color", "rgba(242,242,242,0)");
                            }
                        });

                        //undo the functions from mobile
                        $('#menu-item-162').children().first().unbind('click');
                        document.getElementById("menu-item-162").children[0].onclick = function () { return true; };
                        document.onclick = function (event) { return true; };
                    }
                    else {
                        //aka if its below 1025px
                        
                        //Scroll (removal of features)
                        $(window).scroll(function () {
                            if ($(this).scrollTop() > 40) {
                                $('.header-container').css("padding", "0 0 0 0");
                                $('.searchbox').css("top", "14px");
                                $('.header-container').css("background-color", "rgba(242,242,242,0)");
                            }
                            else {
                                $('.header-container').css("padding", "0 0 0 0");
                                $('.searchbox').css("top", "14px");
                                $('.header-container').css("background-color", "rgba(242,242,242,0)");
                            }
                        });

                        //Dropdown Menu

                        //Removes Product link altogether (for some reason, the Product is the first child of #menu-item-162)
                        $('#menu-item-162').children().first().click(function (e) {
                            e.preventDefault();
                        });

                        //basically, click=true is clicked once, clicked = false is clicked second time (so sub-menu can hide again)
                        var click = true;

                        //Product
                        document.getElementById("menu-item-162").children[0].onclick = function () {

                            //this deletes extra padding below About
                            document.getElementById("menu-item-162").getElementsByTagName("a")[0].style.paddingTop = "0px";

                            if (click == true) {
                                document.getElementById("menu-item-162").getElementsByTagName("ul")[0].style.display = "block";
                                document.getElementById("menu-item-162").classList.add("clicked");
                                click = false;
                            }
                            else {
                                document.getElementById("menu-item-162").getElementsByTagName("ul")[0].style.display = "none";
                                document.getElementById("menu-item-162").classList.remove("clicked");
                                click = true;
                            }

                        };
                    }
                }
            });
		</script>

        <!--Search Bar-->
        <script>
        $(document).ready(function(){
            var submitIcon = $('.searchbox-icon');
            var inputBox = $('.searchbox-input');
            var searchBox = $('.searchbox');
            var isOpen = false;
            submitIcon.click(function(){
                if(isOpen == false){
                    searchBox.addClass('searchbox-open');
                    inputBox.focus();
                    isOpen = true;
                } else {
                    searchBox.removeClass('searchbox-open');
                    inputBox.focusout();
                    isOpen = false;
                }
            });  
             submitIcon.mouseup(function(){
                return false;
            });
            searchBox.mouseup(function(){
                return false;
            });
            $(document).mouseup(function(){
                if(isOpen == true){
                    $('.searchbox-icon').css('display','block');
                    submitIcon.click();
                }
            });

            if (matchMedia) {
                    var mq = window.matchMedia("(min-width: 1025px)");
                    mq.addListener(WidthChange);
                    WidthChange(mq);
                }
                function WidthChange(mq) {
                    if (mq.matches) {   
                        //submitIcon.unbind('click');    Unfortunately if I try to unbind this the entire click function for search disappears             
                    }
                    else {

                        submitIcon.on("click", function() {
                            if (isOpen == false) {
                                $('#primary, #menu-header-menu-links, .header-banner, footer').css('opacity', '1');
                            } 
                            else {
                                $('#primary, #menu-header-menu-links, .header-banner, footer').css('opacity', '0.6');
                            }
                        });
                    }
                }
                
        });
        function buttonUp(){
            var inputVal = $('.searchbox-input').val();
            inputVal = $.trim(inputVal).length;
            if( inputVal !== 0){
                $('.searchbox-icon').css('display','none');
            } else {
                $('.searchbox-input').val('');
                $('.searchbox-icon').css('display','block');
            }
        }
		</script>

		<!-- Slideshow in Header-->
		<div class="header-banner">

		<?php
			/*SETUP THE ARRAYS*/
			$image_top_banner=array(
			wp_get_attachment_image_src(763, "full"),   /*About Us*/
            wp_get_attachment_image_src(762, "full"),   /*About Sereno*/
			wp_get_attachment_image_src(770, "full"),   /*Product Page*/
			wp_get_attachment_image_src(764, "full"),   /*Collection*/
			wp_get_attachment_image_src(768, "full"),   /*Inspiration*/
			wp_get_attachment_image_src(765, "full"),   /*Contact Us*/
            wp_get_attachment_image_src(769, "full"),   /*Wall Panel*/
            wp_get_attachment_image_src(767, "full"),   /*FAQ*/
			wp_get_attachment_image_src(766, "full"),   /*Downloads*/

            wp_get_attachment_image_src(987, "full"),   /*Home Page*//*Home Page*/
			);
		?>
        <?php 	if(my_get_slug()=='home') { 
					
                    echo '<div class="top-banner">
                            <div class="swiper-container">
		                        <div class="swiper-wrapper">
			                        <div class="swiper-slide">
                                          <img id="first-image" src=" '.$image_top_banner[9][0].' " alt="image" />
			                        </div>		                        
		                        </div> 									
	                        </div>
                          </div>';

                }elseif(my_get_slug()=='about-akustus') {
                    echo '<img id="top-banner" src=" ' .$image_top_banner[0][0]. ' " alt="image" width="100%"/>';
				}elseif(my_get_slug()=='about-sereno'){
					echo '<img id="top-banner" src=" ' .$image_top_banner[1][0]. ' " alt="image" width="100%"/>';
				}elseif(is_shop()) {
                    echo '<img id="top-banner" src=" ' .$image_top_banner[2][0]. ' " alt="image" width="100%"/>';
                }elseif(my_get_slug()=='collections'){
					echo '<img id="top-banner" src=" ' .$image_top_banner[3][0]. ' " alt="image" width="100%"/>';
				}elseif(my_get_slug()=='inspirations'){
					echo '<img id="top-banner" src=" ' .$image_top_banner[4][0]. ' " alt="image" width="100%"/>';
				}elseif(my_get_slug()=='contact-us'){
					echo '<img id="top-banner" src=" ' .$image_top_banner[5][0]. ' " alt="image" width="100%"/>';
				}elseif(my_get_slug()=='wall-panels'){
					echo '<img id="top-banner" src=" ' .$image_top_banner[6][0]. ' " alt="image" width="100%"/>';
				}elseif(my_get_slug()=='faq'){
					echo '<img id="top-banner" src=" ' .$image_top_banner[7][0]. ' " alt="image" width="100%"/>';
                }elseif(my_get_slug()=='downloads'){
					echo '<img id="top-banner" src=" ' .$image_top_banner[8][0]. ' " alt="image" width="100%"/>';
                }else {
					echo '<div class="filler"></div>';
				}
        ?>

		</div>

	</header> <!--masthead-->
	
	<?php
	/**
	* Functions hooked in to storefront_before_content
	*
	* @hooked storefront_header_widget_region - 10
	*/
	//do_action( 'storefront_before_content' ); ?>

	<div id="content" class="site-content" tabindex="-1">
		<div class="col-full">

		<?php
		/**
		* Functions hooked in to storefront_content_top
		*
		* @hooked woocommerce_breadcrumb - 10
		*/
		//do_action( 'storefront_content_top' );