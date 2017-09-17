<?php
/**
 * The loop template file.
 *
 * Included on pages like index.php, archive.php and search.php to display a loop of posts
 * Learn more: http://codex.wordpress.org/The_Loop
 *
 * @package storefront
 */

do_action( 'storefront_loop_before' );




//Set up array
$page_id_array=get_all_page_ids();





while ( have_posts() ) : the_post();
    
    $post=get_post();   // https://developer.wordpress.org/reference/functions/get_post/
    $ID = $post->ID;
    $title = $post->post_title;
    $url= get_post_permalink($ID);

    if(in_array($ID, $page_id_array))
    { 
        echo '
        
        <a href=" ' .$url. ' ">
            <h1>' .$title. '</h1>
        </a>
        
        ';
    }
	else
    {    
	    /**
	     * Include the Post-Format-specific template for the content.
	     * If you want to override this in a child theme, then include a file
	     * called content-___.php (where ___ is the Post Format name) and that will be used instead.
	     */
	    get_template_part( 'content', get_post_format() );
    }

endwhile;





/**
 * Functions hooked in to storefront_paging_nav action
 *
 * @hooked storefront_paging_nav - 10
 */
do_action( 'storefront_loop_after' );
