<?php
/**
 * Template part for displaying programs custom posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package maryboro
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('max-w-prose sm:m-auto'); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title text-4xl font-light text-gray-700 mt-8">', '</h1>' ); ?>
		<div class="mt-8">
			<?php the_post_thumbnail(); ?>
		</div>
	</header><!-- .entry-header -->

	<div class="entry-content wp-block">
		<?php the_content(); ?>
	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->
