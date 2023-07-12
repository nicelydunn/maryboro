<?php
/**
 * The template for displaying archive photos post types
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package maryboro
 */

function template_scripts(){
    wp_enqueue_script('gallery_modal', get_template_directory_uri() . '/assets/js/gallery-modal.js', [], '1.0', true);
    // wp_enqueue_style( 'slick', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css' );
    // wp_enqueue_script( 'slick', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js' );
}
add_action( 'wp_enqueue_scripts', 'template_scripts' );

get_header();
?>

<?php
            
    $args = array(
        'post_type' => 'photos',
        'post_status' => 'publish',
        'orderby' => 'date',
        'order' => 'DESC',
        'posts_per_page' => 12
    );
    $query = new WP_Query($args);

?>

	<div class="page-header bg-cover" style="background-image: url('<?php echo  get_template_directory_uri(); ?>/images/virtual-museum-banner.png")>		
		<div class="container mx-auto py-4 flex items-center">
			<div>
				<img src="<?php echo get_template_directory_uri(); ?>/images/logo-virtual-museum.png" class="h-20 md:h-24" />
			</div>
			<div class="flex-grow">
				<h1 class="text-2xl md:text-5xl text-center font-semibold text-gray-800">
					<span class="inline-block px-2 py-1 bg-white bg-opacity-50"><?php esc_html_e( 'Community Photographs', 'maryboro' ) ?></span>
				</h1>
			</div>
		</div>
	</div>

	<main id="primary" class="site-main container mx-auto">

		<?php if ( $query->have_posts() ) : ?>

            <?php if(isset($_GET['photo-gallery'])) : ?>
                <div data-autoload="<?php echo $_GET['photo-gallery']; ?>"></div>
            <?php endif; ?>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-4 mt-8">
            <?php $gallery_array = array(); ?>
            <?php $photo_caption_array = array(); ?>

			<?php while ( $query->have_posts() ) : $query->the_post();  ?>
                <?php 
                    $gallery_post_id = get_the_id();
                    $gallery_image = get_the_post_thumbnail( $gallery_post_id, 'full', array('class' => 'h-full w-full object-contain'));
                    $gallery_caption = get_the_post_thumbnail_caption( $gallery_post_id );
                    $photo_caption_array[] = array( $gallery_post_id, $gallery_image, $gallery_caption );
                    
                    if( have_rows('photo_photos') ):
                        while( have_rows('photo_photos') ) : the_row();
                            if( get_sub_field('photos_image') ) : 
                                $image = get_sub_field('photos_image');
                                $size = 'full';
                                if( $image ) {
                                    $gallery_image = wp_get_attachment_image( $image, $size, "", array( "class" => "h-full w-full object-contain" ) );
                                    $gallery_caption = wp_get_attachment_caption( $image ); 
                                }
                                $photo_caption_array[] = array( $gallery_post_id, $gallery_image, $gallery_caption );
                            endif;
                        endwhile;
                    endif;
                ?>
                
                <div>
                    <div class="relative gallery-filter hover:cursor-pointer" data-id="<?php echo $gallery_post_id; ?>">
                        <div class="aspect-[4/3]">
                            <?php the_post_thumbnail('full', ['class' => 'h-full w-full object-cover'],''); ?>
                        </div>
                        <div class="absolute left-4 bottom-4 z-50 flex">
                            <div class="bg-white text-gray-700 px-2 py-1 text-xs uppercase"><?php echo get_the_date( 'D, F j' ); ?></div>
                            <div class="bg-gray-700 text-white px-2 py-1 text-xs uppercase flex items-center">
                                <?php if( get_field( 'photo_photos' ) ) : ?>
                                    <?php echo count(get_field('photo_photos')) + 1; ?>
                                <?php else: ?>
                                    1
                                <?php endif; ?>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="1.5" class="w-4 h-4 inline-block ml-1" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6.827 6.175A2.31 2.31 0 0 1 5.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 0 0-1.134-.175 2.31 2.31 0 0 1-1.64-1.055l-.822-1.316a2.192 2.192 0 0 0-1.736-1.039 48.774 48.774 0 0 0-5.232 0 2.192 2.192 0 0 0-1.736 1.039l-.821 1.316z"/><path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12.75a4.5 4.5 0 1 1-9 0 4.5 4.5 0 0 1 9 0zm2.25-2.25h.008v.008h-.008V10.5z"/></svg>
                            </div>
                        </div>
                    </div>
                    <div>
                        <?php if( get_field('photo_description') ): ?>
                            <p class="px-2 py-2"><?php echo get_field('photo_description'); ?></p>
                        <?php endif; ?>
                    </div>
                </div>
			<?php endwhile; ?>

            </div>

		<?php endif; ?>

	</main><!-- #main -->
<div id="js-modal-gallery" class="fixed left-0 top-0 h-screen w-screen bg-gray-900 z-50 hidden">
	<div id="close-modal" class="absolute top-4 right-4 z-50 flex align-middle h-12 w-12 hover:cursor-pointer">
	<svg xmlns="http://www.w3.org/2000/svg" class="text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0z"/></svg>
	</div>
	<div class="js-gallery-photos h-screen w-full relative"></div>
    <div class="hidden">
		
        <?php foreach( $photo_caption_array as $photo_caption ) : ?>
            <?php
                $id = $photo_caption[0];
                $image = $photo_caption[1];
                $caption = $photo_caption[2];
                $html = '<div class="flex content-center" data-gallery="' . $id . '">';
                $html .= $image;
                if ( $caption != "" ) :
                    $html .= '<div class="absolute flex w-full h-[90vh] justify-center items-end z-50 top-0 left-0">';
                    $html .= '<div class="max-w-prose text-white text-2xl inline-block bg-gray-900 px-2 py-1 text-center">' . $caption . '</div>';
                    $html .= '</div>';
                endif;
                $html .= '</div>';
                echo $html;
            ?>
        <?php endforeach; ?>
        
    </div>
</div>
<?php

get_footer();
