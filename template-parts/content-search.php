<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package maryboro
 */

?>

<div class="flex mt-8 gap-4">
	<div class="h-24 w-24 flex-none">
		<?php the_post_thumbnail('thumbnail', ['class' => 'h-full w-full object-cover rounded-md'],''); ?>
	</div>
	<div class="">
		<div><?php the_title( sprintf( '<p><a href="%s" class="text-red-800 underline hover:text-gray-800 text-xl" rel="bookmark">', esc_url( get_permalink() ) ), '</a></hp>' ); ?>
		<p class="text-gray-500 text-sm"><?php echo get_the_permalink(); ?></p>
		<p class=""><?php echo get_the_excerpt(); ?></p></div>
	</div>
</div>
	

</article><!-- #post-<?php the_ID(); ?> -->
