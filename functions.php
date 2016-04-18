<?php
/**
 * File with functions required by the theme
 *
 * @author Ondřej Doněk, <ondrejd@gmail.com>
 * @license http://www.gnu.org/licenses/gpl-2.0.html GPLv2 or later
 * @link https://github.com/ondrejd/odwp-donkycz-theme
 * @package odwp-donkycz-theme
 * @since 1.0
 */

if ( ! function_exists( 'odwpdct_setup' ) ) :
/**
 * Sets up theme.
 *
 * @since 1.0
 */
function odwpdct_setup() {
	load_theme_textdomain( 'odwp-donkycz-theme', get_template_directory() . '/languages' );

	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );

	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 1200, 9999 );

	register_nav_menus( array(
		'primary' => __( 'Hlavní menu', 'odwp-donkycz-theme' )
	) );

	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'gallery',
		'status',
		'audio',
		'chat',
		'toy'/* TODO DonkyCz_Custom_Post_Type_Toy::NAME */
	) );

	add_editor_style( array( 'css/editor-style.css' ) );
}
endif; // odwpdct_setup
add_action( 'after_setup_theme', 'odwpdct_setup' );


if ( ! function_exists( 'odwpdct_javascript_detection' ) ) :
/**
 * Handles JavaScript detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since 1.0
 */
function odwpdct_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
endif; // odwpdct_javascript_detection
add_action( 'wp_head', 'odwpdct_javascript_detection', 0 );


if ( ! function_exists( 'odwpdct_scripts' ) ) :
/**
 * Enqueues scripts and styles.
 *
 * @since 1.0
 */
function odwpdct_scripts() {
	wp_enqueue_script( 'odwpdct-html5', get_template_directory_uri() . '/js/html5.js', array(), '3.7.0' );
	wp_script_add_data( 'odwpdct-html5', 'conditional', 'lt IE 9' );

	wp_enqueue_script( 'odwpdct-script', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), '20160418', true );

	wp_localize_script( 'odwpdct-script', 'screenReaderText', array(
		'expand'   => __( 'expand child menu', 'odwp-donkycz-theme' ),
		'collapse' => __( 'collapse child menu', 'odwp-donkycz-theme' ),
	) );
}
endif; // odwpdct_scripts
add_action( 'wp_enqueue_scripts', 'odwpdct_scripts' );