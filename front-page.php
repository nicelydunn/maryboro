<?php
/**
 * The template for displaying the homepage
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @package maryboro
 */

get_header();
?>

	<main id="primary" class="site-main">

        <div class="container mx-auto">

            <?php if ( have_posts() ) : ?>
                <?php while ( have_posts() ) : the_post(); ?>

                <div class="lg:grid lg:grid-cols-5 mt-8">
                    <div class="lg:bg-gray-100 lg:row-span-6 lg:col-span-4 lg:row-start-1 lg:col-start-1"></div>
                    <div class="lg:row-span-4 lg:row-start-2 lg:col-start-1 lg:col-span-2">
                        <div class="lg:p-8 lg:text-center">
                            <?php the_title( '<h1 class="text-4xl font-light text-gray-700">', '</h1>' ); ?>
                            <div class="prose-lg mt-4">
                                <?php the_content(); ?>
                            </div>
                            <div class="flex justify-between md:justify-around mt-8 mb-8 z-10">
                                <div><a href="/donate-an-artifact/" class="inline-block px-2 py-1 bg-gray-800 text-white rounded hover:text-gray-800 hover:bg-yellow-400 duration-300 ease-in-out"><?php esc_html_e( 'Donate an Artifact', 'maryboro' )?></a></div>
                                <div><a href="/book-your-event/" class="inline-block px-2 py-1 bg-gray-800 text-white rounded hover:text-gray-800 hover:bg-yellow-400 duration-300 ease-in-out"><?php esc_html_e( 'Book Your Event', 'maryboro' )?></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="lg:row-span-4 lg:row-start-2 lg:col-start-3 lg:col-span-3 py-8 relative">
                        <?php
                            $args = array(
                                'post_type' => 'photos',
                                'post_status' => 'publish',
                                'orderby' => 'date',
                                'order' => 'DESC',
                                'posts_per_page' => 1
                            );
                            $query = new WP_Query($args);
                        ?>
                        <?php if( $query->have_posts() ) : ?>
                            <?php while( $query->have_posts() ) : $query->the_post(); ?>
                                <?php if( get_field('photo_description') ) : ?>
                                    <div class="absolute top-8 left-4 text-white text-4xl font-light text-shadow pt-4"><?php esc_html_e( 'Community Photographs', 'maryboro' ) ?></div>
                                    <div class="absolute right-4 bottom-8 text-white text-xl text-shadow pl-4 pb-4"><?php the_field('photo_description'); ?></div>
                                <?php endif; ?>
                                <a href="/photos/?photo-gallery=<?php echo get_the_ID(); ?>"><?php the_post_thumbnail('full', ['class' => 'h-full w-full object-cover'],''); ?></a>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <?php the_post_thumbnail('full', ['class' => 'h-full w-full object-cover'],''); ?> 
                        <?php endif; ?>
                        <?php wp_reset_postdata(); ?>
                    </div>
                </div>

                <?php endwhile; ?>
            <?php endif; ?> 
        </div>

        <?php
                // Get next 3 events
                $today = date('d/m/Y g:i a', strtotime("now"));
                $args = array(
                    'post_type' => 'events',
                    'orderby' => 'meta_value',
                    'meta_key' => 'date_start',
                    // 'meta_query' => array(
                    //     array(
                    //         'key' => 'date_start',
                    //         'value' => $today,
                    //         'compare' => '<=',
                    //         'type'=> 'DATE'
                    //     )
                    // ),
                    //'orderby' => 'meta_value',
                    'posts_per_page' => -1,
                    'order' => 'ASC',
                    'posts_per_page' => 3
                );
                $query = new WP_Query($args);
                // echo $query->request;
		    ?>
            <?php if ( $query->have_posts() ) : ?>
            <div class=" bg-gray-200 mt-8">
                <div class="container mx-auto pt-8 pb-4">
                    <div class="grid grid-cols-2">
                        <div>
                            <h2 class="text-gray-700 text-3xl"><?php esc_html_e( 'Events', 'maryboro' ); ?></h2>
                        </div>
                        <div class="text-right">
                            <a href="/events/" class="inline-block px-2 py-1 bg-gray-700 rounded text-white uppercase text-xs"><?php esc_html_e( 'View all events', 'maryboro' ); ?></a>
                        </div>
                    </div>
                    <div class="sm:grid sm:grid-cols-2 md:grid-cols-3 gap-7 mt-4">
                        <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                            <div class="mb-4 bg-white border-4 border-gray-200 hover:border-gray-700 transition-all">
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
                                    <?php 
                                        $image_position = 'top';
                                        if ( get_field('image_position') ) {
                                            $image_position = get_field('image_position');
                                        }
                                    ?>
                                    <div class="aspect-w-16 aspect-h-9">
                                        <?php the_post_thumbnail('large', ['class' => 'w-full h-full object-cover', 'style' => 'object-position: ' . $image_position . '' ]); ?>
                                    </div>
                                    <div class="px-4 py-6">
                                        <p class="text-xs uppercase tracking-wide text-gray-400"><?php echo get_field('event_date'); ?></p>
                                        <?php the_title( '<h3 class="text-xl text-gray-700">', '</h3>' ); ?>
                                        
                                        <!-- <p class=""><?php echo get_the_excerpt(); ?></p> -->
                                    </div>
                                    <?php if($event_link !== "") { ?>
                                        </a>
                                    <?php } ?>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>

            <?php endif; ?> 

            <?php
                // Get all story posts
                $args = array(
                    'post_parent' => 0,
                    'post_status' => 'publish',
                    'post_type' => 'story',
                    'orderby' => 'desc',
                    'posts_per_page' => 3
                );
                $query = new WP_Query($args);
		    ?>
            <?php if ( $query->have_posts() ) : ?>

            <?php if ( is_user_logged_in() ) { ?>
                <div class="container mx-auto mt-8 hidden">
                    <div class="feature-grid">
                        <div class="feature-image-1 aspect-[16/9] lg:aspect-[4/3] relative">
                            <img class="h-full w-full object-cover" src="https://maryboro.ca/wp-content/uploads/2022/09/Randy-Meredith-at-Grr8-Finds-December-31-2021-768x1024.jpg" alt="">
                        </div>
                        <div class="feature-image-2 aspect-[16/9] lg:aspect-[4/3] relative">
                            <img class="h-full w-full object-cover" src="https://maryboro.ca/wp-content/uploads/2022/09/Randy-Meredith-at-Grr8-Finds-December-31-2021-768x1024.jpg" alt="">
                            <div class="absolute left-0 bottom-0 text-white px-4 py-4">
                                <p class="text-md font-semibold shadow-md leading-5">The Kawartha Crocodile: The Story of Kinmount’s Dr. E. White and his Unusual Pet</p>
                                <p class="text-sm shadow-md">Friday, September 23, 2022</p>
                            </div>
                        </div>
                        <div class="feature-image-3 aspect-[16/9] lg:aspect-[4/3] relative">
                            <img class="h-full w-full object-cover" src="https://maryboro.ca/wp-content/uploads/2022/09/Randy-Meredith-at-Grr8-Finds-December-31-2021-768x1024.jpg" alt="">
                        </div>
                        <div class="feature-image-4 aspect-[16/9] lg:aspect-[4/3] relative">
                            <img class="h-full w-full object-cover" src="https://maryboro.ca/wp-content/uploads/2022/09/Randy-Meredith-at-Grr8-Finds-December-31-2021-768x1024.jpg" alt="">
                        </div>
                        <div class="feature-image-5 aspect-[16/9] lg:aspect-[4/3] relative">
                            <img class="h-full w-full object-cover" src="https://maryboro.ca/wp-content/uploads/2022/09/Randy-Meredith-at-Grr8-Finds-December-31-2021-768x1024.jpg" alt="">
                        </div>
                        <!-- <div class="grid feature-image-1 aspect-[1/1] w-full h-auto">
                            <div class="col-start-1 row-start-1">
                                <img class="h-full w-full object-cover" src="https://maryboro.ca/wp-content/uploads/2022/09/Randy-Meredith-at-Grr8-Finds-December-31-2021-768x1024.jpg" alt="">
                            </div>
                            <div class="col-start-1 row-start-1 self-end">
                                <p class="text-white">Friday, September 23, 2022</p>
                                <p class="text-white">The Kawartha Crocodile: The Story of Kinmount’s Dr. E. White and his Unusual Pet</p>
                            </div>
                        </div>
                        <div class="grid feature-image-2">
                            <div class="col-start-1 row-start-1">
                                <img class="h-full w-full object-cover" src="https://maryboro.ca/wp-content/uploads/2022/09/Randy-Meredith-at-Grr8-Finds-December-31-2021-768x1024.jpg" alt="">
                            </div>
                            <div class="col-start-1 row-start-1 self-end">
                                <p class="text-white">Friday, September 23, 2022</p>
                                <p class="text-white">The Kawartha Crocodile: The Story of Kinmount’s Dr. E. White and his Unusual Pet</p>
                            </div>
                        </div>
                        <div class="grid feature-image-3">
                            <div class="col-start-1 row-start-1">
                                <img class="h-full w-full object-cover" src="https://maryboro.ca/wp-content/uploads/2022/09/Randy-Meredith-at-Grr8-Finds-December-31-2021-768x1024.jpg" alt="">
                            </div>
                            <div class="col-start-1 row-start-1 self-end">
                                <p class="text-white">Friday, September 23, 2022</p>
                                <p class="text-white">The Kawartha Crocodile: The Story of Kinmount’s Dr. E. White and his Unusual Pet</p>
                            </div>
                        </div>
                        <div class="grid feature-image-4">
                            <div class="col-start-1 row-start-1">
                                <img class="h-full w-full object-cover" src="https://maryboro.ca/wp-content/uploads/2022/09/Randy-Meredith-at-Grr8-Finds-December-31-2021-768x1024.jpg" alt="">
                            </div>
                            <div class="col-start-1 row-start-1 self-end">
                                <p class="text-white">Friday, September 23, 2022</p>
                                <p class="text-white">The Kawartha Crocodile: The Story of Kinmount’s Dr. E. White and his Unusual Pet</p>
                            </div>
                        </div>
                        <div class="grid feature-image-5">
                            <div class="col-start-1 row-start-1">
                                <img class="h-full w-full object-cover" src="https://maryboro.ca/wp-content/uploads/2022/09/Randy-Meredith-at-Grr8-Finds-December-31-2021-768x1024.jpg" alt="">
                            </div>
                            <div class="col-start-1 row-start-1 self-end">
                                <p class="text-white">Friday, September 23, 2022</p>
                                <p class="text-white">The Kawartha Crocodile: The Story of Kinmount’s Dr. E. White and his Unusual Pet</p>
                            </div>
                        </div> -->
                    </div>
                </div>
            <?php } ?>

            <div class=" bg-gray-700 mt-8">
                <div class="container mx-auto pt-8 pb-4">
                    <div class="grid grid-cols-2">
                        <div>
                            <h2 class="text-white text-3xl"><?php esc_html_e( 'Stories', 'maryboro' ); ?></h2>
                        </div>
                        <div class="text-right">
                            <a href="/story/" class="inline-block px-2 py-1 bg-yellow-400 rounded text-gray-800 uppercase text-xs"><?php esc_html_e( 'View all stories', 'maryboro' ); ?></a>
                        </div>
                    </div>
                    <div class="sm:grid sm:grid-cols-2 md:grid-cols-3 gap-7 mt-4">
                        <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                            <div class="mb-4 bg-white border-4 border-gray-700 hover:border-yellow-400 transition-all">
                                <a href="<?php echo get_permalink(); ?>">
                                    <?php 
                                        $image_position = 'top';
                                        if ( get_field('image_position') ) {
                                            $image_position = get_field('image_position');
                                        }
                                    ?>
                                    <div class="aspect-w-16 aspect-h-9">
                                        <?php the_post_thumbnail('large', ['class' => 'w-full h-full object-cover', 'style' => 'object-position: ' . $image_position . '' ]); ?>
                                    </div>
                                    <div class="px-4 py-6">
                                        <p class="text-xs uppercase tracking-wide text-gray-400"><?php echo get_the_date( 'l, F j, Y' ); ?></p>
                                        <?php the_title( '<h3 class="text-xl text-gray-700">', '</h3>' ); ?>
                                        
                                        <!-- <p class=""><?php echo get_the_excerpt(); ?></p> -->
                                    </div>
                                </a>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>

            <?php endif; ?>  
            
            <?php
                // Get all tours posts
                $args = array(
                    'post_parent' => 0,
                    'post_status' => 'publish',
                    'post_type' => 'tours',
                    'orderby' => 'desc',
                    'posts_per_page' => 3
                );
                $query = new WP_Query($args);
		    ?>
            <?php if ( $query->have_posts() ) : ?>
            <div class=" bg-gray-200 mt-8">
                <div class="container mx-auto pt-8 pb-4">
                    <div class="grid grid-cols-2">
                        <div>
                            <h2 class="text-gray-700 text-3xl"><?php esc_html_e( 'Tours', 'maryboro' ); ?></h2>
                        </div>
                        <div class="text-right">
                            <a href="/tours/" class="inline-block px-2 py-1 bg-gray-700 rounded text-white uppercase text-xs"><?php esc_html_e( 'View all tours', 'maryboro' ); ?></a>
                        </div>
                    </div>
                    <div class="sm:grid sm:grid-cols-2 md:grid-cols-3 gap-7 mt-4">
                        <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                            <div class="mb-4 bg-white border-4 border-gray-200 hover:border-gray-700 transition-all">
                                <a href="<?php echo get_permalink(); ?>">
                                    <?php 
                                        $image_position = 'top';
                                        if ( get_field('image_position') ) {
                                            $image_position = get_field('image_position');
                                        }
                                    ?>
                                    <div class="aspect-w-16 aspect-h-9">
                                        <?php the_post_thumbnail('large', ['class' => 'w-full h-full object-cover', 'style' => 'object-position: ' . $image_position . '' ]); ?>
                                    </div>
                                    <div class="px-4 py-6">
                                        <!-- <p class="text-xs uppercase tracking-wide text-gray-400"><?php echo get_the_date( 'l, F j, Y' ); ?></p> -->
                                        <?php the_title( '<h3 class="text-xl text-gray-700">', '</h3>' ); ?>
                                        
                                        <!-- <p class=""><?php echo get_the_excerpt(); ?></p> -->
                                    </div>
                                </a>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>

            <?php endif; ?> 
 
            <?php
                // Get all story posts
                $args = array(
                    'post_parent' => 0,
                    'post_status' => 'publish',
                    'post_type' => 'destinations',
                    'orderby' => 'desc',
                    'posts_per_page' => 3
                );
                $query = new WP_Query($args);
		    ?>
            <?php if ( $query->have_posts() ) : ?>
            <div class=" bg-gray-700 mt-8">
                <div class="container mx-auto pt-8 pb-4">
                    <div class="grid grid-cols-2">
                        <div>
                            <h2 class="text-white text-3xl"><?php esc_html_e( 'Destinations', 'maryboro' ); ?></h2>
                        </div>
                        <div class="text-right">
                            <a href="/destinations/" class="inline-block px-2 py-1 bg-yellow-400 rounded text-gray-800 uppercase text-xs"><?php esc_html_e( 'View all destinations', 'maryboro' ); ?></a>
                        </div>
                    </div>
                    <div class="sm:grid sm:grid-cols-2 md:grid-cols-3 gap-7 mt-4">
                        <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                            <div class="mb-4 bg-white border-4 border-gray-700 hover:border-yellow-400 transition-all">
                                <a href="<?php echo get_permalink(); ?>">
                                    <?php 
                                        $image_position = 'top';
                                        if ( get_field('image_position') ) {
                                            $image_position = get_field('image_position');
                                        }
                                    ?>
                                    <div class="aspect-w-16 aspect-h-9">
                                        <?php the_post_thumbnail('large', ['class' => 'w-full h-full object-cover', 'style' => 'object-position: ' . $image_position . '' ]); ?>
                                    </div>
                                    <div class="px-4 py-6">
                                        <?php the_title( '<h3 class="text-xl text-gray-700">', '</h3>' ); ?>
                                        <?php echo get_the_excerpt(); ?>
                                    </div>
                                </a>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>

            <?php endif; ?>

            <?php
                // Get all featured posts
                $args = array(
                    'post_parent' => 0,
                    'post_status' => 'publish',
                    'post_type' => array('exhibits','virtual','reflections','art'),
                    'meta_key' => 'feature_homepage',
                    'meta_value' => 'Y',
                    'orderby' => 'rand',
                    'posts_per_page' => -1
                );
                $query = new WP_Query($args);
		    ?>

            <?php if ( $query->have_posts() ) : ?>
                <div class="container mx-auto mt-8">
                    <h2 class="text-gray-700 text-3xl"><?php esc_html_e( 'Kawartha Virtual Museum', 'maryboro' ); ?></h2>
                    <ul class="md:col-count-3 lg:col-count-4 mt-8">
                        <?php while ( $query->have_posts() ) : ?>
                            <?php $query->the_post(); ?>
                            <li class="bg-gray-700 mb-4 overflow-hidden relative avoid-break">
                                <a href="<?php echo get_permalink(); ?>">
                                <?php
                                    $current_post_type = "";
                                    if( get_post_type() == "virtual" ) : 
                                        $current_post_type = "Exhibits"; // Kawartha Virtual Museum
                                    elseif( get_post_type() == "page" ) :
                                        $current_post_type = "Info";
                                    else :
                                        $current_post_type = get_post_type();
                                    endif;
                                ?>

                                <?php the_post_thumbnail('large', ['class' => 'w-full h-auto object-cover"']); ?>

                                <div class="absolute z-30 top-4 left-4">
                                    <span class="inline-block px-2 py-1 bg-yellow-400 rounded text-gray-800 uppercase text-xs"><?php echo $current_post_type; ?></span>
                                </div>

                                <div class="px-4 py-4">
                                    <p class="text-white text-xl font-semibold"><?php the_title(); ?></p>
                                    <p class="text-sm text-white"><?php echo get_the_excerpt(); ?></p>
                                </div>
                                                                
                                        

                                        

                                    
                                </a>
                                </li>
                        <?php endwhile; ?>
                    </ul>
                </div>
            <?php endif; ?>

            

        


        

	</main><!-- #main -->

<?php
// get_sidebar();
get_footer();
