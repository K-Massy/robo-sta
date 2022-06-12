<?php
/**
 * wordpress functions enqueue-scripts
 *
 * @package Torapants default
 */

add_action( 'wp_enqueue_scripts', 'stylesheets' );
add_action( 'wp_enqueue_scripts', 'scripts' );
add_filter( 'wp_default_scripts', 'dequeue_jquery_migrate' );
add_action( 'wp_enqueue_scripts', 'enqueue_jquery' );
add_filter( 'style_loader_src',   'remove_src_ver' );
add_filter( 'script_loader_src',  'remove_src_ver' );


if ( ! function_exists( 'stylesheets' ) ) {
	/**
	 * Add stylesheets
	 */
	function stylesheets() {
		global $wp_styles;
		wp_enqueue_style( 'site-style',          get_template_directory_uri() . '/assets/css/style.min.css', array(), '', 'all' );
		wp_enqueue_style( 'site-magnific-popup', get_template_directory_uri() . '/assets/js/libs/magnific-popup/magnific-popup.css', array(), '', 'all' );
		wp_enqueue_style( 'site-temp',           get_template_directory_uri() . '/assets/css/temp.css', array(), '', 'all' );

		if ( is_home() || is_front_page() ) {
			// wp_enqueue_style( 'site-slick', get_template_directory_uri() . '/assets/js/libs/slick/slick.css', array(), '', 'all' );
		}
	}
}

if ( ! function_exists( 'scripts' ) ) {
	/**
	 * Add scripts
	 */
	function scripts() {
		wp_enqueue_script( 'site-magnific-popup', get_template_directory_uri() . '/assets/js/libs/magnific-popup/jquery.magnific-popup.min.js', array( 'jquery' ), '', true );
		wp_enqueue_script( 'site-smoothscroll',   get_template_directory_uri() . '/assets/js/libs/jquery.smoothScroll.js', array( 'jquery' ), '', true );
		wp_enqueue_script( 'site-bootstrap',   	  get_template_directory_uri() . '/assets/js/libs/bootstrap.bundle.min.js', array( 'jquery' ), '', true );
		wp_enqueue_script( 'site-common',         get_template_directory_uri() . '/assets/js/common.js', array( 'jquery' ), '', true );

		if ( is_home() || is_front_page() ) {
			// wp_enqueue_script( 'site-slick', get_template_directory_uri() . '/assets/js/libs/slick/slick.min.js', array( 'jquery' ), '', true );
			wp_enqueue_script( 'site-home',  get_template_directory_uri() . '/assets/js/home.js', array( 'jquery' ), '', true );
		}
	}
}

if ( ! function_exists( 'dequeue_jquery_migrate' ) ) {
	/**
	 * Remove jQuery (migrate)
	 */
	function dequeue_jquery_migrate( $scripts ) {
		if ( ! is_admin() ) {
			$scripts->remove( 'jquery' );
			$scripts->add( 'jquery', false, array( 'jquery-core' ), '1.12.4' );
		}
	}
}

if ( ! function_exists( 'enqueue_jquery' ) ) {
	/**
	 * Add jQuery
	 */
	function enqueue_jquery() {
		if ( ! is_admin() ) {
			wp_deregister_script('jquery');
			wp_enqueue_script( 'jquery', get_template_directory_uri() . '/assets/js/libs/jquery-2.2.4.min.js', array(), '', false );
		}
	}
}

if ( ! function_exists( 'remove_src_ver' ) ) {
	/**
	 * Remove file version
	 * ex: style.css?ver=4.7.3
	 */
	function remove_src_ver( $src ) {
		return remove_query_arg( 'ver', $src );
	}
}