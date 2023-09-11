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

    <a href="<?php echo get_permalink(); ?>">
        <div class="relative pb-16/9 overflow-hidden">
            <?php the_post_thumbnail('large', ['class' => 'absolute h-full w-full object-cover opacity-90 hover:opacity-100'],''); ?>  
        </div> 

        <header class="entry-header px-4">  
            <?php the_title( '<h1 class="entry-title text-2xl font-semibold text-gray-700 mt-4 hover:text-gray-900">', '</h1>' ); ?>
        </header><!-- .entry-header --> 
    </a>
		
    <div class="entry-content px-4">

        <p><?php echo get_the_excerpt(); ?></p>
        
	</div><!-- .entry-content -->
	
	<footer class="entry-footer"></footer><!-- .entry-footer -->
	
</article><!-- #post-<?php the_ID(); ?> -->
