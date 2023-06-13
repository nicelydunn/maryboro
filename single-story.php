<?php
/**
 * The template for displaying all single story  custom posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package maryboro
 */

get_header();

?>
	

	<main id="primary" class="site-main container mx-auto">

        <p class="mt-8"><a href="/<?php echo get_post_type(); ?>" class="inline-block px-2 py-1 bg-gray-800 text-white rounded hover:text-gray-800 hover:bg-yellow-400 duration-300 ease-in-out"><?php esc_html_e( 'View all Stories', 'maryboro' ); ?></a></p>

        <?php the_title( '<h1 class="entry-title text-2xl md:text-4xl font-light text-gray-700 mt-8">', '</h1>' ); ?>
        <p class="text-sm text-gray-500"><?php echo get_the_date(); ?></p>
        <div class="md:grid md:grid-cols-3 gap-8 mt-4 mb-8">
            <div>
            <?php 
                $image_position = 'top';
                if ( get_field('image_position') ) {
                    $image_position = get_field('image_position');
                }
            ?>
                <div class="aspect-w-1 aspect-h-1">
                    <?php the_post_thumbnail('', ['class' => 'h-full w-full object-cover', 'style' => 'object-position: ' . $image_position . '']); ?>
                </div>
                <p class="p-4 text-sm text-gray-600"><?php echo get_the_post_thumbnail_caption(); ?></p>
            </div>
            <div class="md:col-span-2">
                <div class="max-w-prose prose-lg">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    </main><!-- #main -->

    <div class="md:grid md:grid-cols-4 mt-4" id="gallery">

        <div class="bg-gray-900 h-[70vh] md:h-screen relative md:col-span-3">

            <?php if( have_rows('photo_gallery') ): ?>
            
                <div class="absolute left-0 top-0 ml-4 h-full flex items-center z-50">
                    <a href="" title="Previous Photo" class="js-gallery-scroll-previous transition bg-gray-500 opacity-70 hover:opacity-50 text-white rounded-full inline-block p-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M9.707 16.707a1 1 0 0 1-1.414 0l-6-6a1 1 0 0 1 0-1.414l6-6a1 1 0 0 1 1.414 1.414L5.414 9H17a1 1 0 1 1 0 2H5.414l4.293 4.293a1 1 0 0 1 0 1.414z" clip-rule="evenodd"/></svg>
                    </a>
                </div>
                <div class="absolute top-0 right-0 mr-4 h-full flex items-center z-50">
                    <a href="" title="Next Photo" class="js-gallery-scroll-next transition bg-gray-500 opacity-70 hover:opacity-50 text-white rounded-full inline-block p-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 0 1 1.414 0l6 6a1 1 0 0 1 0 1.414l-6 6a1 1 0 0 1-1.414-1.414L14.586 11H3a1 1 0 1 1 0-2h11.586l-4.293-4.293a1 1 0 0 1 0-1.414z" clip-rule="evenodd"/></svg>
                    </a>
                </div>

            <?php endif; ?>

            <?php 
                $i = 1;
                $caption_text = "";
            ?>
            <?php if( have_rows('photo_gallery') ): ?>
                <?php while( have_rows('photo_gallery') ) : the_row(); ?>

                    <?php if( get_sub_field( 'gallery_video' ) || get_sub_field( 'gallery_youtube' ) ) : // if video ?>

                        <div data-photo="<?php echo $i; ?>" class="js-gallery-scroll-photo h-full w-full hidden">
                            <div class="h-full w-full flex justify-center items-center overflow-hidden relative">
                                <?php if (get_sub_field( 'gallery_youtube' )) : ?>
                                    <iframe width="560" height="315" src="<?php echo get_sub_field( 'gallery_youtube' ); ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                                <?php else : ?>
                                    <?php echo get_sub_field('gallery_video'); ?>
                                <?php endif; ?>
                                <!--<iframe class="border-0 h-full left-0 absolute top-0 w-full" width="560" height="315" src="https://www.youtube.com/embed/<?php echo get_sub_field('gallery_video'); ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" loading="lazy" allowfullscreen></iframe>-->
                            </div>
                        </div>

                        <?php
                            $caption_text .= '<p data-caption="' . $i . '" class="hidden">';
                            if( get_sub_field( 'gallery_caption' ) ) {
                                $caption_text .= get_sub_field( 'gallery_caption' );
                            } else {
                                $caption_text .= "";
                            }
                            $caption_text .= '</p>';
                        ?>

                    <?php else : ?>

                        <?php if( get_sub_field( 'gallery_photo' ) ) : ?>
                            <?php $image = get_sub_field('gallery_photo'); ?>
                            <img 
                                width="<?php echo $image['width']; ?>" 
                                height="<?php echo $image['height']; ?>" 
                                data-photo="<?php echo $i; ?>" 
                                class="js-gallery-scroll-photo h-full w-full object-contain mx-auto hidden ls-is-cached lazyloaded" 
                                src="<?php echo $image['url']; ?>" 
                                data-src="<?php echo $image['url']; ?>"
                                data-srcset="<?php echo wp_get_attachment_image_srcset( $image['id'] ); ?>"
                                srcset="<?php echo wp_get_attachment_image_srcset( $image['id'] ); ?>"
                                alt=""
                            >
                        <?php endif; ?>

                        <?php
                            $caption_text .= '<p data-caption="' . $i . '" class="hidden">';
                            if( get_sub_field( 'gallery_caption' ) ) {
                                $caption_text .= get_sub_field( 'gallery_caption' );
                            } else {
                                $caption_text .= $image['caption'];
                            }
                            $caption_text .= '</p>';
                        ?>

                    <?php endif; ?>
                    
                    <?php $i++;?>

                <?php endwhile; ?>
            <?php endif; ?>
            <?php $last = $i++; ?>

            <?php the_post_thumbnail('', ['class' => 'js-gallery-scroll-photo h-full w-full object-contain mx-auto hidden', 'data-photo' => $last]); ?>
        
        </div>

        <div class="md:bg-gray-700 p-8">
            <div class="js-gallery-scroll-captions md:text-white">
                <?php echo $caption_text; ?>
                <p data-caption="<?php echo $last; ?>" class="hidden"><?php echo get_the_post_thumbnail_caption(); ?></p>
            </div>  
        </div>

    </div>

    
