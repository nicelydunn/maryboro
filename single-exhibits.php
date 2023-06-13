<?php
/**
 * The template for displaying all single programs custom posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package maryboro
 */

get_header();
?>

	<main id="primary" class="site-main container mx-auto min-h-screen mt-8">

	<p class="mt-8"><a href="/<?php echo get_post_type(); ?>" class="inline-block px-2 py-1 bg-gray-800 text-white rounded hover:text-gray-800 hover:bg-yellow-400 duration-300 ease-in-out"><?php esc_html_e( 'View All Exhibits', 'marybory' ); ?></a></p>

		<?php while ( have_posts() ) : ?>

			<?php the_post(); ?>

			    <?php get_template_part( 'template-parts/content', get_post_type() ); ?>

		<?php endwhile; // End of the loop. ?>

	</main><!-- #main -->

<?php
get_footer();
