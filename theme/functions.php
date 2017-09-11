<?php
/*--------------------------------------Adding CSS + SWIPER SLIDE SHOW--------------------------------------------------*/
function enqueue_files() {
	wp_enqueue_style( 'swiper.min', get_stylesheet_directory_uri() . '/swiper/css/swiper.min.css',false,'1.1','all');
	wp_enqueue_script( 'swiper.min', get_stylesheet_directory_uri() . '/swiper/js/swiper.min.js', array (), '1.2', true);
	wp_register_script('single-slider', get_stylesheet_directory_uri() . '/swiper/js/swipersingleslide.js', array (), '1.3', true);
	wp_register_script('auto-slider', get_stylesheet_directory_uri() . '/swiper/js/swiperautoslide.js', array (), '1.4', true);
	//wp_register_script('multi-slider', get_stylesheet_directory_uri() . '/swiper/js/swipermultislide.js', array (), '1.5', true);
	
  if ( is_page_template( 'template-aboutsereno.php' ) || is_single() || is_product_category()) {
    // enqueue specific page script files here          for single-product page         for taxonomy category page
	wp_enqueue_script('single-slider');
  } 
  else if (is_page_template( 'template-homepage.php' ) ){
	wp_enqueue_script('auto-slider');  
  }
}
add_action( 'wp_enqueue_scripts', 'enqueue_files' );
/*----------------------------------------------------------------------------------------------------------*/

/*Registering all the menus*/
register_nav_menus(array(
    'footer'=>__('Footer Menu'),
    'footer2'=>__('Footer Menu 2'),
	'footer3'=>__('Footer Menu 3'),
	'footer4'=>__('Footer Menu 4'),
    'header'=>('Header Menu'),
	'loginheader' => __('Login Menu')
));

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/*Removing sidebar (FROM PRODUCT PAGE SPECIFICALLY)*/                                  // SO STUPIDLY FOR SOME STUPID FUCKING REASON, THE HOOK HAS TO BE THE ONE PROVIDED BY
add_action( 'get_header', 'remove_storefront_sidebar' );                               //WOOCOMMERCE OR STOREFRONT. YOU CANT MAKE YOUR OWN. IN THIS CASE, get_header HOOK WAS 
function remove_storefront_sidebar() {                                                 //ALREADY MADE AND CALLED SOMEHWERE ELSE SO YOU DON'T EVEN NEED TO WRITE 
     remove_action( 'storefront_sidebar', 'storefront_get_sidebar',	10 );              //do_action('get_header') IN THE FILES*/ 		
}


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


/*RESIZING AND CROPPING IMAGES*/
/*Homepage*/                                                                             /*DOES NOR WORK WITH PICTURES SMALLER THAN THE INDICATED IMAGE SIZE*/
                                                                                            /*https://developer.wordpress.org/reference/functions/add_image_size/*/
//add_image_size("homepage-background", 1900, 1800, true );
//add_image_size("homepage-banner2-image", 802, 827, true );                                  
//add_image_size("homepage-banner3-image", 737, 691, true );
//add_image_size("BigImage", 420, 560, true ); 
//add_image_size("MediumImage", 420, 480, true ); 
//add_image_size("SmallImage", 420, 400, true );                                            
                                                                                            //IMPORTANT. KEEP THIS COMMENTED OUT UNLESS YOU WANT TO REGENERATE A FEW PICTURES 
/*Single Product Page*/                                                                     //WITH THESE DIMENSIONs. THEN UNCOMMENT ONLY THAT ONE LINE. IF NOT, 
//add_image_size("RelatedProducts", 475, 280, true );                                       //KEEP THEM COMMENTED OUT!!
                                                                                            
/*Inspiration Page*/                                                                     //<h1><?php var_dump( get_intermediate_image_sizes() ); ></h1>
//add_image_size("Long-inspiration-image", 1500, 600, true );                            //IF YOU WANT TO CHECK ALL THE IMAGE SIZES, PLACE THIS CODE IN ONE OF THE PAGES FILE*/
//add_image_size("short-inspiration-image", 750, 600, true );

/*Inspiration Category Page*/
//add_image_size("Product-inspiration-image", 1800, 850, true );
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


/*TO KNOW WHICH PAGE WE ARE ON*/  
function my_get_slug (){
// Get the queried object and sanitize it
	$current_page = sanitize_post( $GLOBALS['wp_the_query']->get_queried_object() );
	// Get the page slug
	$slug = $current_page->post_name; 
	return $slug;
}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


/*Changing Add to Cart text*/  
add_filter( 'woocommerce_product_single_add_to_cart_text', 'woo_custom_cart_button_text' );    // 2.1 +
function woo_custom_cart_button_text() {
        return __( 'ADD TO BAG', 'woocommerce' );
}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


