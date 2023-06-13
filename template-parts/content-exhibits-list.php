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

    <div class="relative pb-16/9 overflow-hidden">
        <img class="absolute h-full w-full object-cover" src="<?php the_post_thumbnail_url(); ?>" alt="">
    </div> 

    <header class="entry-header px-4">  
        
        <?php the_title( '<h1 class="entry-title text-2xl font-semibold text-gray-700 mt-4">', '</h1>' ); ?>
	
    </header><!-- .entry-header --> 
		
    <div class="entry-content px-4">

        <p class="mt-4"><?php echo get_the_excerpt(); ?></p>
        <p class="mt-8"><a href="<?php echo get_permalink(); ?>" class="btn">Read More</a></p>
        
	</div><!-- .entry-content -->
	
	<footer class="entry-footer"></footer><!-- .entry-footer -->
	
</article><!-- #post-<?php the_ID(); ?> -->
