<?php
/**
 * Template part for displaying child virtual custom posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package maryboro
 */

?>

<?php
            
    // Get all children articles
    $args = array(
        'post_type' => 'virtual',
        'orderby' => 'menu_order',
        'posts_per_page' => -1,
        'post_parent' => get_the_ID(),
        'order' => 'ASC'
    );
    $query = new WP_Query($args);

?>
 
<?php if ( $query->have_posts() ) : ?>

    <div class="js-slider mt-4">
                
        <div class="flex justify-between items-center bg-gray-400">
            <div class="btn-prev cursor-pointer bg-gray-800 hover:bg-gray-600 p-2">
                <svg class="w-12 h-12 text-white" fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
            </div>
            <div class="text-white text-2xl text-semibold">
                <span class="slides-current">1</span> of <span class="slides-total">x</span>
            </div>
            <div class="btn-next cursor-pointer bg-gray-800 hover:bg-gray-600 p-2">
                <svg class="w-12 h-12 text-white" fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </div>
        </div>
                                    
        <?php
            /* Start the Loop */
            $i = 1;
            while ( $query->have_posts() ) :
                $query->the_post();
        ?>
               
        <div class="slide transition-all <?php echo ( $i == 1 ) ? "block" : "hidden"; ?>" data-id="<?php echo $i; ?>">
      
            <div class="md:grid md:grid-cols-2 md:gap-x-5">
                <div>
                    <h2 class="text-2xl font-light text-gray-700 mt-4 text-center"><?php the_title(); ?></h2>
                    <div class="wp-block"><?php the_content(); ?></div>
                </div>
                <div>
                    <figure class="mt-4">
                        <?php the_post_thumbnail(); ?>
                        <figcaption class="mt-2 px-2 text-sm text-gray-600"><?php the_post_thumbnail_caption(); ?></figcaption>
                    </figure>
                </div>
            </div>

        </div>

        <?php $i++;?>
        <?php endwhile;
        wp_reset_postdata();
        // the_posts_navigation();
        ?>

    </div>

<?php endif; ?>