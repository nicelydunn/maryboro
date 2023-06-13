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
	<header class="entry-header sm:m-auto">
		<?php the_title( '<h1 class="entry-title text-4xl font-light text-gray-700">', '</h1>' ); ?>
	</header><!-- .entry-header --> 

	<div class="entry-content sm:m-auto mt-8">

		<?php if ( has_post_thumbnail() ) { ?>     
			<div class="relative overflow-hidden">
				<img class="" src="<?php the_post_thumbnail_url(); ?>" alt="">
			</div>  
		<?php } ?>

		<div class="wp-block">
			<?php the_content(); ?>
		</div>
		
	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->
