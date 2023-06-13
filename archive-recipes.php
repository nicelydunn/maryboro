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

<!-- <?php
$categories = get_categories( array(
    'orderby' => 'name',
    'order'   => 'ASC',
	'taxonomy'            => 'category',
	'hide_empty'          => 0,
    'hide_title_if_empty' => false
) );

foreach( $categories as $category ) {
 //echo '<div class="col-md-4"><a href="' . get_category_link($category->term_id) . '">' . $category->name . '</a></div>';   
	print_r($category);
} ?> -->

	<main id="primary" class="site-main container mx-auto min-h-screen mt-8">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="text-4xl font-light text-gray-700"><?php esc_html_e( post_type_archive_title(), 'maryboro' ); ?></h1>
				<?php the_archive_description( '<div class="archive-description text-gray-700">', '</div>' ); ?>
			</header><!-- .page-header -->

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10 mt-8">

			<?php while ( have_posts() ) : ?>

				<?php the_post(); ?>
				
                    <?php get_template_part( 'template-parts/content', 'simple-list' ); ?>

			<?php endwhile; ?>

            </div>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>

	</main><!-- #main -->

<?php
get_footer();
