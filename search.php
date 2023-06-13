<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package maryboro
 */

get_header();
?>

	<div class="grid grid-cols-3 container mx-auto min-h-screen mt-8">

		<div class="col-span-2">
		<?php if ( have_posts() ) : ?>

			<h1 class="text-4xl font-light text-gray-700 border-b pb-4 border-gray-500">
				<?php printf( esc_html__( 'Search Results for: %s', 'maryboro' ), get_search_query() );?>
			</h1>

			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'template-parts/content', 'search' ); ?>
			<?php endwhile; ?>
			<?php // the_posts_navigation(); ?>

			<?php else : ?>

			<?php // get_template_part( 'template-parts/content', 'none' ); ?>

			<?php endif; ?>	
			<?php
                $args = array(
                    'show_all'           => false,
                    'prev_next'          => true,
                    'prev_text'          => __('&lsaquo;'),
                    'next_text'          => __('&rsaquo;')
                );
            ?>
            <div class="mt-8">
                <?php echo get_the_posts_pagination( $args ); ?>
            </div>
		</div>
		<div></div>

	</div>	

<?php
// get_sidebar();
get_footer();