<div>	

<div class="bg-gray-700 mt-8">
    <div class="container mx-auto mt-8 py-8">
        <h2 class="text-white text-2xl text-center mb-4"><?php esc_html_e( 'Other Stories', 'maryboro' ); ?></h2>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 md:gap-4">
            <?php 
            if( get_previous_post() ) :
                    $previousId = get_previous_post();
            ?>

            <a href="<?php echo get_permalink( $previousId->ID ); ?>">
                <div class="bg-white border border-gray-200 md:grid md:grid-cols-3 p-2 md:gap-4 hover:bg-gray-50 transition-all">
                    <div class="aspect-w-1 aspect-h-1 hidden md:block">
                        <?php echo get_the_post_thumbnail($previousId->ID, 'thumbnail', ['class' => 'h-full w-full object-cover'] );?>
                    </div>
                    <div class="md:col-span-2 md:flex md:flex-col md:justify-between">
                        <div>
                            <p class="text-gray-400 text-sm"><?php esc_html_e( '&lsaquo; Previous Story', 'maryboro' ); ?></p>
                        </div>
                        <div>
                            <p class="uppercase text-xs text-gray-700"><?php echo get_the_date( 'l, F j, Y', $previousId->ID ); ?></p>
                            <h3 class="font-semibold"><?php echo get_the_title( $previousId->ID ); ?><h3>
                        </div>        
                    </div>
                </div>
            </a>
            <?php endif; ?>

            <?php 
            if( get_next_post() ) :
                    $nextId = get_next_post();
            ?>

            <a href="<?php echo get_permalink( $nextId->ID ); ?>" class="lg:col-start-3 mt-4 md:mt-0">
                <div class="bg-white border border-gray-200 md:grid md:grid-cols-3 p-2 md:gap-4 hover:bg-gray-50 transition-all">
                    <div class="aspect-w-1 aspect-h-1 hidden md:block">
                        <?php echo get_the_post_thumbnail($nextId->ID, 'thumbnail', ['class' => 'h-full w-full object-cover'] );?>
                    </div>
                    <div class="md:col-span-2 md:flex md:flex-col md:justify-between">
                        <div>
                            <p class="text-gray-400 text-sm"><?php esc_html_e( 'Next Story &rsaquo;', 'maryboro' ); ?></p>
                        </div>
                        <div>
                            <p class="uppercase text-xs text-gray-700"><?php echo get_the_date( 'l, F j, Y', $nextId->ID ); ?></p>
                            <h3 class="font-semibold"><?php echo get_the_title( $nextId->ID ); ?><h3>
                        </div>        
                    </div>
                </div>
            </a>

            <?php endif; ?>
        </div>
    </div>

</div>

<?php
get_footer();
