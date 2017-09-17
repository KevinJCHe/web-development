<?php
/**
 * The template for displaying the About Us page.
 *
 *
 * Template name: FAQs
 *
 * @package storefront
 */

get_header(); ?>

<script>
$(document).ready(function() {
 
    $('.faq_question').click(function() {
 
        if ($(this).parent().is('.open')){
            $(this).closest('.faq').find('.faq_answer_container').animate({'height':'0'},500); //(this) refers to the click// .closest finds closest ancestor with class .faq// .find finds closest descendent of previous .closest with class.faq_answer_container
            $(this).closest('.faq').removeClass('open');
            $(this).find('#faq-sign').text("+");
        }
        else{
            var newHeight =$(this).closest('.faq').find('.faq_answer').height() +'px'; //.height() returns height of container in pixels// must add px to set value for css text requirement
            $(this).closest('.faq').find('.faq_answer_container').animate({'height':newHeight},500);
            $(this).closest('.faq').addClass('open');
            $(this).find('#faq-sign').text("-");
        }
 
    });
 
});
</script>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<div class="maxwidth">
			<?php do_action( 'storefront_content_top' ); ?><!--breadcrumb-->
		</div>
		 
		<div class="faqs">
            <h2>Order & Delivery</h2>
			<div class="faq"> <!--each question needs its own .faq container so that .closest and .find in the script always find the specific answer-->
				<div class="faq_question">
					<p id="faq-sign" class="cat-caption-1">+</p>
					<p class="cat-caption-1">How can I order Akustus products?</p>
				</div>
				<div class="faq_answer_container">
					<div class="faq_answer">
					<p class="cat-body">
					Give us a call or send us an email letting us know what you’re interested in ordering. We’ll work out the details with you from there.
					</p>
					</div>
				</div>        
			</div>
			
			<div class="faq">
				<div class="faq_question">
					<p id="faq-sign" class="cat-caption-1">+</p>
					<p class="cat-caption-1">What forms of payment do you accept?</p>
				</div>
				<div class="faq_answer_container">
					<div class="faq_answer">
					<p class="cat-body">
					We accept bank transfer, visa, mastercard and paypal.
					</p>
					</div>
				</div>        
			</div>
			
			<div class="faq">
				<div class="faq_question">
					<p id="faq-sign" class="cat-caption-1">+</p>
					<p class="cat-caption-1">Are samples available?</p>
				</div>
				<div class="faq_answer_container">
					<div class="faq_answer">
					<p class="cat-body">
					We can mail 5 memo samples to you free of charge. Simply contact us and provide the colour codes of the colours you prefer, as well as your full mailing address. The complete sample kit is available for purchase as well, just give us a call or send us an email. 
					</p>
					</div>
				</div>        
			</div>
			
			<div class="faq">
				<div class="faq_question">
					<p id="faq-sign" class="cat-caption-1">+</p>
					<p class="cat-caption-1">How long will it take to receive my order?</p>
				</div>
				<div class="faq_answer_container">
					<div class="faq_answer">
					<p class="cat-body">
					All products are made to order and most are shipped within 2 to 3 weeks from date of confirmation. Actual shipping time may vary according to size of order and current production time. If you have any concerns with timing please feel free to let us know.
					</p>
					</div>
				</div>        
			</div>
			
			<div class="faq">
				<div class="faq_question">
					<p id="faq-sign" class="cat-caption-1">+</p>
					<p class="cat-caption-1">Do you ship orders internationally?</p>
				</div>
				<div class="faq_answer_container">
					<div class="faq_answer">
					<p class="cat-body">
					Yes we do! Please note that when shipping outside of Canada, taxes and duties are the responsibility of recipient.
					</p>
					</div>
				</div>        
			</div>
			
			<div class="faq">
				<div class="faq_question">
					<p id="faq-sign" class="cat-caption-1">+</p>
					<p class="cat-caption-1">Can I return a product?</p>
				</div>
				<div class="faq_answer_container">
					<div class="faq_answer">
					<p class="cat-body">
					All products are made to order and Akustus does not accept returns other than for shipping errors or product defect. Claims for product defect, damaged or incorrectly shipped goods must be received within 7 days of delivery.
					</p>
					</div>
				</div>        
			</div>
			
			<div class="faq">
				<div class="faq_question">
					<p id="faq-sign" class="cat-caption-1">+</p>
					<p class="cat-caption-1">Can I cancel or change my order?</p>
				</div>
				<div class="faq_answer_container">
					<div class="faq_answer">
					<p class="cat-body">
					You may change or cancel your order within 4 hours of placing the order. Contact us by phone or email for any change request or cancellation. 
					</p>
					</div>
				</div>        
			</div>
			
			<h2>Sereno Panel</h2>
			
			<div class="faq">
				<div class="faq_question">
					<p id="faq-sign" class="cat-caption-1">+</p>
					<p class="cat-caption-1">Are Sereno Panels safe?</p>
				</div>
				<div class="faq_answer_container">
					<div class="faq_answer">
					<p class="cat-body">
					Sereno Panels are safe for any home or commercial environment. It does not emit dangerous off-gases and is free of PVC and formaldehyde. It also meets Class A fire safety standards according to ASTM-E84 and meets European standard EN 13501-B.
					</p>
					</div>
				</div>        
			</div>
			
			<div class="faq">
				<div class="faq_question">
					<p id="faq-sign" class="cat-caption-1">+</p>
					<p class="cat-caption-1">Are Sereno Panels enviornmentally friendly?</p>
				</div>
				<div class="faq_answer_container">
					<div class="faq_answer">
					<p class="cat-body">
					Yes, Sereno Panels are made from recycled plastic bottle. Firstly, used plastic bottles are shredded into small pieces. After this the plastic is heated and turned into a long continuous fibre strand in an extruder. Next they are torn apart into short strands which are then pressed on top of each other in multiple layers. The end result is a sturdy sheet of Sereno Felt board. Throughout the whole process, no additional chemicals or binding agents are used.
					</p>
					</div>
				</div>        
			</div>
			
			<div class="faq">
				<div class="faq_question">
					<p id="faq-sign" class="cat-caption-1">+</p>
					<p class="cat-caption-1">Is the color consistent between dyelots?</p>
				</div>
				<div class="faq_answer_container">
					<div class="faq_answer">
					<p class="cat-body">
					There may be very slight variations in colour between dyelots.
					</p>
					</div>
				</div>        
			</div>
			
			<div class="faq">
				<div class="faq_question">
					<p id="faq-sign" class="cat-caption-1">+</p>
					<p class="cat-caption-1">How much sound does Sereno Panel absorb?</p>
				</div>
				<div class="faq_answer_container">
					<div class="faq_answer">
					<p class="cat-body">
					Sereno Panels are designed for absorbing human voice frequencies (between 500-4000HZ) and are perfect for use in offices, schools, restaurants and other public spaces. Our standard design is made up of 2 layers of Sereno panels, rated at NRC 0.55 when the panels are mounted directly onto the wall. To increase the value of absorption you can add an air gap behind the panels. You can also add a layer of stone wool behind the panel to achieve higher NRC coefficients.
					</p>
					</div>
				</div>        
			</div>
			
			<div class="faq">
				<div class="faq_question">
					<p id="faq-sign" class="cat-caption-1">+</p>
					<p class="cat-caption-1">Are Sereno Panels pinnable?</p>
				</div>
				<div class="faq_answer_container">
					<div class="faq_answer">
					<p class="cat-body">
					Sereno Panel is pinnable and can be used as a very attractive looking pin board. 
					</p>
					</div>
				</div>        
			</div>
			
			<div class="faq">
				<div class="faq_question">
					<p id="faq-sign" class="cat-caption-1">+</p>
					<p class="cat-caption-1">Can Sereno Panels be used to soundproof a room?</p>
				</div>
				<div class="faq_answer_container">
					<div class="faq_answer">
					<p class="cat-body">
					Not quite, to properly soundproof a room requires specialized materials and construction techniques. However, Sereno Panels do improve acoustics by absorbing sound reverberations that travel around a room. In many cases you can cover the entire room with Sereno Panels and it will absorb enough sound, especially speech and conversational sounds, that no further soundproofing is required. 
					</p>
					</div>
				</div>        
			</div>
			<!--
			<div class="faq">
				<div class="faq_question"><p class="font-sub-header">&#8226 Do you offer installation?</p></div>
				<div class="faq_answer_container">
					<div class="faq_answer">
					<p class="cat-body">
					We do not offer any installation services, however our products are easy to install and can be installed by most contractors. We also provide installation instructions here on our website (link to installation instruction page) 
					</p>
					</div>
				</div>        
			</div>
			-->
			<div class="faq">
				<div class="faq_question">
					<p id="faq-sign" class="cat-caption-1">+</p>
					<p class="cat-caption-1">How do I install Sereno Panels?</p>
				</div>
				<div class="faq_answer_container">
					<div class="faq_answer">
					<p class="cat-body">
					We recommend using an adhesive such as Loctite Powergrab or Liquid Nail; these can likely be found at your local hardware store.  Apply the adhesive to the panel and position it on your wall.  Panels can also be installed using Z Clips which allow for easy removal and repositioning. 
					</p>
					</div>
				</div>        
			</div>
			
			<div class="faq">
				<div class="faq_question">
					<p id="faq-sign" class="cat-caption-1">+</p>
					<p class="cat-caption-1">How do I maintain and clean Sereno Panels?</p>
				</div>
				<div class="faq_answer_container">
					<div class="faq_answer">
					<p class="cat-body">
					Remove spill and stains immediately with water and damp cloth. Avoid using harsh chemicals such as bleach. Fabric cleaner may be used. Test in a inconspicuous spot first. 
					</p>
					</div>
				</div>        
			</div>
			
			
		</div> <!-- .faqs -->
	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();