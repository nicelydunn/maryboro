<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package maryboro
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?>>

    <a href="<?php echo get_permalink(); ?><?php if(isset($_REQUEST["fr"])) { echo "?fr"; } ; ?>">
        <div class="relative pb-16/9 overflow-hidden">
            <img class="absolute h-full w-full object-cover opacity-90 hover:opacity-100" src="<?php the_post_thumbnail_url(); ?>" alt="">
        </div> 

        <header class="entry-header px-4">  
            <h1 class="entry-title text-2xl font-semibold text-gray-700 mt-4 hover:text-gray-900">
            <?php
                if(isset($_REQUEST["fr"])) {
                    if(get_field('virtual_main_title_f')) {
                        echo get_field('virtual_main_title_f'); 
                    }
                } else {
                    echo get_the_title();
                }
            ?>
            </h1>
        </header><!-- .entry-header --> 
    </a>
		
    <div class="entry-content px-4">

        <p>
        <?php
            if(isset($_REQUEST["fr"])) {
                if(get_field('virtual_excerpt_f')) {
                    echo get_field('virtual_excerpt_f'); 
                }
            } else {
                echo get_the_excerpt();
            }
        ?>
        </p>
        
	</div><!-- .entry-content -->
	
	<footer class="entry-footer"></footer><!-- .entry-footer -->
	
</article><!-- #post-<?php the_ID(); ?> -->
