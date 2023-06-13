<?php
/**
 * The template for displaying all single archive custom posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package maryboro
 */

get_header();
?>

	<main id="primary" class="site-main container mx-auto min-h-screen">

		<p class="mt-8">
			<a href="/<?php echo get_post_type(); ?>" class="inline-block px-2 py-1 bg-gray-800 text-white rounded hover:text-gray-800 hover:bg-yellow-400 duration-300 ease-in-out"><?php esc_html_e( 'View all Archives', 'maryboro' ); ?></a>
		</p>

		<?php while ( have_posts() ) : the_post(); ?>

			<?php 
				// Array of all images to be used in "js-gallery-modal"
				$gallery_array = array(); 
				array_push($gallery_array, get_the_post_thumbnail_url($post->ID, 'full'));
			?>

			<article id="post-<?php the_ID(); ?>">

    			<div class="md:grid md:grid-cols-2 md:gap-5 mt-8">

					<div class="mb-4">
						<a class="gallery-image cursor-pointer"><?php the_post_thumbnail(); ?></a>
					</div>

					<div>
						<?php the_title( '<h1 class="entry-title text-4xl font-light text-gray-700">', '</h1>' ); ?>
						<?php if( get_field('archives_caption') ) : ?>
							<div class="prose-lg mt-4">
								<?php echo get_field('archives_caption'); ?>
							</div>
						<?php endif; ?>

						<?php if( get_field('archives_circa') ) : ?>
							<?php if( get_field('archives_circa') === 'c' ) : ?>
								<p class="mt-4"><?php esc_html_e( 'Circa', 'maryboro' ); // FIX <p> position ?> 
							<?php endif; ?>
							<?php if( get_field('archives_date') ) : ?>
								<?php echo get_field('archives_date'); ?></p>
							<?php endif; ?>
						<?php endif; ?>

						<?php if( get_field('archives_location') ) : ?>
							<p class="mt-4">
								<?php $comma = 0; ?>
								<?php if( get_field('archives_street_number') ) : ?>
									<?php $comma++; ?>
									<?php echo get_field( 'archives_street_number' ); ?>
								<?php endif; ?>

								<?php if( get_field('archives_street_name') ) : ?>
									<?php $comma++; ?>
									<?php echo get_field( 'archives_street_name' ); ?>
								<?php endif; ?>

								<?php if( get_field('archives_street_direction') ) : ?>
									<?php $comma++; ?>
									<?php echo get_field( 'archives_street_direction' ); ?>
								<?php endif; ?>

								<?php if( $comma > 0 ) : ?>
									<?php echo ", "; ?>
								<?php endif; ?>
								<?php echo get_field( 'archives_location' ); ?>
							</p>
						<?php endif; ?>

						<?php if( get_field('archives_credit') ) : ?>
							<p class="mt-4">
								<?php esc_html_e( 'Credit', 'maryboro' ); ?>:
								<?php echo get_field('archives_credit'); ?>
							</p>
						<?php endif; ?>

						<?php if( get_field('archives_collection') ) : ?>
							<p class="mt-4">
								<?php echo get_field('archives_collection'); ?>
								<?php esc_html_e( 'Collection', 'maryboro' ); ?>
							</p>
						<?php endif; ?>

						<?php if( have_rows('archives_images') ): ?>
							<p class="mt-4"><? esc_html_e('Additional Photos'); ?></p>
							<div class="grid gap-2 mt-4 grid-cols-4">
								<?php while( have_rows('archives_images') ): the_row(); ?>
									<?php 
										$gallery_image = get_sub_field('archives_image');
										array_push($gallery_array, $gallery_image['url']); 
									?>
									<div>
										<a class="gallery-image cursor-pointer">
											<img src="<?php echo $gallery_image['sizes']['thumbnail']; ?>" class=" aspect-[1/1] object-cover">
										</a>
									</div>
								<?php endwhile; ?>
							</div>
						<?php endif; ?>

					</div>

					<?php // print_r($gallery_array); ?>
					<?php
						// $terms = wp_get_post_terms( 
						//     $post->ID,
						//     'keywords',
						//     array( 
						//         'fields' => 'all'
						//     )
						// );
					?>
			<!-- <ul> -->
			<?php // foreach( $terms as $term ) : ?>
						<!-- <li><a href="/keywords/<?php // echo $term->slug; ?>/"><?php // echo $term->name; ?></a></li> -->
					<?php // endforeach ; ?>
					<!-- </ul> -->


			</article><!-- #post-<?php the_ID(); ?> -->

		<?php endwhile; // End of the loop. ?>

	</main><!-- #main -->

<div id="js-gallery-modal" class="fixed left-0 top-0 h-screen w-screen bg-gray-900 z-50 hidden">
	<div id="close-modal" class="absolute top-4 right-4 z-50 flex align-middle h-12 w-12 hover:cursor-pointer">
	<svg xmlns="http://www.w3.org/2000/svg" class="text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0z"/></svg>
	</div>
	<div class="js-gallery-photos">
		<?php foreach($gallery_array as $gallery): ?>
			<div class="flex content-center"><img src="<?php echo $gallery; ?>" class="h-screen w-screen object-contain"></div>
		<?php endforeach; ?>
	</div>
</div>
<?php
get_footer();
