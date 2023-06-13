<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package maryboro
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?>>

    <?php
    $event_link = "";
    $event_target = "_self";
    if(get_field('event_full_page'))
    {
        if(get_field('event_full_page') === "yes"){
            $event_link = get_permalink();
        }
    }
    if(get_field('event_website'))
    {
        $event_link = get_field('event_website');
        $event_target = "_blank";
    }

    ?>

    <?php if($event_link !== "") { ?>
        <a href="<?php echo $event_link; ?>" target="<?php echo $event_target; ?>">
    <?php } ?>

        <div class="relative pb-16/9 overflow-hidden">
            <img class="absolute h-full w-full object-cover opacity-90 hover:opacity-100" src="<?php the_post_thumbnail_url(); ?>" alt="">
        </div> 

        <header class="entry-header px-4">  
            <p class="text-gray-500 text-sm mt-4"><?php esc_html_e( get_field('event_date'), 'marybory' ); ?></p>
            <?php the_title( '<h1 class="entry-title text-2xl font-semibold text-gray-700 hover:text-gray-900">', '</h1>' ); ?>
        </header><!-- .entry-header --> 
    <?php if($event_link !== "") { ?>
        </a>
    <?php } ?>
		
    <div class="entry-content px-4">

        <p><?php echo get_the_excerpt(); ?></p>
        
	</div><!-- .entry-content -->
	
	<footer class="entry-footer"></footer><!-- .entry-footer -->
	
</article><!-- #post-<?php the_ID(); ?> -->
