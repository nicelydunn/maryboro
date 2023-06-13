<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package maryboro
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header mt-8">
    <?php // the_terms( $post->ID, 'directory_type', 'Types: ', ' / ' ); ?>

        <h1 class="entry-title text-4xl font-light text-gray-700"><?php esc_html_e( get_the_title(), 'maryboro' ); ?>
            <?php if( have_rows( 'directory_birth_death' ) ) : ?>
                <span class="text-xl">

                <?php while( have_rows( 'directory_birth_death' ) ) : the_row(); ?>
                    <?php
                        $dob = get_sub_field('directory_birth');
                        $dob_status = get_sub_field('directory_birth_status');
                        $dod = get_sub_field('directory_death');
                        $dod_status = get_sub_field('directory_death_status');
                    ?>
                    <?php if( $dob != "" || $dod != "" ): echo "["; endif; ?>
                    <?php if( $dob != "" ): ?>
                        <?php echo $dob; ?>
                        <?php echo ( $dob_status == "e" ) ? esc_html_e( '(Approx.)', 'maryboro') : ""; ?>
                    <?php endif; ?>
                    <?php if( $dob != "" || $dod != "" ): echo " - "; endif; ?>
                    <?php if( $dod != "" ): ?>
                        <?php echo $dod; ?>
                        <?php echo ( $dod_status == "e" ) ? esc_html_e( '(Approx.)', 'maryboro') : ""; ?>
                    <?php endif; ?>
                    <?php if( $dob != "" || $dod != "" ): echo "]"; endif; ?>
                <?php endwhile; ?>
                </span>
            <?php endif; ?>
        </h1>

        <?php if( get_field( 'directory_aka' ) ) : ?>
            <p class="text-sm text-gray-500">
                <?php esc_html_e( 'Also Known As', 'maryboro'); ?>: 
                <?php the_field( 'directory_aka' ); ?>
            </p>
        <?php endif; ?>
	</header><!-- .entry-header -->

	<?php maryboro_post_thumbnail(); ?>

	<div class="entry-content">
        
        <?php 
        // directory_types repeater
        if( have_rows( 'directory_types' ) ) : ?>

            <ul class="mt-4">

            <?php while( have_rows( 'directory_types' ) ) : the_row(); ?>
                
                <?php
                    // $post_type = get_post_type( get_the_ID() );
                    $directory_type = get_term( get_sub_field( 'directory_type' ) , 'directory_type');
                    $opened = get_sub_field( 'directory_opened' );
                    $opened_confirm = get_sub_field( 'directory_opened_confirmed' );
                    $closed = get_sub_field( 'directory_closed' );
                    $closed_confirm = get_sub_field( 'directory_closed_confirmed' );
                    // echo $term->name;
                ?>

                <li>
                    <a class="text-red-800 underline hover:text-gray-800" href="/directory_type/<?php echo $directory_type->slug; ?>"><?php echo $directory_type->name; ?></a>
                    <span class="text-sm text-gray-500">
                        <?php if( $opened == $closed ) : ?>
                            <?php echo $opened; ?>
                            <?php echo ( $opened_confirm == 'e' || $closed_confirm == 'e' ) ? "(Approx.)" : ""; ?>
                        <?php else : ?>
                            <?php echo $opened; ?>
                            <?php echo ( $opened_confirm == 'e' ) ? "(Approx.)" : ""; ?>
                            - 
                            <?php echo ( $closed == "") ? "N/A" : $closed ; ?>
                            <?php echo ( $closed_confirm == 'e' ) ? "(Approx.)" : ""; ?>
                        <?php endif ; ?>
                        
                    </span>
                </li>
            

            <?php endwhile; ?>

            </ul>
        
        <?php else : ?>

        <?php endif ; ?>

        <div class="wp-block ">
            <?php the_content(); ?>
            <?php the_field( 'directory_text' ); ?>
        </div>

        <?php if( get_field( 'directory_notes' ) ) : ?>
            <p class="mt-4 border-t border-gray-300 mr-[50%]"></p>
            <div class="mt-4 prose-sm"><?php echo the_field( 'directory_notes' ); ?></div>
        <?php endif; ?>

        <?php // directory_related repeater
        if( have_rows( 'directory_related' ) ) : ?>

            <p class="mt-4"><strong><?php esc_html_e( 'See Also', 'maryboro' ); ?></strong></p>
            <ul>

            <?php while( have_rows( 'directory_related' ) ) : the_row(); ?>
                
                <?php if( get_sub_field( 'directory_related_link' ) != "" ): ?>
                    <?php 
                        $related = get_sub_field( 'directory_related_link' ); 
                        $post_type = get_post_type( get_the_ID() );
                    ?>

                    <li>
                        <a class="text-red-800 underline hover:text-gray-800" href="/<?php echo $post_type . '/' . $related->post_name; ?>"><?php echo $related->post_title; ?></a>
                    </li>
                <?php endif; ?>

            <?php endwhile; ?>

            </ul>

        <?php else : ?>

        <?php endif ; ?>

	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->
