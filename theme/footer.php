<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package storefront
 */

?>

	</div><!-- .col-full -->
</div><!-- #content -->

<?php do_action( 'storefront_before_footer' ); ?>

<footer id="colophon" class="site-footer" role="contentinfo">
	<div class="col-full">
		
	<div class="footer-top">
		<h2 class="header-email-subs">Sign up for the latest</h2>
		<div class="footer-form">
			<?php echo ninja_forms_display_form (5); ?>
		</div>
    </div> 

	<div class="footer-main">
		<div class="footer-middle">
			<div class="mobile-center">
			<nav class="nav-footer-1">
				<?php wp_nav_menu( $args=array('theme_location'=>'footer')); ?>  
			</nav>
	   
			<nav class="nav-footer-2">
				<?php wp_nav_menu( $args2=array('theme_location'=>'footer2')); ?>  
			</nav>

			</div>
			<nav class="nav-footer-links">
				<?php wp_nav_menu( $args3=array('theme_location'=>'footer3')); ?>  <!--Social Media-->
			</nav>
	
		</div> 
		<!--.footer-middle-->
		<div class="footer-end">
			<?php //wp_nav_menu( $args3=array('theme_location'=>'footer4','container_class'=>'terms')); ?> 
			<p class="footer-copyrights"> 
				Copyright&#169;Akustus 2016
			</p>  
		</div> 
		<!--.footer-end-->
	</div>
	<!--footer-end-->
			
	</div><!-- .col-full -->
</footer><!-- #colophon -->

<?php do_action( 'storefront_after_footer' ); ?>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>




