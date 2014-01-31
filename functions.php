<?php

add_action( 'init','clear_tranquil_customise_highwind', 999 );
function clear_tranquil_customise_highwind() {
	// Sidebar
	remove_action( 'highwind_content_after', 'highwind_sidebar' );

	// Footer widget regions
	remove_action( 'highwind_footer', 'highwind_footer_widgets', 10 );
	unregister_sidebar( 'primary-sidebar' );
	unregister_sidebar( 'footer-sidebar-1' );
	unregister_sidebar( 'footer-sidebar-2' );
	unregister_sidebar( 'footer-sidebar-3' );

	// Customisations
	add_action( 'customize_register', 'clear_tranquil_customizer_overrides' );

	// Remove open sans
	add_action( 'wp_enqueue_scripts', 'clear_tranquil_customise_scripts' );

	// Custom style
	add_filter( 'highwind_header_color_color_selectors', 'clear_tranquil_custom_heading_colors' );
	add_filter( 'highwind_desktop_background_color_background_selectors', 'clear_tranquil_custom_background_color' );
	add_filter( 'highwind_link_color_background_selectors', 'clear_tranquil_custom_link_background' );
	add_filter( 'highwind_link_textcolor_default', 'clear_tranquil_default_link_color' );
}

function clear_tranquil_customizer_overrides( $wp_customize ) {
	$wp_customize->remove_section( 'highwind_layout' );
}

function clear_tranquil_customise_scripts() {
	wp_dequeue_style( 'open-sans' );
	wp_enqueue_style( 'gentium', 'http://fonts.googleapis.com/css?family=Gentium+Basic:400,700,400italic' );
	wp_enqueue_style( 'noto-sans', 'http://fonts.googleapis.com/css?family=Noto+Sans:400,700' );
}

function clear_tranquil_custom_heading_colors( $selectors ) {
	$new_selectors = '.site-title, .site-description,';
	return $new_selectors . ' ' . $selectors;
}

function clear_tranquil_custom_background_color( $selectors ) {
	$new_selectors = 'body, .header, .main-nav, .footer,';
	return $new_selectors . ' ' . $selectors;
}

function clear_tranquil_custom_link_background( $selectors ) {
	$selectors = 'input[type="submit"], .button, input[type="button"], .navigation-post a, .navigation-paging a, .comments .bypostauthor > .comment-body .comment-content';
	return $selectors;
}

function clear_tranquil_default_link_color( $color ) {
	$color = '#88bac9';
	return $color;
}


