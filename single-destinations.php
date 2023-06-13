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
	
	<div class="bg-cover" style="background-image: url('<?php echo get_field('destination_header',$post->ID); ?>');">
		<div class="container mx-auto overflow-hidden text-center py-4 flex items-center">
			<div>
				<img src="<?php echo get_template_directory_uri(); ?>/images/logo-virtual-museum.png" class="h-14 md:h-24 mr-2" />
			</div>
			<div class="text-center flex-grow">
				<h1 class="text-2xl md:text-5xl font-semibold text-gray-800">
					<span class="inline-block px-2 py-1 bg-white bg-opacity-50"><?php echo get_the_title($post->ID) ?></span>
				</h1>
				<?php if(get_field('destination_author',$post->ID)) : ?>
					<p class="text-gray-800 mt-1">
						<span class="inline-block px-2 py-1 bg-white bg-opacity-50">
                            by <?php echo get_field('destination_author', $post->ID) ; ?>
                            <?php if(get_field('destination_contributor',$post->ID)) : ?>
                                <?php esc_html_e( '| Contributed by', 'maryboro' ); ?>
                                <?php the_field('destination_contributor') ; ?>
                            <?php endif; ?>
                        </span>
					</p>
				<?php endif; ?>
			</div>
		</div>
	</div>

	<main id="primary" class="site-main container mx-auto min-h-screen">

		<!-- <div id="js-slider-anchor"></div> -->

		<p class="mt-8"><a href="/<?php echo get_post_type(); ?>" class="inline-block px-2 py-1 bg-gray-800 text-white rounded hover:text-gray-800 hover:bg-yellow-400 duration-300 ease-in-out"><?php esc_html_e( 'View all Destinations', 'maryboro' ); ?></a></p>

		<div id="js-slider" class="flex items-start mt-8 relative">

		<?php while ( have_posts() ) : ?>
			<?php the_post(); ?>
			<?php $introduction = ( get_field('destination_intro') ) ? get_field('destination_intro') : "Introduction"; ?>
			<?php $slide_array[] = $introduction; ?>
			<div class="slide hidden" data-id="1">
				<div class="grid md:grid-cols-2 md:gap-5">
					<div class="">
						<figure>
							<?php the_post_thumbnail( '', array( 'loading' => 'eager' ) ); ?>
							<figcaption class="mt-2 mb-4 px-2 text-sm text-gray-600"><?php the_post_thumbnail_caption(); ?></figcaption>
						</figure>
					</div>
					<div>
						<h1 class="entry-title text-4xl font-light text-gray-700"><?php echo $introduction; ?></h1>
						<div class="wp-block">
                            <?php the_content(); ?>
							<?php if( get_field('destination_map_url') ) : ?>
								<div class="mt-4">
									<iframe src="<?php echo get_field('destination_map_url'); ?>" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
								</div>
                            <?php elseif( get_field('destination_map') ) : ?>
                                <div class="mt-4">
                                    <?php the_field('destination_map') ; ?>
                                </div>
                            <?php endif; ?>
                        </div>
					</div>
				</div>
			</div>

		<?php endwhile; ?>

		<?php if( have_rows('destination_sections') ) :  // virtual sections repeater field ?>
			<?php $i = 2; ?>
			<?php  while( have_rows('destination_sections') ) : the_row(); ?>

				<div class="slide hidden h-full" data-id="<?php echo $i; ?>">
					<div class="grid md:grid-cols-3 md:gap-5">
						<div class="md:col-span-2">
							<figure>
								<?php 
									$child_title = get_sub_field('destination_title');
									$child_title = str_replace( "(", "(<em>", $child_title );
									$child_title = str_replace( ")", "</em>)", $child_title );
								?>
								<?php $slide_array[] = $child_title; ?>
								<?php if( get_sub_field('destination_photo') ) : ?>
									<?php
										$photo = get_sub_field('destination_photo');
										$photo_url = $photo['url'];
										$photo_title = $photo['title'];
										$photo_alt = $photo['alt'];
										$photo_caption = $photo['caption'];
									?>
									<div class="flex items-start justify-center">
										<a href="<?php echo $photo_url; ?>" target="_blank"><img class="md:h-[calc(100vh-64px)] md:w-full md:object-contain md:object-top" src="<?php echo $photo_url; ?>" alt="<?php echo $photo_alt; ?>"></a>
									</div>
									<figcaption class="mt-2 mb-4 px-2 text-sm text-gray-600"><?php echo $photo_caption; ?></figcaption>
								<?php endif; ?>
							</figure>
						</div>
						<div>
							<h1 class="entry-title text-4xl font-light text-gray-700"><?php echo $child_title; ?></h1>
							<div class="wp-block"><?php echo get_sub_field('destination_description'); ?></div>
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