/*Product Category Page Function*/ 
function product_category_display($args){

    echo '<ul class="products">';

            $loop = new WP_Query( $args );
            $counter = 0;                                           /*To keep count*/
            while ( $loop->have_posts() ) : $loop->the_post(); 
            
            echo '<li class="product">
                    <div id="product-category-image" class="product-category-image">
                        <a href=" ' .get_permalink( $loop->post->ID ). ' ">
            ';
 
                                if ($loop->post->ID) 
                                {
                                    $akustus_product = new WC_product($loop->post->ID);
                                    $akustus_product_title=$akustus_product->get_title();
                                    $akustus_gallery_ids = $akustus_product->get_gallery_attachment_ids();              /*return array of gallery ids*/
                                    $akustus_image_id = $akustus_product->get_image_id();
                                    $akustus_image=wp_get_attachment_image_src($akustus_image_id, 'shop_catalog');

                                    echo '<img class="main-image-prod" src="'.$akustus_image[0].'"/>'; 
                                }
                                else 
                                    echo '<img class="main-image-prod" src="'.woocommerce_placeholder_img_src().'" alt="Placeholder" width="300px" height="300px" />'; 

             echo          '<div class="hidden-product">
                                <img id="hidden-image" src=" ' .wp_get_attachment_url( $akustus_gallery_ids[0] ). ' "/>
                                <div>' .$akustus_product_title. '</div>             
                            </div> 
                        </a>
                    </div>

                    <div class="mobile-hidden">
                        <span class="prod-title" style="display:inline-block">' .$akustus_product_title. '</span>
                        <a href=" ' .get_permalink( $loop->post->ID ). ' ">
                            <span class="view-more" style="display:none">VIEW</span> 
                        </a>
                    </div>

                </li>
             ';
              endwhile; 
              wp_reset_query();
            
            echo '</ul><!--/.products-->';
}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


/*Product Category Mobile Page Function*/ 

function product_category_mobile(){
    echo '<script>
            if (matchMedia) {
                var mq = window.matchMedia("(min-width: 1025px)");
                mq.addListener(WidthChange);
                WidthChange(mq);
            }
            function WidthChange(mq) {
                if (mq.matches) {

                    //Product Title
                    var x = document.getElementsByClassName("prod-title");

                    //VIEW
                    var y = document.getElementsByClassName("view-more");

                    var i;
                    for (i = 0; i < x.length; i++) {
                        y[i].style.display = "none";
                    }

                    //Hovering Effect
                    /*var y = document.getElementsByClassName("product");
                    for (i=0;i<y.length;i++) {
                        y[i].onmouseover = function(){
                            this.getElementsByTagName("img")[0].className += " prod_hovering";
                            this.getElementsByClassName("hidden-product")[0].className += " prod_hovering";
                            this.getElementsByClassName("mobile-hidden")[0].className += " prod_hovering";
                        };
                         y[i].onmouseout = function(){
                            this.getElementsByTagName("img")[0].className = " main-image-prod";
                            this.getElementsByClassName("hidden-product")[0].className = " hidden-product";
                            this.getElementsByClassName("mobile-hidden")[0].className = " mobile-hidden";
                        };
                    }*/
                } else {

                    //Product Title
                    var x = document.getElementsByClassName("prod-title");

                    //VIEW
                    var y = document.getElementsByClassName("view-more");

                    var i;
                    /*for (i = 0; i < x.length; i++) {
                        y[i].style.display = "inline-block";
                    }*/

                    //Deleting hover effect
                    /*var y = document.getElementsByClassName("product");
                    for (i=0;i<y.length;i++) {
                        y[i].onmouseover = function(){
                            return;
                        };
                         y[i].onmouseout = function(){
                            return;
                        };
                    }*/
                }
            }
        </script>';
}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


