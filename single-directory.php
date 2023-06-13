<?php
/**
 * The template for displaying all directory posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package maryboro
 */

get_header();
?>

	<main id="primary" class="site-main container mx-auto min-h-screen">

		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', get_post_type() );

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php

get_footer();
