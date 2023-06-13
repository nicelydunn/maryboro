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
	if(isset($_REQUEST["fr"])) {
		$section_title = "Expositions";
		$args = array(
			'post_type' => 'virtual',
			'orderby' => 'post_title',
			'meta_key' => 'virtual_main_title_f',
			'meta_value' => ' ',
    		'meta_compare' => '!=',
			'posts_per_page' => -1,
			'post_parent' => 0,
			'order' => 'ASC'
		);
	} else {
		$section_title = "Exhibits";
		$args = array(
			'post_type' => 'virtual',
			'orderby' => 'post_title',
			'posts_per_page' => -1,
			'post_parent' => 0,
			'order' => 'ASC'
		);
	}
    $query = new WP_Query($args);

?>

	<div class="page-header bg-cover" style="background-image: url('<?php echo  get_template_directory_uri(); ?>/images/virtual-museum-banner.png")>		
		<div class="container mx-auto py-4 flex items-center">
			<div>
				<img src="<?php echo get_template_directory_uri(); ?>/images/logo-virtual-museum.png" class="h-20 md:h-24" />
			</div>
			<div class="flex-grow">
				<h1 class="text-2xl md:text-5xl text-center font-semibold text-gray-800">
					<span class="inline-block px-2 py-1 bg-white bg-opacity-50"><?php esc_html_e( $section_title, 'maryboro' ) ?></span>
				</h1>
			</div>
		</div>
	</div>

	<main id="primary" class="site-main container mx-auto min-h-screen">

		<?php if ( $query->have_posts() ) : ?>

			<?php
				if(isset($_REQUEST["fr"])) {
					echo '<p class="mt-8"><a href="/virtual/" class="inline-block px-2 py-1 bg-gray-800 text-white rounded hover:text-gray-800 hover:bg-yellow-400 duration-300 ease-in-out">View English Exhibits</a></p>';
				} else {
					echo '<p class="mt-8"><a href="/virtual/?fr" class="inline-block px-2 py-1 bg-gray-800 text-white rounded hover:text-gray-800 hover:bg-yellow-400 duration-300 ease-in-out">Expositions françaises</a></p>';
				}
			?>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10 mt-4">

			<?php while ( $query->have_posts() ) : ?>

				<?php $query->the_post(); ?>
				
                <?php get_template_part( 'template-parts/content', 'virtual-list' ); ?>

			<?php endwhile; ?>

            </div>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>

	</main><!-- #main -->

<?php

get_footer();
