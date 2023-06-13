<?php
/**
 * The template for displaying archive story post types
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package maryboro
 */

get_header();
?>

<?php
      
    
    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
    $args = array(
        'post_type' => 'story',
        'orderby' => 'post_date',
        'post_status' => 'publish',
        'order' => 'DESC',
        'posts_per_page' => 10,
        'paged' => $paged
    );
    $query = new WP_Query($args);

?>

	<main id="primary" class="site-main container mx-auto min-h-screen">

        <h2 class="mt-8 text-4xl font-light text-gray-700"><?php esc_html_e( 'Stories', 'maryboro' ); ?></h2>

		<?php if ( $query->have_posts() ) : ?>

			<?php while ( $query->have_posts() ) : ?>

				<?php $query->the_post(); ?>
				
                <?php get_template_part( 'template-parts/content', get_post_type() ); ?>

			<?php endwhile; ?>

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

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>

	</main><!-- #main -->

<?php

get_footer();
