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

	<div class="page-header bg-cover" style="background-image: url('<?php echo  get_template_directory_uri(); ?>/images/programs-banner.jpg")>		
		<div class="container mx-auto py-4 flex items-center">
			<div class="flex-grow">
				<h1 class="text-2xl md:text-5xl text-center font-semibold text-gray-800">
					<span class="inline-block px-2 py-1 bg-white bg-opacity-50"><?php esc_html_e( 'Programs', 'maryboro' ) ?></span>
				</h1>
			</div>
		</div>
	</div>

	<main id="primary" class="site-main container mx-auto min-h-screen mt-8">

		<?php if ( have_posts() ) : ?>

			<?php while ( have_posts() ) : ?>

				<?php the_post(); ?>
				
                    <?php get_template_part( 'template-parts/content', 'programs-list' ); ?>

			<?php endwhile; ?>

            </div>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>

	</main><!-- #main -->

<?php
// get_sidebar();
get_footer();
