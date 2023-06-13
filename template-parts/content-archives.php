<?php
/**
 * Template part for displaying programs custom posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package maryboro
 */

?>

<?php
$gallery_array = array();
?>

<article id="post-<?php the_ID(); ?>" <?php // post_class('max-w-prose sm:m-auto'); ?>>

    <div class="md:grid md:grid-cols-2 md:gap-5 mt-8">

        <div>
            <?php array_push($gallery_array, get_the_post_thumbnail_url($post->ID, 'full')); ?>
            <a class="" data-photo="1"><?php the_post_thumbnail(); ?></a>
        </div>

        <div>
            <?php the_title( '<h1 class="entry-title text-4xl font-light text-gray-700">', '</h1>' ); ?>
            <?php if( get_field('archives_caption') ) : ?>
                <div class="wp-block">
                    <?php echo get_field('archives_caption'); ?>
                </div>
            <?php endif; ?>

            <?php if( get_field('archives_circa') ) : ?>
                <?php if( get_field('archives_circa') === 'c' ) : ?>
                    <p class="mt-4"><?php esc_html_e( 'Circa', 'maryboro' ); // FIX <p> position ?> 
                <?php endif; ?>
                <?php if( get_field('archives_date') ) : ?>
                    <?php echo get_field('archives_date'); ?></p>
                <?php endif; ?>
            <?php endif; ?>

            <?php if( get_field('archives_location') ) : ?>
                <p class="mt-4">
                    <?php $comma = 0; ?>
                    <?php if( get_field('archives_street_number') ) : ?>
                        <?php $comma++; ?>
                        <?php echo get_field( 'archives_street_number' ); ?>
                    <?php endif; ?>

                    <?php if( get_field('archives_street_name') ) : ?>
                        <?php $comma++; ?>
                        <?php echo get_field( 'archives_street_name' ); ?>
                    <?php endif; ?>

                    <?php if( get_field('archives_street_direction') ) : ?>
                        <?php $comma++; ?>
                        <?php echo get_field( 'archives_street_direction' ); ?>
                    <?php endif; ?>

                    <?php if( $comma > 0 ) : ?>
                        <?php echo ", "; ?>
                    <?php endif; ?>
                    <?php echo get_field( 'archives_location' ); ?>
                </p>
            <?php endif; ?>

            <?php if( get_field('archives_credit') ) : ?>
                <p class="mt-4">
                    <?php esc_html_e( 'Credit', 'maryboro' ); ?>:
                    <?php echo get_field('archives_credit'); ?>
                </p>
            <?php endif; ?>

            <?php if( get_field('archives_collection') ) : ?>
                <p class="mt-4">
                    <?php echo get_field('archives_collection'); ?>
                    <?php esc_html_e( 'Collection', 'maryboro' ); ?>
                </p>
            <?php endif; ?>

            <?php if( have_rows('archives_images') ): ?>
                <?php while( have_rows('archives_images') ): the_row(); ?>
                    <?php 
                        $gallery_image = get_sub_field('archives_image');
                        array_push($gallery_array, $gallery_image['url']); 
                    ?>
                <?php endwhile; ?>
            <?php endif; ?>

        </div>

        <?php // print_r($gallery_array); ?>
        <?php
            // $terms = wp_get_post_terms( 
            //     $post->ID,
            //     'keywords',
            //     array( 
            //         'fields' => 'all'
            //     )
            // );
        ?>
<!-- <ul> -->
<?php // foreach( $terms as $term ) : ?>
            <!-- <li><a href="/keywords/<?php // echo $term->slug; ?>/"><?php // echo $term->name; ?></a></li> -->
        <?php // endforeach ; ?>
        <!-- </ul> -->


</article><!-- #post-<?php the_ID(); ?> -->
