<?php
/**
 * The template for displaying archive virtual post types
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package maryboro
 */

get_header();
?>

<?php
            
    // Get all children articles
    $args = array(
        'post_type' => 'crafts',
        'orderby' => 'post_title',
        'posts_per_page' => -1,
        'post_parent' => 0,
        'order' => 'ASC'
    );
    $query = new WP_Query($args);

?>

	<div class="page-header bg-cover" style="background-image: url('<?php echo  get_template_directory_uri(); ?>/images/maryboro-crafts-bg.png'); background-position: center left;">		
		<div class="container mx-auto py-4">
            <div class="h-24"></div>
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
