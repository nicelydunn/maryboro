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

    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;       
    $args = array(
        'post_type' => 'archives',
        'post_status' => 'publish',
        'orderby' => 'title',
        'posts_per_page' => 50,
        'post_parent' => 0,
        'order' => 'ASC',
        'paged' => $paged
    );
    $query = new WP_Query($args);

?>

	<main id="primary" class="site-main container mx-auto min-h-screen">

        <div class="mt-4">
            <?php echo do_shortcode( "[wd_asp elements='search,results' ratio='100%,100%' id=1]" ); ?>
        </div>

        <div class="grid grid-cols-2 items-center">
            <div>
                <?php $count_posts = wp_count_posts( 'archives' )->publish; ?>
                <?php echo $count_posts; ?> archive items
            </div>
            <div>
                <?php
                    $args = array(
                        'show_all'          => false,
                        'mid_size'          => 2,
                        'prev_next'         => true,
                        'prev_text'         => __('&lsaquo;'),
                        'next_text'         => __('&rsaquo;'),
                        'total'             => $query->max_num_pages
                    );
                ?>
                <?php the_posts_pagination( $args ); ?>
            </div>
        </div>

		<?php if ( $query->have_posts() ) : ?>

            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-4 mt-8">

			<?php while ( $query->have_posts() ) : ?>

				<?php $query->the_post(); ?>

                <a href="<?php the_permalink(); ?>" class="bg-gray-100 hover:bg-gray-200 p-4 rounded transition-all drop-shadow-sm">
                    <div>
                        <div class="aspect-w-1 aspect-h-1">
                            <?php the_post_thumbnail( 'large', ['class' => 'object-cover'] ); ?>
                        </div>
                        <?php the_title( '<p class="pt-2 text-sm text-center">', '</p>' ); ?>
                    </div>
                </a>

			<?php endwhile; ?>

            </div>

            <?php
                $args = array(
                    'show_all'          => false,
                    'mid_size'          => 2,
                    'prev_next'         => true,
                    'prev_text'         => __('&lsaquo;'),
                    'next_text'         => __('&rsaquo;'),
                    'total'             => $query->max_num_pages
                );
            ?>
            <div class="mt-8">
                <?php the_posts_pagination( $args ); ?>
            </div>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>

	</main><!-- #main -->

<?php

get_footer();
