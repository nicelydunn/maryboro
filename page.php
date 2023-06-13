<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package maryboro
 */

get_header();
?>

<?php 
$full_width = 0;
if ( get_field('full_width_image') ) :
	$full_width = get_field('full_width_image');
endif;
?>

<?php while ( have_posts() ) : the_post(); ?>

	<main id="primary">

		<?php if ( $full_width == 1 ) : ?>

			<div>
				<?php echo get_the_post_thumbnail( $post->ID, 'full', array( 'class' => 'w-full [h-40vh] md:h-[60vh] object-cover object-bottom' ) ); ?>
			</div>

			<div class="container mx-auto min-h-screen">
				<div class="max-w-prose sm:m-auto">
					<?php the_title( '<h1 class="entry-title text-4xl font-light text-gray-700 mt-4">', '</h1>' ); ?>
					<div class="prose-lg">
						<?php the_content(); ?>
					</div>
				</div>
			</div>

		<?php else: ?>

			<div class="container mx-auto min-h-screen mt-8">
				<header class="max-w-prose sm:m-auto">
					<?php the_title( '<h1 class="entry-title text-4xl font-light text-gray-700">', '</h1>' ); ?>
				</header>

				<div class="max-w-prose sm:m-auto">

					<?php if ( has_post_thumbnail() ) { ?>     
						<div class="relative overflow-hidden mt-8">
							<img class="" src="<?php the_post_thumbnail_url(); ?>" alt="">
						</div>  
					<?php } ?>

					<div class="prose-lg">
						<?php the_content(); ?>
					</div>
					
				</div>
			</div>

		<?php endif; ?>

	</main>

<?php endwhile; // End of the loop. ?>

	<!-- <main id="primary" class="site-main container mx-auto min-h-screen"> -->

		

			<?php // get_template_part( 'template-parts/content', 'page' ); ?>



		

	<!-- </main>#main -->

<?php
get_footer();
