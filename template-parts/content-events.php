<?php
/**
 * Template part for displaying event content in single-events.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package maryboro
 */

$bg_colour = ( get_field('event_bg-colour') ) ? get_field('event_bg-colour') : "";
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">

        <?php the_title( '<h1 class="entry-title text-4xl font-light text-gray-700 mt-8 text-center">', '</h1>' ); ?>
        <?php if( get_field('event_date') ) { ?>
            <p class="text-gray-500 text-center"><?php esc_html_e( get_field('event_date'), 'marybory' ); ?></p>
        <?php } ?>  
        <div class="mt-8 text-center">
                <img src="<?php echo get_field( 'event_sponsor' ); ?>" alt="" class="h-32 w-auto inline-block">
        </div>


<div class="grid-events grid grid-rows-4 grid-cols-2 sm:grid-rows-3 sm:grid-cols-4 lg:grid-rows-3 lg:grid-cols-6 gap-3 mt-4">

		<?php if(get_field('event_logo')) : ?>
            <div class="items flex items-center relative overflow-hidden event-title">
                <?php $image = get_field('event_logo'); ?>
                <img src="<?php echo $image['url']; ?>" class="w-full h-auto object-contain">
            </div>
        <?php else : ?>
            <div class="items flex items-center relative overflow-hidden event-title" style="border: 1px solid <?php echo $bg_colour; ?>; background-color: <?php echo $bg_colour; ?>; color: white;">
                <ul>
                    <li class="uppercase ml-5 text-xl pt-4"><span class="bg-white py-1 px-2" style="color: <?php echo $bg_colour; ?>;"><?php the_title(); ?></span></li>
                </ul>
            </div>
        <?php endif; ?>

        <div class="items flex items-center relative overflow-hidden event-list" style="border: 1px solid <?php echo $bg_colour; ?>; background-color: <?php echo $bg_colour; ?>; color: white;">
			<ul>
            <?php if (have_rows('event_lists')) : ?>
                <?php while(have_rows('event_lists')) : the_row(); ?>
                    <li class="uppercase ml-5 text-2xl pt-4"><span class="bg-white py-1 px-2" style="color: <?php echo $bg_colour; ?>;"><?php echo get_sub_field('event_list'); ?></span></li>
                <?php endwhile; ?>
            <?php endif; ?>
			</ul>
		</div>

        <?php if (have_rows('event_photos')) : $i = 1; ?>
            <?php while(have_rows('event_photos')) : the_row(); ?>
            <div class="items flex items-center relative overflow-hidden event-image<?php echo $i; ?>" style="border: 1px solid <?php echo $bg_colour; ?>;">
                <img src="<?php echo get_sub_field('event_photo'); ?>" class="absolute h-full w-full object-cover" alt="">
            </div>
            <?php $i++; ?>
            <?php endwhile; ?>
        <?php endif; ?>
		
	</div>
            
	</header><!-- .entry-header -->

    <div>
    <?php // event_activities repeater
        if( have_rows( 'event_activities' ) ) : ?>

            <h1 class="text-4xl font-light text-gray-700 mt-8"><?php esc_html_e( 'Activities' , 'maryboro' ); ?></h1>

            <div class="grid sm:grid-cols-2 lg:grid-cols-4 mt-8 gap-2">

            <?php while( have_rows( 'event_activities' ) ) : the_row(); ?>
            
                <div class="text-xl text-center"><?php esc_html_e( get_sub_field( 'event_activity' ), 'maryboro' ); ?></div>

            <?php endwhile; ?>

            </div>

        <?php endif ; ?>
            
    </div>

    <div>
    <?php // event_schedules repeater
        if( have_rows( 'event_schedules' ) ) : ?>

            <h1 class="text-4xl font-light text-gray-700 mt-8"><?php esc_html_e( 'Schedule' , 'maryboro' ); ?></h1>

            <div class="grid grid-cols-7 mt-8">

            <?php $current_date = ""; ?>

            <?php while( have_rows( 'event_schedules' ) ) : the_row(); ?>

                <?php
                    if( $current_date == get_sub_field( 'event_schedule_date') ) :
                        $display_date = "";
                    else :
                        $display_date = get_sub_field( 'event_schedule_date');
                    endif;
                ?>
            
                <div class="border-b pt-2 pb-2 col-span-3">
                    <?php if( get_sub_field( 'event_schedule_link' ) != "" ) : ?>
                        <a href="<?php echo get_sub_field( 'event_schedule_link' ); ?>" class="text-red-800 hover:text-gray-800 hover:underline" target="_blank">
                            <?php esc_html_e( get_sub_field( 'event_schedule_name' ), 'maryboro' ); ?>
                        </a>
                    <?php else: ?>
                        <?php esc_html_e( get_sub_field( 'event_schedule_name' ), 'maryboro' ); ?>
                    <?php endif; ?>
                </div>
                <div class="border-b text-right pt-2 pb-2 col-span-2">
                    <?php if( get_sub_field( 'event_schedule_location' )) : ?>
                        <?php echo get_sub_field( 'event_schedule_location' ); ?>
                    <?php endif;?>
                    </div>
                <div class="border-b text-right pt-2 pb-2"><?php esc_html_e( $display_date, 'maryboro' ); ?></div>
                <div class="border-b text-right pt-2 pb-2"><?php esc_html_e( get_sub_field( 'event_schedule_time' ), 'maryboro' ); ?></div>

                <?php $current_date = get_sub_field( 'event_schedule_date' ); ?>

            <?php endwhile; ?>

            </div>

        <?php endif ; ?>
            
    </div>


	<div class="entry-content">
    
            <?php // the_content(); ?>

	</div><!-- .entry-content -->


		<footer class="entry-footer">
			
		</footer><!-- .entry-footer -->

</article><!-- #post-<?php the_ID(); ?> -->
