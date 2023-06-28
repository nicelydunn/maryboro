<?php 

get_header();

?>

	<main id="primary" class="site-main">

		<?php while ( have_posts() ) : the_post(); ?>

            <?php if( get_field('documentaries_youtube') ) : ?>
                <iframe class="w-full h-[80vh] object-cover" src="https://www.youtube.com/embed/<?php echo get_field('documentaries_youtube'); ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            <?php endif; ?>

            <div class="container max-w-prose mx-auto px-4 md:px-0">
                <h1 class="text-2xl font-semibold mt-8"><?php echo get_the_title(); ?></h1>
                <div class="mt-8 prose-lg">
                    <?php if( get_field('documentaries_description') ) { echo get_field('documentaries_description'); } ?>
                </div>
            </div>

		<?php endwhile; ?>

	</main><!-- #main -->

<?php

get_footer();
