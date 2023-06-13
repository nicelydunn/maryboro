<?php
/**
 * The template for displaying all single reflections custom posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package maryboro
 */
// if ( has_post_parent( get_the_ID() ) ) :
// 	$parent_url = the_permalink( get_post_parent( get_the_ID() ));
// 	wp_redirect( $parent_url);
// 	exit();
// endif;
get_header();
$slide_array = array();
?>

<?php
// Page Header
$header_bg = (get_field('reflection_header')) ? get_field('reflection_header') : 'https://maryboro.ca/wp-content/themes/maryboro/images/virtual-museum-banner.png';
$header_logo = get_template_directory_uri() . "/images/logo-virtual-museum.png";
$header_title = get_the_title();
$header_author = ''; // by 
$header_contributor = '' ; // Contributed by;

echo header_html( $header_bg, $header_logo, $header_title, $header_author, $header_contributor); 
?>

	<main id="primary" class="site-main container mx-auto min-h-screen">

		<div id="js-slider-anchor"></div>

		<p class="mt-8"><a href="/<?php echo get_post_type(); ?>" class="inline-block px-2 py-1 bg-gray-800 text-white rounded hover:text-gray-800 hover:bg-yellow-400 duration-300 ease-in-out"><?php esc_html_e( 'View all Reflections', 'maryboro' ); ?></a></p>

		<div id="js-slider" class="flex items-start mt-8 relative">

        <?php if( have_rows('reflections') ) : // reflections repearter field ?>
			<?php $i = 1; ?>
            <?php while( have_rows('reflections') ) :  the_row(); ?>
				<div class="slide hidden" data-id="<?php echo $i; ?>">
					<div class="grid md:grid-cols-2">
						<div>
							<?php $slide_array[] = get_sub_field('reflection_title'); ?>
							<?php 
								$old_image = get_sub_field('reflection_old');
								$old_size = 'full';
								if( $old_image ) {
									echo wp_get_attachment_image( $old_image, $old_size );
								}
							?>
						</div>
						<div>
							<?php 
								$new_image = get_sub_field('reflection_new');
								$new_size = 'full';
								if( $new_image ) {
									echo wp_get_attachment_image( $new_image, $new_size );
								} 
							?>
						</div>
					</div>
					<div>
						<div class="prose-lg max-w-prose mx-auto mt-4">
							<h2><?php the_sub_field('reflection_title'); ?></h2>
							<?php the_sub_field('reflection_description'); ?>
						</div>
					</div>
				</div>
				<?php $i++; ?>
            <?php endwhile; ?>
        <?php endif; ?>

		</div>

	</main><!-- #main -->

	<?php echo slider_navigation_html( $slide_array ); ?>

<?php
get_footer();
