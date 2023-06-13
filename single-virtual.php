<?php
/**
 * The template for displaying all single virtual custom posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package maryboro
 */

get_header();
$slide_array = array();
?>

<?php
// Page Header
$header_bg = (get_field('virtual_header')) ? get_field('virtual_header') : 'https://maryboro.ca/wp-content/themes/maryboro/images/virtual-museum-banner.png';
$header_logo = get_template_directory_uri() . "/images/logo-virtual-museum.png";
if(isset($_REQUEST["fr"])){
	$header_title = (get_field("virtual_main_title_f")) ? get_field("virtual_main_title_f") : "";
	$header_author = ''; // par
	$header_contributor = ''; // Contribué par
} else {
	$header_title = get_the_title();
	$header_author = ''; // by 
	$header_contributor = '' ; // Contributed by;
}
echo header_html( $header_bg, $header_logo, $header_title, $header_author, $header_contributor); 
?>

	<main id="primary" class="site-main container mx-auto min-h-screen">

		<div id="js-slider-anchor"></div>

		<p class="mt-8">
			<?php 
				if(isset($_REQUEST["fr"])) {
					$archive_link = get_post_type() . "/?fr";
					$archive_text = "Voir toutes expositions virtuelles";
					$translate = '<a href="./" class="inline-block px-2 py-1 bg-gray-600 text-white rounded hover:text-gray-800 hover:bg-yellow-400 duration-300 ease-in-out">English</a>';
				} else { 
					$archive_link = get_post_type();
					$archive_text = "View all Virtual Exhibitions";
					$translate = (get_field("virtual_main_title_f")) ? '<a href="./?fr" class="inline-block px-2 py-1 bg-gray-600 text-white rounded hover:text-gray-800 hover:bg-yellow-400 duration-300 ease-in-out">Français</a>' : "";
				}
			?>
			<a href="/<?php echo $archive_link; ?>" class="inline-block px-2 py-1 bg-gray-800 text-white rounded hover:text-gray-800 hover:bg-yellow-400 duration-300 ease-in-out"><?php esc_html_e( $archive_text, 'maryboro' ); ?></a>
			<?php echo $translate; ?>
		</p>

		<div id="js-slider" class="flex items-start mt-8 relative">

		<?php while ( have_posts() ) : ?>
			<?php the_post(); ?>
			<?php 
			if(isset($_REQUEST["fr"])) : 
				$introduction = ( get_field('virtual_intro_f') ) ? get_field('virtual_intro_f') : "Introduction";
			else :
				$introduction = ( get_field('virtual_intro') ) ? get_field('virtual_intro') : "Introduction";
			endif; 	
			?>
			<?php $slide_array[] = $introduction; ?>
			<div class="slide hidden" data-id="1">
				<div class="grid md:grid-cols-2 md:gap-5">
					<div>
						<figure>
							<?php the_post_thumbnail( '', array( 'loading' => 'eager' ) ); ?>
							<figcaption class="mt-2 mb-4 px-2 text-sm text-gray-600"><?php the_post_thumbnail_caption(); ?></figcaption>
						</figure>
					</div>
					<div>
						<h1 class="entry-title text-4xl font-light text-gray-700"><?php echo $introduction; ?></h1>
						<div class="prose-lg mt-4">
							<?php if(isset($_REQUEST["fr"])) : ?>
								<?php
									
									if(get_field('virtual_description_f')) :
										echo get_field('virtual_description_f');
									else :
										the_content();
									endif;
								?>
							<?php else: ?>
								<?php the_content(); ?>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>

		<?php endwhile; ?>

		<?php if( have_rows('virtual_sections') ) :  // virtual sections repeater field ?>
			<?php $i = 2; ?>
			<?php  while( have_rows('virtual_sections') ) : the_row(); ?>

				<div class="slide hidden" data-id="<?php echo $i; ?>">
					<div class="grid md:grid-cols-2 md:gap-5">
						<div>
							<?php 
								if(isset($_REQUEST["fr"])) {
									$child_title = get_sub_field('virtual_title_f');
									$child_title = str_replace( "(", "(<em>", $child_title );
									$child_title = str_replace( ")", "</em>)", $child_title );
								} else {
									$child_title = get_sub_field('virtual_title');
									$child_title = str_replace( "(", "(<em>", $child_title );
									$child_title = str_replace( ")", "</em>)", $child_title );
								}
							?>
							<?php $slide_array[] = $child_title; ?>
							<?php if( get_sub_field('virtual_video') ) : ?>
								<div class="mb-4"><?php echo get_sub_field('virtual_video'); ?></div>
							<?php else : ?>
								<figure>
									<?php if( get_sub_field('virtual_photo') ) : ?>
										<?php
											$photo = get_sub_field('virtual_photo');
											$photo_url = $photo['url'];
											$photo_title = $photo['title'];
											$photo_alt = $photo['alt'];
											if(isset($_REQUEST["fr"])) :
												if(get_sub_field('virtual_caption_f')) :
													$photo_caption =  get_sub_field('virtual_caption_f');
												else :
													$photo_caption = $photo['caption'];
												endif;
											else :
												$photo_caption = $photo['caption'];
											endif;
										?>
										<img class="w-full object-cover" src="<?php echo $photo_url; ?>" alt="<?php echo $photo_alt; ?>">
										<figcaption class="mt-2 mb-4 px-2 text-sm text-gray-600"><?php echo $photo_caption; ?></figcaption>
									<?php endif; ?>
								</figure>
							<?php endif; ?>
						</div>
						<div>
							<h1 class="entry-title text-4xl font-light text-gray-700"><?php echo $child_title; ?></h1>
							<div class="wp-block">
							<?php 
								if(isset($_REQUEST["fr"])) {
									echo get_sub_field('virtual_description_f');
								} else {
									echo get_sub_field('virtual_description'); 
								} 
							?>
							</div>
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
