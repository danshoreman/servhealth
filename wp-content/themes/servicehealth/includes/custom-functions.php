<?php

function scripts_and_styles() {
  if (!is_admin() && $_SERVER['SCRIPT_NAME'] != '/wp-login.php') {
	
		// de and re register jquery
		wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js');
    wp_enqueue_script( 'jquery' );
    
    wp_register_style( 'critstyles', get_stylesheet_directory_uri() . '/library/css/critical.css', array(), '1.0.0', 'all' );
		wp_register_style( 'respgrid', get_template_directory_uri() . '/library/css/foundation.min.css', array(), '6.0', 'all' );
		wp_register_style( 'stylesheet', get_stylesheet_directory_uri() . '/library/css/style.css', array(), '1.0.0', 'all' );
		wp_enqueue_style( 'critstyles' );
		wp_enqueue_style( 'respgrid' );
		wp_enqueue_style( 'stylesheet' );
		
    
   	wp_register_script( 'modernizr', get_stylesheet_directory_uri() . '/library/js/libs/modernizr.custom.min.js', array(), '2.5.3', false );
		wp_register_script( 'allscripts', get_stylesheet_directory_uri() . '/library/js/scripts.js', array(), '1.0.0', true );
		wp_enqueue_script( 'modernizr' );
		wp_enqueue_script( 'allscripts' );
		
	}
}

/* Enqueue base scripts and styles */
add_action('wp_enqueue_scripts', 'scripts_and_styles', 999);



/* Enqueue google fonts */
function google_fonts() {
  wp_register_style('googleFonts', 'http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic');
  wp_enqueue_style( 'googleFonts');
}

add_action('wp_print_styles', 'google_fonts');



/* Hide Admin Bar */
show_admin_bar( false );