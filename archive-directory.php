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

		<h1 class="text-4xl font-light text-gray-700">Randall Speller's Directory</h1>

        <?php
            $args = array(
                'post_type' => 'directory',
                'post_status' => 'publish',
                'posts_per_page' => -1,
                'meta_query' => [
                    'relation' => 'AND',
                    [
                        'key' => 'directory_name_directory_last_name',
                        'compare' => '!=',
                        'value' => ''
                    ],
                ],
                'orderby' => array(
                    'directory_last_name' => 'DESC',
                ),
            );
            $query = new WP_Query($args);
        ?>
        <?php if ( $query->have_posts() ) : ?>
            <ul class="mt-4 col-count-2 md:col-count-3">
                <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                    <li>
                        <a href="<?php the_permalink(); ?>">
                            <?php if( have_rows('directory_name') ): ?>
                                <?php while( have_rows('directory_name') ): the_row(); ?>
                                    <?php
                                        if(get_sub_field('directory_last_name') ){
                                            esc_html_e(get_sub_field('directory_last_name') . ', ', 'maryboro');
                                        }
                                    ?>
                                    <?php
                                        if(get_sub_field('directory_first_name') ){
                                            esc_html_e(get_sub_field('directory_first_name'), 'maryboro');
                                        }
                                    ?>
                                    <?php
                                        if(get_sub_field('directory_initial') ){
                                            esc_html_e(get_sub_field('directory_initial'), 'maryboro');
                                        }
                                    ?>
                                    <?php
                                        if(get_sub_field('directory_title') ){
                                            esc_html_e(get_sub_field('directory_title'), 'maryboro');
                                        }
                                    ?>
                                <?php endwhile; ?>
                            <?php endif; ?>
                        </a>
                    </li>
                <?php endwhile; ?>
            </ul>
        <?php endif; ?>

        <?php
            $terms = get_terms( array(
                'taxonomy' => 'directory_type'
            ) );
        ?>

        <h3 class="mt-4 font-light text-2xl text-gray-700">Search by Business Types</h3>

        <ul class="mt-4 col-count-2 md:col-count-3">
        <?php foreach( $terms as $term ) : ?>
            <li><a href="/directory_type/<?php echo $term->slug; ?>/"><?php echo $term->name; ?></a> (<?php echo $term->count; ?>)</li>
        <?php endforeach ; ?>
        </ul>

	</main><!-- #main -->

<?php
get_footer();
