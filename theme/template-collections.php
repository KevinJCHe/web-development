<?php
/**
 * The template for displaying the homepage.
 *
 * This page template will display any functions hooked into the `homepage` action.
 * By default this includes a variety of product displays and the page content itself. To change the order or toggle these components
 * use the Homepage Control plugin.
 * https://wordpress.org/plugins/homepage-control/
 *
 * Template name: Collections
 *
 * @package storefront
 */

get_header(); ?>

<?php
/*SETUP THE ARRAYS*/
     $image_coll=array(
        wp_get_attachment_image_src(552, 'full'),   /*Jump arrow*/
     );
?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

            <?php do_action( 'storefront_content_top' ); ?><!--breadcrumb-->

            <?php while ( have_posts() ) : the_post();
				do_action( 'storefront_page_before' );
				get_template_part( 'content', 'page' );
			endwhile; // End of the loop. ?>

            <?php 
            $post_per_page=-1;
            $parent_cat_ID=13; /*ID of category Collection*/
            $p=0; //initialize counter

            $args = array('hierarchical' => 1,'show_option_none' => '','hide_empty' => 0,'parent' => $parent_cat_ID,'taxonomy' => 'product_cat');
            $subcats = get_categories($args);
            
            foreach ($subcats as $sc) {
                $subcategory_name[$p] = $sc->name;  /*gets basic, geometric, gallery, and organic name*/

                $ProductSortedBy[$p] = array( 'post_type' => 'product', 'posts_per_page' => $post_per_page, 'product_cat' => $subcategory_name[$p], 'orderby' => 'date', 'order' => 'desc');
                                                    /*gets the product loop for each subcategory, will be passed down to a function*/
                
                $p=$p+1;                            /*increase counter*/
            }
            ?>

        <a id="jump-arrow" href="#basic-coll"><img src="<?php echo $image_coll[0][0]; ?>" alt="image" width="100%" class="bounce"/></a>

        <div class="container-coll">

           

            <div id="geometric-coll" class="geometric-coll"><!--WARNING GEOMETRIC HAS CHANGED TO ELEMENTS-->
                <h1 class="font-header"><?php echo $subcategory_name[1]; ?></h1>
                <p class="font-body-2">Simple shapes. Endless permutations. Mesmerizing patterns.</p>
                <div class="display-coll">
                    <?php product_category_display($ProductSortedBy[1]); ?>
                </div>
            </div>
            <div id="gallery-coll" class="gallery-coll">
                <h1 class="font-header"><?php echo $subcategory_name[2]; ?></h1>
                <p class="font-body-2">Your wall deserves a little flourish.</p>
                <div class="display-coll">
                    <?php product_category_display($ProductSortedBy[2]); ?>
                </div>
            </div>

           

        </div>

        <script>
            $(document).ready(function () {

                //ADD SMOOTH SCROLLING TO

                $("#jump-arrow").on('click', function (event) {

                    // Make sure this.hash has a value before overriding default behavior
                    if (this.hash !== "") {
                        // Prevent default anchor click behavior
                        event.preventDefault();

                        // Store hash
                        var hash = this.hash;

                        // Using jQuery's animate() method to add smooth page scroll
                        // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
                        $('html, body').animate({
                            scrollTop: $(hash).offset().top
                        }, 800, function () {

                            // Add hash (#) to URL when done scrolling (default click behavior)
                            window.location.hash = hash;
                        });
                    } // End if
                });


                //CEHCK WHICH ELEMENT SHOULD BE ANCHORED FOR THE PAGE JUMP ARROW

                $(window).scroll(function () {

                    /*var top_of_basic_element = $("#basic-coll").offset().top;
                    var bottom_of_basic_element = $("#basic-coll").offset().top + $("#basic-coll").outerHeight();

                    var top_of_geometric_element = $("#geometric-coll").offset().top;
                    var bottom_of_geometric_element = $("#geometric-coll").offset().top + $("#geometric-coll").outerHeight();

                    var top_of_gallery_element = $("#gallery-coll").offset().top;
                    var bottom_of_gallery_element = $("#gallery-coll").offset().top + $("#gallery-coll").outerHeight();

                    var top_of_organic_element = $("#organic-coll").offset().top;
                    var bottom_of_organic_element = $("#organic-coll").offset().top + $("#organic-coll").outerHeight();

                    var bottom_of_screen = $(window).scrollTop() + $(window).height();

                    if((bottom_of_screen > top_of_basic_element) && (bottom_of_screen < bottom_of_basic_element)){
                    $("#jump-arrow").attr("href", "#geometric-coll");
                    }
                    else if((bottom_of_screen > top_of_geometric_element) && (bottom_of_screen < bottom_of_geometric_element)){
                    $("#jump-arrow").attr("href", "#gallery-coll");
                    }
                    else if((bottom_of_screen > top_of_gallery_element) && (bottom_of_screen < bottom_of_gallery_element)){
                    $("#jump-arrow").attr("href", "#organic-coll");
                    }
                    else if((bottom_of_screen > top_of_organic_element) && (bottom_of_screen < bottom_of_organic_element)){
                    $("#jump-arrow").attr("href", "#basic-coll");
                    }


                    <div class="container-coll">
                    <div id="basic-coll" class="basic-coll">   
                    <h1 class="font-header"><php echo $subcategory_name[0]; ?></h1>
                    <p class="font-body-2">Building blocks to a better room.</p>
                    <div class="display-coll">
                    <php product_category_display($ProductSortedBy[0]); ?>
                    </div>
                    </div>

                    <div id="geometric-coll" class="geometric-coll">
                    <h1 class="font-header"><php echo $subcategory_name[1]; ?></h1>
                    <p class="font-body-2">Simple shapes. Endless permutations. Mesmerizing patterns.</p>
                    <div class="display-coll">
                    <php product_category_display($ProductSortedBy[1]); ?>
                    </div>
                    </div>
                    <div id="gallery-coll" class="gallery-coll">
                    <h1 class="font-header"><php echo $subcategory_name[2]; ?></h1>
                    <p class="font-body-2">Your wall deserves a little flourish.</p>
                    <div class="display-coll">
                    <php product_category_display($ProductSortedBy[2]); ?>
                    </div>
                    </div>
                    <div id="organic-coll" class="organic-coll">
                    <h1 class="font-header"><php echo $subcategory_name[3]; ?></h1>
                    <p class="font-body-2">When art and nature meet.</p>
                    <div class="display-coll">
                    <php product_category_display($ProductSortedBy[3]); ?>
                    </div>
                    </div>
                    </div>

                    */


                    var top_of_geometric_element = $("#geometric-coll").offset().top;
                    var bottom_of_geometric_element = $("#geometric-coll").offset().top + $("#geometric-coll").outerHeight();

                    var top_of_gallery_element = $("#gallery-coll").offset().top;
                    var bottom_of_gallery_element = $("#gallery-coll").offset().top + $("#gallery-coll").outerHeight();


                    var bottom_of_screen = $(window).scrollTop() + $(window).height();

                    if ((bottom_of_screen > top_of_geometric_element) && (bottom_of_screen < bottom_of_geometric_element)) {
                        $("#jump-arrow").attr("href", "#gallery-coll");
                    }
                    else if ((bottom_of_screen > top_of_gallery_element) && (bottom_of_screen < bottom_of_gallery_element)) {
                        $("#jump-arrow").attr("href", "#geometric-coll");
                    }
                    

                    if (bottom_of_screen > bottom_of_gallery_element)
                        $("#jump-arrow").css("display", "none");
                    else
                        $("#jump-arrow").css("display", "block");
                });
            });
        </script>

<!-------------------------------------------------------------------------------TESTING---------------------------------------------------------------------------------------->

        <!--TABLET CHANGES-->
        <?php product_category_mobile(); ?>

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

                            //Deleting hover effect for products
                            var y = document.getElementsByClassName("product-category-image");
                            for (i=0;i<y.length;i++) {
                                y[i].onmouseover = null;
                                y[i].onmouseout = null;
                            }

                        }

                    }
                </script>'
         ;?>


<!-------------------------------------------------------------------------------TESTING---------------------------------------------------------------------------------------->




        </main><!-- #main -->
</div><!-- #primary -->


<?php
get_footer();