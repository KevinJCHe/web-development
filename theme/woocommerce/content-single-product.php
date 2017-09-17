<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>

<?php
	/**
	 * woocommerce_before_single_product hook.
	 *
	 * @hooked wc_print_notices - 10
	 */
	 do_action( 'woocommerce_before_single_product' );

	 if ( post_password_required() ) {
	 	echo get_the_password_form();
	 	return;
	 }
?>

<div itemscope itemtype="<?php echo woocommerce_get_product_schema(); ?>" id="product-<?php the_ID(); ?>" <?php post_class(); ?>>


<?php
/*SETUP THE ARRAYS*/
        $product = new WC_product(get_the_ID());                                  /*Woocommerce product methods:
                                                                                        https://docs.woocommerce.com/wc-apidocs/class-WC_Product.html*/
        $product_title = $product->get_title();
        $product_price = $product->get_price();
        $product_sku=$product->get_sku();

        $product_upsell=$product->get_upsells();                                  /*return array of up sell product ids*/
        $product_crosssell=$product->get_cross_sells();                           /*return array of cross sell product ids*/
        $related_product=array_merge($product_upsell,$product_crosssell);

        /*Product Category*/                                       /*https://wordpress.stackexchange.com/questions/73748/get-the-category-from-an-id-of-a-product*/
        $product_id = $product->get_id();
        $prod_cat_id_list = wp_get_post_terms($product_id,'product_cat',array('fields'=>'ids'));
        foreach ($prod_cat_id_list as $pro_cat_id) {
            if($pro_cat_id < 20 || $pro_cat_id > 10 )/*The ids for categories for wall panel, ceiling tiles, etc, fall within the range of 10 to 20*/
                $prod_cat_name = get_cat_name($pro_cat_id);
                $prod_cat_link = get_permalink(get_page_by_title($prod_cat_name));
        }

        /*dimensions*/
        //$product_height=$product->get_height();
        $product_length=$product->get_length();
        $product_width=$product->get_width();

        /*images, for SWIPER*/
        $img_id = $product->get_image_id();                                         /*the main image for product (id)*/
        $gallery_id = $product->get_gallery_attachment_ids();                       /*return array of gallery image ids*/
        $number_of_images = sizeof($gallery_id);      

        /*Images*/
        $image_sing_prod=array(

            /*Product Main Image Pic for SWIPER*/
            wp_get_attachment_image_src($img_id, 'full'),

            
            wp_get_attachment_image_src(940, 'full'), /*Large Square Spec [1]*/
            wp_get_attachment_image_src(939, 'full'), /*Samll Square Spec [2]*/
            wp_get_attachment_image_src(942, 'full'), /*Large Rectangle Spec [3]*/
            wp_get_attachment_image_src(941, 'full'), /*Samll Rectangle Spec [4]*/
            wp_get_attachment_image_src(944, 'full'), /*Large Hexagon Spec [5]*/
            wp_get_attachment_image_src(943, 'full'), /*Samll Hexagon Spec [6]*/
            wp_get_attachment_image_src(945, 'full'), /*Geo 401 Spec [7]*/
            wp_get_attachment_image_src(946, 'full'), /*Geo 101 Spec [8]*/
            wp_get_attachment_image_src(947, 'full'), /*Geo 201 Spec [9]*/
            wp_get_attachment_image_src(948, 'full'), /*Geo 311 Spec [10]*/
            wp_get_attachment_image_src(949, 'full') /*Geo 321 Spec [11]*/
        );

        /*Color Swatch Images*/
        $color_pics = array(); 
        $color_title = array();
        //ID of color image : 912 to 932
        for ($x = 912; $x <= 932; $x++) {
            $color_pics[] = wp_get_attachment_image_src($x, 'full');
            $color_title[] = get_the_title($x);                                //Title of picture is the color name
        }
?>

