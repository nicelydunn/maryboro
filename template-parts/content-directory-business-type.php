<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package maryboro
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header mt-4">
		<?php the_title( '<p class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark" class="text-red-800 hover:text-gray-800 hover:underline">', '</a></p>' ); ?>
	</header><!-- .entry-header -->


	<div class="entry-content">
        <p><?php esc_html_e( get_the_excerpt(), 'maryboro'); ?></p>
	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->
