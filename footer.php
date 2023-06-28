<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package maryboro
 */

?>

<div class="container px-4 md:mx-auto mt-16">
    <div class="flex flex-wrap justify-center md:justify-between gap-4">
        <div><img src="<?php echo get_template_directory_uri(); ?>/images/logo-ontario.png" alt="" class="h-16 w-auto object-cover"></div>
        <div><img src="<?php echo get_template_directory_uri(); ?>/images/logo-canada-funded-by-csrf-en.png" class="h-16 w-auto object-cover" alt=""></div>
    </div>
</div>

<footer class="bg-blue-500 mt-8 pt-8 pb-8">
        <div class="mx-4">
            <div class="md:grid md:grid-cols-2 lg:grid-cols-4 md:gap-8 text-white">
                <div>
                    <h2 class="border-b border-white border-solid uppercase text-sm font-semibold tracking-wide pb-2">Social</h2>
                    <ul class="flex list-none ml-0 mt-2 mb-4">
                        <li>
                            <a href="https://www.facebook.com/MaryboroLodge" target="_blank">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" style="fill:#fff">
                                    <path d="M16 4C9.384 4 4 9.384 4 16s5.384 12 12 12 12-5.384 12-12S22.616 4 16 4zm0 2c5.535 0 10 4.465 10 10a9.977 9.977 0 0 1-8.512 9.879v-6.963h2.848l.447-2.893h-3.295v-1.58c0-1.2.395-2.267 1.518-2.267h1.805V9.652c-.317-.043-.988-.136-2.256-.136-2.648 0-4.2 1.398-4.2 4.584v1.923h-2.722v2.893h2.722v6.938A9.975 9.975 0 0 1 6 16c0-5.535 4.465-10 10-10z"/>
                                </svg>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.instagram.com/thefenelonmuseum" target="_blank">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" style="fill:#fff">
                                    <path d="M11.469 5C7.918 5 5 7.914 5 11.469v9.062C5 24.082 7.914 27 11.469 27h9.062C24.082 27 27 24.086 27 20.531V11.47C27 7.918 24.086 5 20.531 5Zm0 2h9.062A4.463 4.463 0 0 1 25 11.469v9.062A4.463 4.463 0 0 1 20.531 25H11.47A4.463 4.463 0 0 1 7 20.531V11.47A4.463 4.463 0 0 1 11.469 7Zm10.437 2.188a.902.902 0 0 0-.906.906c0 .504.402.906.906.906a.902.902 0 0 0 .907-.906.902.902 0 0 0-.907-.906ZM16 10c-3.3 0-6 2.7-6 6s2.7 6 6 6 6-2.7 6-6-2.7-6-6-6Zm0 2c2.223 0 4 1.777 4 4s-1.777 4-4 4-4-1.777-4-4 1.777-4 4-4Z"/>
                                </svg>
                            </a>
                        </li>
                    </ul>

                    <h2 class="border-b border-white border-solid uppercase text-sm font-semibold tracking-wide pb-2">Stories</h2>
                    <ul class="list-none ml-0 mt-2 mb-4">
                        <li><a href="/story/">Stories</a></li>
                    </ul>

                    <ul class="list-none ml-0 mt-2 mb-4">
                        <li><a href="/crafts/">Crafts</a></li>
                        <li><a href="/recipes/">Recipes</a></li>
                        <li><a href="/about/">About Us</a></li>
                     </ul>
                </div>

                <div>
                    <h2 class="border-b border-white border-solid uppercase text-sm font-semibold tracking-wide pb-2">Virtual Museum</h2>
                    <ul class="list-none ml-0 mt-2 mb-4">
                        <li><a href="/art/">Art</a></li>
                        <li><a href="/virtual/">Exhibits</a></li>
                        <li><a href="/virtual/?fr">Expositions</a></li>
                        <li><a href="/reflections/">Reflections</a></li>
                        <li><a href="/tours/">Tours</a></li>
                        <li><a href="/destinations/">Destinations</a></li>
                        <li><a href="https://www.communitystories.ca/v2/kawartha-lakes-creative-eye_yeux-creatifs/" target="_blank">Retrospectacle</a></li> 
                    </ul>
                </div>

                <div>
                    <h2 class="border-b border-white border-solid uppercase text-sm font-semibold tracking-wide pb-2">Archives</h2>
                    <ul class="list-none ml-0 mt-2 mb-4">
                        <li><a href="/archives/">Archives</a></li>
                        <li><a href="/publications/">Publications</a></li>
                        <li><a href="/directory/">Randall Speller's Directory</a></li>
                     </ul>
                </div>
                
                <div>
                    <h2 class="border-b border-white border-solid uppercase text-sm font-semibold tracking-wide pb-2">Programs & Events</h2>
                    <ul class="list-none ml-0 mt-2 mb-4">
                        <li><a href="/programs/">Programs</a></li>
                        <li><a href="/events/">Events</a></li>
                    </ul>
                    <h2 class="border-b border-white border-solid uppercase text-sm font-semibold tracking-wide pb-2">Support</h2>
                    <ul class="list-none ml-0 mt-2 mb-4">
                        <li><a href="/donate/">Donate</a></li>
                        <li><a href="/donate-an-artifact/">Donate an artifact</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <div class="bg-blue-600 py-2">
        <div class="container mx-auto">
            <p class="text-center text-white text-sm font-semibold tracking-wide mb-0">&copy; Copyright <?php echo date('Y'); ?> -  Maryboro Lodge Museum</p>
        </div>
    </div>



	<footer id="colophon" class="site-footer mt-8 hidden">
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'maryboro' ) ); ?>">
				<?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( 'Proudly powered by %s', 'maryboro' ), 'WordPress' );
				?>
			</a>
			<span class="sep"> | </span>
				<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme: %1$s by %2$s.', 'maryboro' ), 'maryboro', '<a href="http://underscores.me/">Underscores.me</a>' );
				?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>