<div class="container-flex">

	<?php //woocommerce_show_product_images(); ?><!--product-image-->

    <!--Tablet Changes-->
    <div class="swiper-container">
        <div class="swiper-wrapper">
        <!--<div class='swiper-slide'><div><img src="<?php echo $image_sing_prod[0][0]; ?>" alt='image' /></div></div>-->
            <?php 
                $p = 1;         /*cuz don't include first gallery pic (since its only used for hover effect*/

                while ( $p < $number_of_images){

                    if ($p == ($number_of_images /*- 1*/))
                        {}
                    else{
                        $GalImage = wp_get_attachment_image_src( $gallery_id[$p], "full")
            ?>                
            <div class='swiper-slide'><div><img src="<?php echo $GalImage[0]; ?>" alt='image' /></div></div>
            <?php
                        }
                    $p++;
                }
            ?>
        </div> 
        <div class="swiper-pagination"></div><!--NOTE!!!!! THE CLICKABLE FEATURE FOR THE SWIPER PAGINATION BULLET SCRIPT IS LOCATED AT FOOTER.PHP FILE-->
    </div>

    <div class="summary entry-summary">
        <div class="sku-and-product-category-breadcrumb">                                           <!--sku and breadcrumb-->
            <a href="<?php echo $prod_cat_link; ?>"><?php echo $prod_cat_name; ?></a>
            <h4>SKU: <?php echo $product_sku; ?></h4>
        </div>
        <h1 class="cat-header-product"><?php echo $product_title; ?></h1>                           <!--product title-->

        <p class="cat-body pro_desc"><?php echo '<br/>' . $product->post->post_excerpt; ?></p>      <!--product description-->

        <p class="cat-caption-1 pro_dim_title">Dimensions</p>                                       <!--product dimension-->

        <?php   if($product_sku > 99) 
                    echo '<p class="cat-body pro_dim">W '.$product_width. 'in / L ' .$product_length. 'in</p>';
                else 
                    echo '<p class="cat-body pro_dim">W '.$product_width. 'mm / L ' .$product_length.'mm</p>';
        ?>

        <p class="cat-caption-1 pro_downloads_title">Downloads</p>                                  <!--product downloads-->
        <a href="<?php echo get_stylesheet_directory_uri(); ?>\downloads\SerenoPanel_Specification.pdf" target="_blank"><p class="cat-body download_link_1">Sereno Panel Specs</p></a>
        <a href="<?php echo get_stylesheet_directory_uri(); ?>\downloads\SerenoPanel_InstallationGuide.pdf" target="_blank"><p class="cat-body download_link_2">Sereno Panel Inst. Guide</p></a>
        
        <?php woocommerce_template_single_add_to_cart();                                          //color and size
        //Includes add-to-cart, quantity button, variable dropdown selectors               
        //woocommerce_quantity_input_customized(); DOES NOT WORK, INSIDE FUNCTIONS.PHP
        ?>

        <a href="<?php echo esc_url( get_page_link( 104 )); ?>" class="CUTP"><button type="button" class="contact-to-purchase cat-button">Contact Us To Purchase</button></a>

        <nav class="content-single-social-media">
			<?php wp_nav_menu( $args3=array('theme_location'=>'footer3')); ?>  <!--Social Media-->
        </nav>

        <?php
			//woocommerce_template_single_meta();
			woocommerce_template_single_sharing();
		?>

	</div><!-- .summary -->
</div><!--container-flex-->
</div><!-- #product-<?php the_ID(); ?> -->
<!--//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->

	<div class="specification">
        <h1 class="cat-header">Specification</h1>
        <?php   
                if(strpos(my_get_slug(),"square")!==false) {  
                    echo '  <img id="big-spec" src="'.$image_sing_prod[1][0].'" alt="image" />
                            <img id="small-spec" src="'.$image_sing_prod[2][0].'" alt="image" />
                    ';
                }elseif(strpos(my_get_slug(),"rectangle")!==false) {
                    echo '  <img id="big-spec" src="'.$image_sing_prod[3][0].'" alt="image" />
                            <img id="small-spec" src="'.$image_sing_prod[4][0].'" alt="image" />
                    ';
                }elseif(strpos(my_get_slug(),"hexagon")!==false) {
                    echo '  <img id="big-spec" src="'.$image_sing_prod[5][0].'" alt="image" />
                            <img id="small-spec" src="'.$image_sing_prod[6][0].'" alt="image" />
                    ';
                }elseif(strpos(my_get_slug(),"geo")!==false) {
                    if(strpos(my_get_slug(),"401")!==false) { 
                        echo '<img id="geo-spec" src="'.$image_sing_prod[7][0].'" alt="image" />';
                    }elseif(strpos(my_get_slug(),"402")!==false) {
                        echo '<img id="geo-spec" src="'.$image_sing_prod[7][0].'" alt="image" />';
                    }elseif(strpos(my_get_slug(),"101")!==false) {
                        echo '<img id="geo-spec" src="'.$image_sing_prod[8][0].'" alt="image" />';
                    }elseif(strpos(my_get_slug(),"201")!==false) {
                        echo '<img id="geo-spec" src="'.$image_sing_prod[9][0].'" alt="image" />';
                    }elseif(strpos(my_get_slug(),"311")!==false) {
                        echo '<img id="geo-spec" src="'.$image_sing_prod[10][0].'" alt="image" />';
                    }elseif(strpos(my_get_slug(),"321")!==false) {
                        echo '<img id="geo-spec" src="'.$image_sing_prod[11][0].'" alt="image" />';
                    }
                }else {
                    echo '  <img id="big-spec" src="'.$image_sing_prod[1][0].'" alt="image" />
                            <img id="small-spec" src="'.$image_sing_prod[2][0].'" alt="image" />
                    ';
                }
        ?>
    </div>