<!--ONLY FOR PRODUCT SINGLE PAGE. MAKE IMAGE SLIDER HAVE CLICK FEATURE. I KNOW ITS TERRIBLE TO PUT IT HERE BUT OH WELL-->
<script>
    if(document.body.classList.contains("single-product")){
    	
    	//Set transition distance amount with viewport width
    	if(document.documentElement.clientWidth < 770){
    		var transition_dist = -(document.documentElement.clientWidth + 30) 
    	}
    	else
    		var transition_dist = -(640 + 30) /*transition distance is the size of the image*/
    	//Get the swiper variables
	    var x = document.getElementsByClassName("swiper-pagination-bullet");
	    var y = document.querySelectorAll('.container-flex .swiper-container .swiper-slide');	
	    /*the container-flex is just for the uniqueness of the product image slider, since there's another swiper container on the page*/
	    var z = document.querySelectorAll('.container-flex .swiper-container .swiper-wrapper')[0];	//Cuz there's only one

	    for (i=0;i<x.length;i++) {
	        x[i].onclick = (function(t){	//https://stackoverflow.com/questions/15466844/using-a-variable-loop-to-create-onclick-functions
	        	return function (e) { 

		            //Manipulating the classes for bullets
		        	for (n=0;n<x.length;n++) {
		        		x[n].className = "swiper-pagination-bullet";
		        	}
		       		x[t].className += " bullet swiper-pagination-bullet-active ";

		       		//Manipulating the slides
		       		z.style.webkitTransform =  'translate3d(' + (transition_dist)*t+ 'px, 0px, 0px)'; 
					z.style.MozTransform =  'translate3d(' + (transition_dist)*t+ 'px, 0px, 0px)';
					z.style.msTransform =  'translate3d(' + (transition_dist)*t+ 'px, 0px, 0px)';
					z.style.OTransform =  'translate3d(' + (transition_dist)*t+ 'px, 0px, 0px)';
					z.style.transform = 'translate3d(' + (transition_dist)*t+ 'px, 0px, 0px)';
					$('.swiper-wrapper').css('transition-duration','300ms');

		       		//Manipulating the classes for the slides (DOESNT REALLY DO SHIT THO)
		       		for (f=0;f<y.length;f++) {
		        		y[f].className = "swiper-slide";
		        	}
		       		y[t].className += " swiper-slide-active ";
		       		if(t==0){
		       			y[t+1].className += " swiper-slide-next ";
		       		}
		       		else if(t == y.length - 1){
		       			y[t-1].className += " swiper-slide-prev "
		       		}
		       		else{
		       			y[t+1].className += " swiper-slide-next ";
		       			y[t-1].className += " swiper-slide-prev "
		       		}
		        };
	       	})(i);
    	}
    }
    else if(document.body.classList.contains("page-template-template-aboutsereno")){

    	if(document.documentElement.clientWidth > 769){
    		
    	}
    	else{
    		var transition_dist = -(document.documentElement.clientWidth) /*transition distance is the size of the image*/

	    	//Product Title
		    var x = document.getElementsByClassName("swiper-pagination-bullet");
		    var y = document.querySelectorAll('.mainbox-2 .swiper-container .swiper-slide');	
		    /*the container-flex is just for the uniqueness of the product image slider, since there's another swiper container on the page*/
		    var z = document.querySelectorAll('.mainbox-2 .swiper-container .swiper-wrapper')[0];	//Cuz there's only one

		    for (i=0;i<x.length;i++) {
		        x[i].onclick = (function(t){	//https://stackoverflow.com/questions/15466844/using-a-variable-loop-to-create-onclick-functions
		        	return function (e) { 

			            //Manipulating the classes for bullets
			        	for (n=0;n<x.length;n++) {
			        		x[n].className = "swiper-pagination-bullet";
			        	}
			       		x[t].className += " bullet swiper-pagination-bullet-active ";

			       		//Manipulating the slides
			       		z.style.webkitTransform =  'translate3d(' + (transition_dist)*t+ 'px, 0px, 0px)'; /*-670 is the size of the image, change accordinly*/
						z.style.MozTransform =  'translate3d(' + (transition_dist)*t+ 'px, 0px, 0px)';
						z.style.msTransform =  'translate3d(' + (transition_dist)*t+ 'px, 0px, 0px)';
						z.style.OTransform =  'translate3d(' + (transition_dist)*t+ 'px, 0px, 0px)';
						z.style.transform = 'translate3d(' + (transition_dist)*t+ 'px, 0px, 0px)';
						$('.swiper-wrapper').css('transition-duration','300ms');

			       		//Manipulating the classes for the slides
			       		for (f=0;f<y.length;f++) {
			        		y[f].className = "swiper-slide";
			        	}
			       		y[t].className += " swiper-slide-active ";
			       		if(t==0){
			       			y[t+1].className += " swiper-slide-next ";
			       		}
			       		else if(t == y.length - 1){
			       			y[t-1].className += " swiper-slide-prev "
			       		}
			       		else{
			       			y[t+1].className += " swiper-slide-next ";
			       			y[t-1].className += " swiper-slide-prev "
			       		}
			        };
		       	})(i);
	    	}
	    }
    }
    else if(document.body.classList.contains("page-template-template-homepage")){
    	//Set transition distance amount with viewport width
    	if(document.documentElement.clientWidth > 525 && document.documentElement.clientWidth < 1120){
    		var transition_dist = -(420) /*transition distance is the size of the image*/
    	}
    	else
    		var transition_dist = -(document.documentElement.clientWidth*0.8) 

    	var w = document.getElementsByClassName("swiper-button-next");
    	var x = document.getElementsByClassName("swiper-button-prev");
    	var y = document.querySelectorAll('.swiperbox-2 .swiper-container .swiper-slide');	
    	var z = document.querySelectorAll('.swiperbox-2 .swiper-container .swiper-wrapper')[0];

    	w[0].onclick = function () {
    		for(i=0;i<y.length;i++)
    		{
    			if(y[i].className == "swiper-slide swiper-slide-active")
    			{
    				t= i+1;

    				if(t == y.length){
						break;
					}

    				//Manipulating the slides
    				z.style.webkitTransform =  'translate3d(' + (transition_dist)*(t)+ 'px, 0px, 0px)'; 
					z.style.MozTransform =  'translate3d(' + (transition_dist)*(t)+ 'px, 0px, 0px)';
					z.style.msTransform =  'translate3d(' + (transition_dist)*(t)+ 'px, 0px, 0px)';
					z.style.OTransform =  'translate3d(' + (transition_dist)*(t)+ 'px, 0px, 0px)';
					z.style.transform = 'translate3d(' + (transition_dist)*(t)+ 'px, 0px, 0px)';
					$('.swiper-wrapper').css('transition-duration','300ms');

					//Manipulating the classes for the slides
					for (f=0;f<y.length;f++) {
		        		y[f].className = "swiper-slide";
		        	}
					y[t].style.transform='translate3d(0px, 0px, 0px)';
					y[t].style.opacity="1";
					y[t].className = "swiper-slide swiper-slide-active";
					y[t+1].className = "swiper-slide swiper-slide-next";
					y[t+1].style.transform='translate3d(' + (transition_dist) + 'px, 0px, 0px)';

					break;
    			}

    		}
    	};
    	x[0].onclick = function () {

    		for(i=0;i<y.length;i++)
    		{
    			if(y[i].className == "swiper-slide swiper-slide-active")
    			{
    				t= i-1;

    				if(t == -1)
    					break;

    				//Manipulating the slides
    				z.style.webkitTransform =  'translate3d(' + (transition_dist)*(t)+ 'px, 0px, 0px)'; 
					z.style.MozTransform =  'translate3d(' + (transition_dist)*(t)+ 'px, 0px, 0px)';
					z.style.msTransform =  'translate3d(' + (transition_dist)*(t)+ 'px, 0px, 0px)';
					z.style.OTransform =  'translate3d(' + (transition_dist)*(t)+ 'px, 0px, 0px)';
					z.style.transform = 'translate3d(' + (transition_dist)*(t)+ 'px, 0px, 0px)';
					$('.swiper-wrapper').css('transition-duration','300ms');

					//Manipulating the classes for the slides
		       		for (f=0;f<y.length;f++) {
		        		y[f].className = "swiper-slide";
		        	}
					y[t].style.transform='translate3d(0px, 0px, 0px)';
					y[t].style.opacity="1";
					y[t].className = "swiper-slide swiper-slide-active";
					y[t-1].className = "swiper-slide swiper-slide-prev";
					y[t-1].style.transform='translate3d(' + (-transition_dist) + 'px, 0px, 0px)';

					break;
    			}
    		}
    		
    	};

    }
</script>