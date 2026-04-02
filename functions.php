<?php
/**
 * Bellezza Beauty Clinic — Theme Functions
 *
 * @package Bellezza
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'BELLEZZA_VERSION', wp_get_theme()->get( 'Version' ) );
define( 'BELLEZZA_DIR', get_template_directory() );
define( 'BELLEZZA_URI', get_template_directory_uri() );

/**
 * Theme Setup
 */
function bellezza_setup() {
	load_theme_textdomain( 'bellezza', BELLEZZA_DIR . '/languages' );

	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ) );
	add_theme_support( 'customize-selective-refresh-widgets' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'editor-styles' );
	add_theme_support( 'custom-logo', array(
		'height'      => 80,
		'width'       => 250,
		'flex-height' => true,
		'flex-width'  => true,
	) );

	add_image_size( 'bellezza-hero', 1920, 1080, true );
	add_image_size( 'bellezza-service', 600, 700, true );
	add_image_size( 'bellezza-team', 500, 600, true );
	add_image_size( 'bellezza-gallery', 800, 800, true );
	add_image_size( 'bellezza-blog', 800, 500, true );

	register_nav_menus( array(
		'primary' => esc_html__( 'Menu główne', 'bellezza' ),
		'footer'  => esc_html__( 'Menu stopki', 'bellezza' ),
	) );

	add_editor_style( 'assets/css/editor.css' );
}
add_action( 'after_setup_theme', 'bellezza_setup' );

/**
 * Enqueue Styles & Scripts
 */
function bellezza_scripts() {
	// Google Fonts
	wp_enqueue_style(
		'bellezza-google-fonts',
		'https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,600;0,700;1,400&family=Inter:wght@300;400;500;600&family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&display=swap',
		array(),
		null
	);

	// Main theme styles
	wp_enqueue_style( 'bellezza-style', get_stylesheet_uri(), array(), BELLEZZA_VERSION );
	wp_enqueue_style( 'bellezza-main', BELLEZZA_URI . '/assets/css/main.css', array( 'bellezza-style' ), BELLEZZA_VERSION );
	wp_enqueue_style( 'bellezza-animations', BELLEZZA_URI . '/assets/css/animations.css', array( 'bellezza-main' ), BELLEZZA_VERSION );

	// Scripts
	wp_enqueue_script( 'bellezza-animations', BELLEZZA_URI . '/assets/js/animations.js', array(), BELLEZZA_VERSION, array( 'strategy' => 'defer' ) );
	wp_enqueue_script( 'bellezza-main', BELLEZZA_URI . '/assets/js/main.js', array(), BELLEZZA_VERSION, array( 'strategy' => 'defer' ) );
}
add_action( 'wp_enqueue_scripts', 'bellezza_scripts' );

/**
 * Widget Areas
 */
function bellezza_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Pasek boczny', 'bellezza' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Kolumna stopki 1', 'bellezza' ),
		'id'            => 'footer-1',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Kolumna stopki 2', 'bellezza' ),
		'id'            => 'footer-2',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Kolumna stopki 3', 'bellezza' ),
		'id'            => 'footer-3',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
}
add_action( 'widgets_init', 'bellezza_widgets_init' );

// Load Customizer
require BELLEZZA_DIR . '/inc/customizer.php';

// Load Template Tags
require BELLEZZA_DIR . '/inc/template-tags.php';
