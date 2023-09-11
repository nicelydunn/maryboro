<?php
/**
 * maryboro functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package maryboro
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'maryboro_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function maryboro_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on maryboro, use a find and replace
		 * to change 'maryboro' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'maryboro', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'maryboro' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'maryboro_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'maryboro_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function maryboro_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'maryboro_content_width', 640 );
}
add_action( 'after_setup_theme', 'maryboro_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function maryboro_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'maryboro' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'maryboro' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 1', 'maryboro' ),
			'id'            => 'footer-1',
			'description'   => esc_html__( 'Add widgets here.', 'maryboro' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title mb-4">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 2', 'maryboro' ),
			'id'            => 'footer-2',
			'description'   => esc_html__( 'Add widgets here!', 'maryboro' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title mb-4">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'maryboro_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function maryboro_scripts() {
	wp_enqueue_style( 'maryboro-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_enqueue_style( 'tailwind', get_stylesheet_directory_uri() . '/assets/css/tailwind.css', array(), '2.6.8', 'all' );
	wp_enqueue_style( 'slick', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css' );
	wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css2?family=Roboto:wght@300;400;900&display=swap' );
	wp_style_add_data( 'maryboro-style', 'rtl', 'replace' );

	// wp_enqueue_script( 'maryboro-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'site', get_template_directory_uri() . '/assets/js/site.js', array('jquery'), '1.2.1', true );
	wp_enqueue_script( 'gallery-scroll', get_template_directory_uri() . '/assets/js/gallery-scroll.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'slick', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'maryboro_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

add_post_type_support( 'page', 'excerpt' );

/** 
 * AFC Blocks
 */

add_action('acf/init', 'my_acf_init_block_types');
function my_acf_init_block_types() {

    // Check function exists.
    if( function_exists('acf_register_block_type') ) {

        // register a testimonial block.
        acf_register_block_type(array(
            'name'              => 'photos',
            'title'             => __('Photos'),
            'description'       => __('A custom gallery block.'),
            'render_template'   => 'template-parts/blocks/gallery/gallery.php',
            'category'          => 'layout',
            'icon'              => 'format-gallery',
            'keywords'          => array( 'gallery', 'images' ),
        ));
    }
}

function header_html($bg, $logo, $title, $author, $contributor){

	$author_contributor = "";
	if( $author || $contributor ) {
		$seperator = ($author && $contributor) ? " | " : ""; 
		$author_contributor = <<<HTML
			<p class="text-gray-800 mt-1">
				<span class="inline-block px-2 py-1 bg-white bg-opacity-50">
					$author $seperator $contributor
				</span>
			</p>
		HTML;
	}

	return <<<HTML
		<div class="bg-cover" style="background-image: url('$bg');">
			<div class="container mx-auto overflow-hidden text-center py-4 flex items-center">
				<div>
					<img src="$logo" class="h-14 md:h-24 mr-2" />
				</div>
			<div class="text-center flex-grow">
				<h1 class="text-2xl md:text-5xl font-semibold text-gray-800">
					<span class="inline-block px-2 py-1 bg-white bg-opacity-50">$title</span>
				</h1>
				$author_contributor
			</div>
		</div>
	</div>
		</div>
	HTML;
		
}
	
function slider_navigation_html( $array ) {
	$i = 1;
	$output = "";
	foreach( $array as $title  ) :
		$bg_color = ( $i == 1 ) ? "bg-gray-200" : "bg-white";
		$output .= <<<HTML
			<div>
				<a class="p-4 block h-full $bg_color hover:bg-gray-200" href="$i">$i. $title</a>
			</div>
		HTML;
		$i++;
	endforeach;

	return <<<HTML
	<!-- Slider Navigation [START] -->
	<div class="fixed bottom-0 flex flex-wrap w-full z-10">

		<div class="flex-none">
			<div class="btn-open cursor-pointer bg-gray-800 hover:bg-gray-600 p-2">
				<svg class="w-12 h-12 text-white" fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"/>
				</svg>
			</div>
		</div>

		<div class="flex-none" style="display: none;">
			<div class="btn-close cursor-pointer bg-gray-800 hover:bg-gray-600 p-2">
				<svg class="w-12 h-12 text-white" fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
				</svg>
			</div>
		</div>

		<div class="flex-grow bg-gray-300"></div>

		<div class="flex-none">
			<div class="btn-prev cursor-pointer bg-gray-800 hover:bg-gray-600 p-2">
				<svg class="w-24 h-12 text-white" fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
				</svg>
			</div>
		</div>

		<div class="flex-none">
			<div class="btn-next cursor-pointer text-gray-800 bg-yellow-400 hover:bg-yellow-500 p-2">
				<svg class="w-24 h-12 text-white" fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
				</svg>
			</div>
		</div>

		<div class="js-slider-navigation w-full bg-gray-300" style="display: none;">
			<div style="max-height: 40vh;" class="px-4 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-1 md:gap-2 overflow-y-auto my-4">
			$output
			</div>
		</div>		

	</div>
	<!-- Slider Navigation [END] -->
	HTML;
}