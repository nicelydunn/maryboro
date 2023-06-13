<?php

/**
 * Testimonial Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'testimonial-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
// $className = 'testimonial';
// if( !empty($block['className']) ) {
//     $className .= ' ' . $block['className'];
// }
// if( !empty($block['align']) ) {
//     $className .= ' align' . $block['align'];
// }

// Load values and assign defaults.

// Check rows exists.
if( have_rows('photos') ):

    // Loop through rows.
    while( have_rows('photos') ) : the_row();

        // Load sub field value.
        $sub_value = get_sub_field('photos_title');
        // Do something...
        echo $sub_value;

    // End loop.
    endwhile;

// No value.
else :
    // Do something...
endif;
?>

