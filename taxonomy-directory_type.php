<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package maryboro
 */

get_header();
?>

	<main id="primary" class="site-main container mx-auto min-h-screen mt-8">

	<p><a href="/<?php echo get_post_type(); ?>" class="inline-block px-2 py-1 bg-gray-800 text-white rounded hover:text-gray-800 hover:bg-yellow-400 duration-300 ease-in-out"><?php esc_html_e( 'Back to directory', 'marybory' ); ?></a></p

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
				the_archive_title( '<h1 class="page-title mt-8 text-4xl font-light text-gray-700">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<?php while ( have_posts() ) : ?>
				
				<?php the_post(); ?>

					<?php get_template_part( 'template-parts/content', 'directory-business-type' ); ?>

			<?php endwhile; ?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>

	</main><!-- #main -->

<?php
get_footer();