/*Product Search Bar*/
function product_search_bar($name){
echo '  
        <div class="SortBar">
            <form class="sort" action="" method="get">
                <select name="sort" onchange="this.form.submit();">
                  <option value="" disabled selected hidden>SORT BY</option>>
                  <option value="old">Oldest</option>
                  <option value="new">Newest</option>
                  <option value="price">Price</option>
                  <option value="basic">Basic</option>
                  <option value="elements">Elements</option>
                  <option value="gallery">Gallery</option>
                  <option value="organic">Organic</option>
                </select>
            </form>
        </div>';

                if($_GET["sort"]=="price"){
                    $ProductSortedBy= array( 'post_type' => 'product', 'posts_per_page' => -1, 'product_cat' => $name,  'orderby' => 'meta_value_num','meta_key'  => '_price', 'order' => 'desc');
                }
                elseif($_GET["sort"]=="old"){
                    $ProductSortedBy = array( 'post_type' => 'product', 'posts_per_page' => -1, 'product_cat' => $name, 'orderby' => 'date', 'order' => 'desc'); 
                }
                elseif($_GET["sort"]=="new"){
                    $ProductSortedBy = array( 'post_type' => 'product', 'posts_per_page' => -1, 'product_cat' => $name, 'orderby' => 'date', 'order' => 'asc'); 
                }
                elseif($_GET["sort"]=="basic"){          
                    $ProductSortedBy = array('post_type' => 'product', 'posts_per_page' => -1,'tax_query' => array('relation' => 'AND', 
                                            array('taxonomy' => 'product_cat','field' => 'slug','terms' => $name),
                                            array('taxonomy' => 'product_cat','field' => 'slug','terms' => 'basic')),'orderby' => 'date','order' => 'asc');
                }
                elseif($_GET["sort"]=="elements"){          
                    $ProductSortedBy = array('post_type' => 'product', 'posts_per_page' => -1,'tax_query' => array('relation' => 'AND', 
                                            array('taxonomy' => 'product_cat','field' => 'slug','terms' => $name),
                                            array('taxonomy' => 'product_cat','field' => 'slug','terms' => 'elements')),'orderby' => 'date','order' => 'asc');
                }
                elseif($_GET["sort"]=="gallery"){          
                    $ProductSortedBy = array('post_type' => 'product', 'posts_per_page' => -1,'tax_query' => array('relation' => 'AND', 
                                            array('taxonomy' => 'product_cat','field' => 'slug','terms' => $name),
                                            array('taxonomy' => 'product_cat','field' => 'slug','terms' => 'gallery')),'orderby' => 'date','order' => 'asc');
                }
                elseif($_GET["sort"]=="organic"){          
                    $ProductSortedBy = array('post_type' => 'product', 'posts_per_page' => -1,'tax_query' => array('relation' => 'AND', 
                                            array('taxonomy' => 'product_cat','field' => 'slug','terms' => $name),
                                            array('taxonomy' => 'product_cat','field' => 'slug','terms' => 'organic')),'orderby' => 'date','order' => 'asc');
                }

                return $ProductSortedBy;
            
                //https://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters
}
           
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////




/*Make Dropdown Quantity Button*/                                                                           /*DOES NOT WROK!!!!*/
function woocommerce_quantity_input_customized() {
    /*global $product;
    $defaults = array(
    'input_name'   => 'quantity',
    'input_value'   => '1',
    'max_value'   => apply_filters( 'woocommerce_quantity_input_max', '', $product ),
    'min_value'   => apply_filters( 'woocommerce_quantity_input_min', '', $product ),
    'step'   => apply_filters( 'woocommerce_quantity_input_step', '1', $product ),
    'style'  => apply_filters( 'woocommerce_quantity_style', 'float:left; margin-right:10px;', $product )
    );
    
    if ( ! empty( $defaults['min_value'] ) )
        $min = $defaults['min_value'];
    else $min = 1;

    if ( ! empty( $defaults['max_value'] ) )
        $max = $defaults['max_value'];
    else $max = 20;

    if ( ! empty( $defaults['step'] ) )
        $step = $defaults['step'];
    else $step = 1;

    $options = '';

    for ( $count = $min; $count <= $max; $count = $count+$step ) {
        $options .= '<option value="' . $count . '">' . $count . '</option>';
    }

    echo '<div class="quantity_select" style="' . $defaults['style'] . '"><select name="' . esc_attr( $defaults['input_name'] ) . '" title="' . _x( 'Qty', 'Product quantity input tooltip', 'woocommerce' ) . '" class="qty">' . $options . '</select></div>';
    */
}





/*BELOW THESE ARE ALL UNNECESSARY STUFF*/
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/*Removing Add to Cart from products/                               
add_action( 'woocommerce_after_shop_loop_item', 'remove_title' );

function remove_title() {
		remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
}

*/
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/*Upscaling Images (For 1900 pixel banners)*/          
   
/*
$image = wp_get_image_editor( 'cool_image.jpg' );
if ( ! is_wp_error( $image ) ) {
    $image->rotate( 90 );
    $image->resize( 300, 300, true );
    $image->save( 'new_image.jpg' );
}
*/
/*  
function image_crop_dimensions( $default, $orig_w, $orig_h, $new_w, $new_h, $crop ){
    if ( !$crop ) 
        return null; // let the WordPress default function handle this
 
    $aspect_ratio = $orig_w / $orig_h;
    $size_ratio = max($new_w / $orig_w, $new_h / $orig_h);
 
    $crop_w = round($new_w / $size_ratio);
    $crop_h = round($new_h / $size_ratio);
 
    $s_x = floor( ($orig_w - $crop_w) / 2 );
    $s_y = floor( ($orig_h - $crop_h) / 2 );
 
    return array( 0, 0, (int) $s_x, (int) $s_y, (int) $new_w, (int) $new_h, (int) $crop_w, (int) $crop_h );
}
add_filter( 'image_resize_dimensions', 'binary_thumbnail_upscale', 10, 6 );
$cropped_image = image_resize($image_filepath, $width, $height, true);
*/


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/*Email Newsletter Submission function*/ 
function newsletter_email_submission_display()
{
    /*$image_aboutus=array(
        wp_get_attachment_image_src(321, "full")
     );
    echo "
           <div class='aboutus-banner5'>
                <h2>Don't worry, we'll only send you stuff you care about.</h2>";
                ninja_forms_display_form( 5 );
    echo "      
                <img src=' " .$image_aboutus[0][0]. " ' alt='image'/>
            </div>
            ";*/
}

?>