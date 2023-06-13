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

	<main id="primary" class="site-main container mx-auto min-h-screen">

		<?php
			$args = array(
				'post_type' => 'publications',
				'orderby' => 'title',
				'posts_per_page' => -1,
				'order' => 'ASC'
			);
			$query = new WP_Query($args);
		?>

		<?php if ( $query->have_posts() ) : ?>

			<header class="page-header">
                <h1 class="text-4xl font-light text-gray-700 mt-8"><?php esc_html_e( post_type_archive_title(), 'maryboro' ); ?></h1>
				<?php the_archive_description( '<div class="archive-description text-gray-700">', '</div>' ); ?>
			</header><!-- .page-header -->

            <div class="flex flex-wrap border-t border-l mt-8">

			<?php
			/* Start the Loop */
			while ( $query->have_posts() ) :
				$query->the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'publications-list' );

            endwhile;
            wp_reset_postdata();
            ?>

            </div>

            <?php

			// the_posts_navigation();

		// else :

			// get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

	</main><!-- #main -->

<?php
// get_sidebar();
get_footer();
