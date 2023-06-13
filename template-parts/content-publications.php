<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package maryboro
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('max-w-prose sm:m-auto'); ?>>
	<header class="entry-header mt-8">
        <p>
            <img src="<?php the_post_thumbnail_url(); ?>" class="h-64 w-auto m-auto">
        </p>
		<?php the_title( '<h1 class="mt-4 entry-title text-4xl font-light text-gray-700">', '</h1>' ); ?>
        <p><em>By <?php the_field( 'publication_author' ); ?></em></p>
    </header><!-- .entry-header -->


        <div class="entry-content wp-block ">
		<?php
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'maryboro' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			)
		);

		?>
            <?php if( get_field( 'publication_available' ) ) : ?>
                <div class="wp-block bg-gray-100 border shadow px-4 pb-2 mt-6">
                    <?php the_field( 'publication_available' ); ?>
                </div>
            <?php endif; ?>
	    </div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->
