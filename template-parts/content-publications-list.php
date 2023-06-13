<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package maryboro
 */

?>
		

<article id="post-<?php the_ID(); ?>" <?php post_class('border-b border-r w-full md:w-1/2 xl:w-1/3 px-4 py-6'); ?>>

    <a href="<?php echo esc_url( get_the_permalink() ); ?>">
        <img src="<?php the_post_thumbnail_url(); ?>" class="h-52 w-36 object-cover mx-auto border">
    </a>

    <header class="entry-header">
        <a href="<?php echo esc_url( get_the_permalink() ); ?>" class="text-red-800 hover:text-gray-800 hover:underline">
            <?php the_title( '<h1 class="entry-title mt-4 text-base truncate">', '</h1>' ); ?>
        </a>
    </header><!-- .entry-header -->

    <div class="entry-content">
        <p class="truncate text-sm">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="h-3 w-3 fill-current text-red-500 inline">
                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
            </svg>
            <?php the_field( 'publication_author' ); ?>
        </p>
    </div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->
