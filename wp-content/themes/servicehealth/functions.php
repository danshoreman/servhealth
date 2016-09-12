<?php

/* Add custom functions */
require_once( 'includes/custom-functions.php' ); 

/* Add theme support woocommerce */
add_theme_support( 'woocommerce' );

/* Add theme support woocommerce */
add_theme_support( 'widgets' );

/* Add theme support post thumbnails */
add_theme_support('post-thumbnails');

/* Add post format support */
add_theme_support( 'post-formats',
	array(
		'aside',             // title less blurb
		'gallery',           // gallery of images
		'link',              // quick link to other site
		'image',             // an image
		'quote',             // a quick quote
		'status',            // a Facebook like status update
		'video',             // video
		'audio',             // audio
		'chat'               // chat transcript
	)
);

/* WP menus */
add_theme_support( 'menus' );


/* Add image sizes */
add_image_size( 'thumbnail', 200, 200, true );
add_image_size( 'image', 700, 350, true );


/* Register our sidebars and widgetized areas */
function arphabet_widgets_init() {
	register_sidebar( array(
		'name' => 'Main Sidebar',
		'id' => 'main-sidebar',
		'before_widget' => '<div class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	) );
}
add_action( 'widgets_init', 'arphabet_widgets_init' );



/* Change default excerpt */
function new_excerpt_more( $more ) {
	return ' <a class="read-more" href="'. get_permalink( get_the_ID() ) . '">' . __('Read More', 'your-text-domain') . '</a>';
}
add_filter( 'excerpt_more', 'new_excerpt_more' );



/* Remove junk from header */
function remove_header_junk() {
	remove_action('wp_head', 'rsd_link'); // remove really simple discovery link
	remove_action('wp_head', 'wp_generator'); // remove wordpress version
	remove_action('wp_head', 'feed_links', 2); // remove rss feed links (make sure you add them in yourself if youre using feedblitz or an rss service)
	remove_action('wp_head', 'feed_links_extra', 3); // removes all extra rss feed links
	remove_action('wp_head', 'index_rel_link'); // remove link to index page
	remove_action('wp_head', 'wlwmanifest_link'); // remove wlwmanifest.xml (needed to support windows live writer)
	remove_action('wp_head', 'start_post_rel_link', 10, 0); // remove random post link
	remove_action('wp_head', 'parent_post_rel_link', 10, 0); // remove parent post link
	remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // remove the next and previous post links
	remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
	remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0 );
}
add_action( 'init', 'remove_header_junk' );



/* Remove header Emoji stuff */
/*
function disable_wp_emojicons() {
	remove_action( 'admin_print_styles', 'print_emoji_styles' );
  remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
  remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
  remove_action( 'wp_print_styles', 'print_emoji_styles' );
  remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
  remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
  remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
	add_filter( 'tiny_mce_plugins', 'disable_emojicons_tinymce' );
}
add_action( 'init', 'disable_wp_emojicons' );
*/


