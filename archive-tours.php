<?php
/**
 * The template for displaying archive tours post types
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package maryboro
 */

get_header();
?>

<?php
            
    $args = array(
        'post_type' => 'tours',
        'orderby' => 'post_title',
        'posts_per_page' => -1,
        'post_parent' => 0,
        'order' => 'ASC'
    );
    $query = new WP_Query($args);

?>

	<div class="page-header bg-cover" style="background-image: url('<?php echo  get_template_directory_uri(); ?>/images/reflections-banner.jpg")>		
		<div class="container mx-auto py-4 flex items-center">
			<div>
				<img src="<?php echo get_template_directory_uri(); ?>/images/logo-virtual-museum.png" class="h-20 md:h-24" />
			</div>
			<div class="flex-grow">
				<h1 class="text-2xl md:text-5xl text-center font-semibold text-gray-800">
					<span class="inline-block px-2 py-1 bg-white bg-opacity-50"><?php esc_html_e( 'Tours', 'maryboro' ) ?></span>
				</h1>
			</div>
		</div>
	</div>

	<main id="primary" class="site-main container mx-auto min-h-screen">

		<?php if ( $query->have_posts() ) : ?>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10 mt-8">

			<?php while ( $query->have_posts() ) : ?>

				<?php $query->the_post(); ?>
				
                <?php get_template_part( 'template-parts/content', 'simple-list' ); ?>

			<?php endwhile; ?>

            </div>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>

	</main><!-- #main -->

<?php

get_footer();
