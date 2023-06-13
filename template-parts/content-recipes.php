<?php
/**
 * Template part for displaying recipe custom posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package maryboro
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title mt-8 text-4xl font-light text-gray-700">', '</h1>' ); ?>
	</header><!-- .entry-header -->

    <div class="md:grid md:grid-cols-2 gap-6 mt-8">

        <div>

            <?php if( have_rows('recipes_photos') ) :  // Photos repeater field ?>

                <div class="js-recipe-photos ">

                <?php  while( have_rows('recipes_photos') ) : the_row(); ?>

                        <img class="h-full object-cover" src="<?php echo get_sub_field('recipes_photo'); ?>" alt="">

                <?php endwhile; ?>

                </div>

            <?php endif; ?>

            <div class="entry-content wp-block">
                <?php the_content(); ?>
            </div><!-- .entry-content -->

        </div>

        <div>

            <?php if( have_rows('recipes_ingredients') ) :  // Ingredients repeater field ?>

                <h2 class="entry-title text-2xl font-semibold text-gray-700">Ingredients</h2>
                <ul class="mt-4">

                <?php  while( have_rows('recipes_ingredients') ) : the_row(); ?>

                    <li><?php echo get_sub_field('recipes_ingredient'); ?></li>

                <?php endwhile; ?>

                </ul>

            <?php endif; ?>

            <?php if( have_rows('recipes_directions') ) :  // Directions repeater field ?>

                <h2 class="mt-4 pt-4 entry-title text-2xl font-semibold text-gray-700 border-t">Directions</h2>
                <ul class="mt-4">

                <?php  while( have_rows('recipes_directions') ) : the_row(); ?>

                    <li><?php echo get_sub_field('recipes_direction'); ?></li>

                <?php endwhile; ?>

                </ul>

            <?php endif; ?>

        </div>

    </div>

</article><!-- #post-<?php the_ID(); ?> -->