<!--//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->

    <div class="color-swatch">
        <h1 class="cat-header">Available Colors</h1>
        <div class="color-flex-container">
            <div class="color-chosen">
                <img id="color-selected" src="<?php echo $color_pics[18][0]; ?>" alt="image">
                <p id="color-title-selected" class="cat-button"><?php echo $color_title[18]; ?></p>
            </div>
            <div class="color-option">
                <?php 
                    for ($y = 0; $y < sizeof($color_pics); $y++) {
                        echo '<img id="' .$color_title[$y]. '" class="color-selections" src="' .$color_pics[$y][0]. '" onclick="ChangeColor(this)" alt="image">';
                            //id of each image contains the color title
                    }
                ?>
                <a href="<?php echo get_stylesheet_directory_uri(); ?>\downloads\AK_SP_Colour Codes_VF_Web.pdf" target="_blank"><p class="cat-body download_link_1">Sereno Panel Colours</p></a>
            </div>
        </div><!--color-flex-container-->
    </div><!--color-swatch-->

    <script>
        function ChangeColor(img){
            document.getElementById("color-selected").src = img.src;                //switch color picture using selected image src
            document.getElementById("color-title-selected").textContent = img.id;   //switch color title using the selected image id
        }
    </script>

    
<!--//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
        
    <div id="related-products" class="related-products">
        <h1 class="cat-header">You May Also Like</h1>

        <?php 
            if(count($related_product) < 3) 
            {
                    //echo 'HAI';
            }
            else
            {
                shuffle($related_product);
                for($z=0; $z < 3; $z++)
                {
                   $rel_product[$z] = new WC_product($related_product[$z]);
                   $product_url[$z]= get_permalink($related_product[$z]);
                   $image_id[$z] = $rel_product[$z]->get_image_id();
                   $image_related_prod[$z]=wp_get_attachment_image_src($image_id[$z], 'full');
                }
            }
        ?>

        <!--Big Version-->
        <ul>
            <li><a href="<?php echo $product_url[0]; ?>"><img src="<?php echo $image_related_prod[0][0]; ?>" alt="image" /></a></li>
            <li><a href="<?php echo $product_url[1]; ?>"><img src="<?php echo $image_related_prod[1][0]; ?>" alt="image" /></a></li>
            <li><a href="<?php echo $product_url[2]; ?>"><img src="<?php echo $image_related_prod[2][0]; ?>" alt="image" /></a></li>
        </ul>

        <!--Tablet Changes-->
        <div class="swiper-container">
		    <div class="swiper-wrapper">
			    <div class="swiper-slide">
				    <div>
                        <a href="<?php echo $product_url[0]; ?>"><img src="<?php echo $image_related_prod[0][0]; ?>" alt="image" /></a>
                    </div>
			    </div>
			    <div class="swiper-slide">
				    <div>
                        <a href="<?php echo $product_url[1]; ?>"><img src="<?php echo $image_related_prod[1][0]; ?>" alt="image" /></a>
                    </div>
			    </div>
			    <div class="swiper-slide">
				    <div>
                        <a href="<?php echo $product_url[2]; ?>"><img src="<?php echo $image_related_prod[2][0]; ?>" alt="image" /></a>
                    </div>
			    </div>
		    </div> <!--.swiper-wrapper-->
		    <!-- Add Pagination -->
            <div class="swiper-pagination"></div>
	    </div><!--.swiper-container-->
    </div>

<!--//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
<div itemscope itemtype="<?php echo woocommerce_get_product_schema(); ?>" id="product-<?php the_ID(); ?>" <?php post_class(); ?>>

	<meta itemprop="url" content="<?php the_permalink(); ?>" />

</div><!-- #product-<?php the_ID(); ?> -->