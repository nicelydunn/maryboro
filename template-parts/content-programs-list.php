<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package maryboro
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?>>

    <div class="grid md:grid-cols-3 mt-8 gap-4">
        <div>
            <img class="h-auto w-full" src="<?php the_post_thumbnail_url(); ?>" alt="">
        </div>
        <div class="md:col-span-2">
            <?php the_title( '<h1 class="entry-title text-3xl font-thin text-gray-700">', '</h1>' ); ?>
            <?php if( get_field('program_schedule') ) : ?>
                <p class="text-xl"><?php echo get_field('program_schedule'); ?></p>
            <?php endif; ?>
            <div class="prose-lg mt-4">
                <?php the_content(); ?>
            </div>
        </div>
    </div>
	
</article><!-- #post-<?php the_ID(); ?> -->
