<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package maryboro
 */

?>

<a href="<?php echo get_permalink(); ?>">
    <div class="border lg:border-none border-gray-200 lg:bg-gray-100 hover:bg-gray-50 transition-all grid grid-cols-3 gap-4 mt-4 md:mt-8 p-4 md:p-0 md:items-center">
        <div class="col-span-2 md:col-span-2 md:col-start-2 lg:grid lg:grid-cols-6">
            <div class="lg:col-span-4 lg:col-start-2 md:pr-4 lg:pr-0">
                <p class="uppercase text-sm text-gray-400 lg:text-center"><?php echo get_the_date( 'l, F j, Y' ); ?></p>
                <?php the_title( '<h1 class="font-semibold text-xl text-gray-600 lg:text-3xl lg:text-center lg:mt-8">', '</h1>' ); ?>
                <p class="hidden md:block lg:text-center lg:mt-4 lg:prose-lg"><?php echo get_the_excerpt() ;?> </p>
            </div>
        </div>
        <?php 
            $image_position = 'top';
            if ( get_field('image_position') ) {
                $image_position = get_field('image_position');
            }
        ?>
        <div class="aspect-w-1 aspect-h-1 md:row-start-1 md:col-start-1">
            <?php the_post_thumbnail('', ['class' => 'h-full w-full object-cover', 'style' => 'object-position: ' . $image_position . '']); ?>
        </div>
    </div>
</a>
