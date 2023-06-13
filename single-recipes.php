<?php
/**
 * The template for displaying all single recipes custom posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package maryboro
 */

get_header();
?>

	<main id="primary" class="site-main container mx-auto min-h-screen">
		<?php while ( have_posts() ) : ?>

			<?php the_post(); ?>

			    <?php get_template_part( 'template-parts/content', get_post_type() ); ?>

		<?php endwhile; // End of the loop. ?>

	</main><!-- #main -->

<?php
get_footer();
