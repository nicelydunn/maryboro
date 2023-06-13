<?php
/**
 * Template part for displaying virtual custom posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package maryboro
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('max-w-prose sm:m-auto'); ?>>
	<header class="entry-header">
		
        <?php the_title( '<h1 class="entry-title text-4xl font-light text-gray-700 mt-8">', '</h1>' ); ?>
        <figure class="mt-4">
            <?php the_post_thumbnail(); ?>
            <figcaption class="mt-2 px-2 text-sm text-gray-600"><?php the_post_thumbnail_caption(); ?></figcaption>
        </figure>
        
        

	</header><!-- .entry-header -->

	<?php // maryboro_post_thumbnail(); ?>

	<div class="entry-content wp-block mt-4">
		<?php
		the_content();

		
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php maryboro_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
