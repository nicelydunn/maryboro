<?php
/**
 * The template for displaying all single art custom posts
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
$header_bg = (get_field('art_header')) ? get_field('art_header') : 'https://maryboro.ca/wp-content/themes/maryboro/images/virtual-museum-banner.png';
$header_logo = get_template_directory_uri() . "/images/logo-virtual-museum.png";
$header_title = get_the_title();
$header_author = (get_field("art_author")) ? "by " . get_field("art_author") : "";; // by 
$header_contributor = (get_field("art_contributor")) ? "Contributed by " . get_field("art_contributor") : ""; ; // Contributed by;

echo header_html( $header_bg, $header_logo, $header_title, $header_author, $header_contributor); 
?>

	<main id="primary" class="site-main container mx-auto min-h-screen">

		<!-- <div id="js-slider-anchor"></div> -->

		<p class="mt-8"><a href="/<?php echo get_post_type(); ?>" class="inline-block px-2 py-1 bg-gray-800 text-white rounded hover:text-gray-800 hover:bg-yellow-400 duration-300 ease-in-out"><?php esc_html_e( 'View all Art', 'maryboro' ); ?></a></p>

		<div id="js-slider" class="flex items-start mt-8 relative">

		<?php while ( have_posts() ) : ?>
			<?php the_post(); ?>
			<?php $introduction = ( get_field('art_intro') ) ? get_field('art_intro') : "Introduction"; ?>
			<?php $slide_array[] = $introduction; ?>
			<div class="slide hidden" data-id="1">
				<div class="grid md:grid-cols-3 md:gap-5">
					<div class="md:col-span-2">
						<figure>
							<?php the_post_thumbnail( '', array( 'loading' => 'eager' ) ); ?>
							<figcaption class="mt-2 mb-4 px-2 text-sm text-gray-600"><?php the_post_thumbnail_caption(); ?></figcaption>
						</figure>
					</div>
					<div>
						<h1 class="entry-title text-4xl font-light text-gray-700"><?php echo $introduction; ?></h1>
						<div class="wp-block"><?php the_content(); ?></div>
					</div>
				</div>
			</div>

		<?php endwhile; ?>

		<?php if( have_rows('art_sections') ) :  // virtual sections repeater field ?>
			<?php $i = 2; ?>
			<?php  while( have_rows('art_sections') ) : the_row(); ?>

				<div class="slide hidden" data-id="<?php echo $i; ?>">
					<div class="grid md:grid-cols-3 md:gap-5">
						<div class="md:col-span-2">
							<figure>
								<?php 
									$child_title = get_sub_field('art_title');
									$child_title = str_replace( "(", "(<em>", $child_title );
									$child_title = str_replace( ")", "</em>)", $child_title );
								?>
								<?php $slide_array[] = $child_title; ?>
								<?php if( get_sub_field('art_photo') ) : ?>
									<?php
										$photo = get_sub_field('art_photo');
										$photo_url = $photo['url'];
										$photo_title = $photo['title'];
										$photo_alt = $photo['alt'];
										$photo_caption = $photo['caption'];
									?>
									<img class="w-full object-cover" src="<?php echo $photo_url; ?>" alt="<?php echo $photo_alt; ?>">
									<figcaption class="mt-2 mb-4 px-2 text-sm text-gray-600"><?php echo $photo_caption; ?></figcaption>
								<?php endif; ?>
							</figure>
						</div>
						<div>
							<h1 class="entry-title text-4xl font-light text-gray-700"><?php echo $child_title; ?></h1>
							<div class="wp-block"><?php echo get_sub_field('art_description'); ?></div>
						</div>
					</div>
				</div>

				<?php $i++;?>
			<?php endwhile; ?>

		<?php endif; ?>

		</div>

	</main><!-- #main -->

	<?php echo slider_navigation_html( $slide_array ); ?>

<?php
get_footer();
