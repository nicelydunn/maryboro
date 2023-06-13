<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package maryboro
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('container mx-auto mt-8'); ?>>

	<?php $full_width = 0; ?>

	<?php if ( get_field('full_width_image') ) : ?>
		<?php $full_width = get_field('full_width_image'); ?>
	<?php endif; ?>

	<?php if ( $full_width == 1 ) : ?>

		<div>
			<?php echo get_the_post_thumbnail(); ?>
		</div>

		<div class="max-w-prose sm:m-auto">
			<div class="prose-lg">
				<?php the_content(); ?>
			</div>
		</div>

	<?php else: ?>

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

	<?php endif; ?>

</article><!-- #post-<?php the_ID(); ?> -->
