<?php
/**
 * Royal Desi Crew Theme Functions - Production Ready
 */

if (!defined('ABSPATH')) {
    exit;
}

// Theme Setup
add_action('after_setup_theme', function() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');
});

// Fix MIME types
add_filter('mime_types', function($mimes) {
    $mimes['css'] = 'text/css';
    $mimes['js'] = 'application/javascript';
    return $mimes;
});

// Load all styles and scripts with MIME type handling
add_action('wp_enqueue_scripts', function() {
    $url = get_template_directory_uri();
    $ver = uniqid();
    
    // Load external CSS first
    wp_enqueue_style('fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css', [], '6.4.0');
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;800&family=Montserrat:wght@300;400;500;600&family=Prata&display=swap', [], null);
    
    // Load theme CSS with unique version
    wp_enqueue_style('theme-main', $url . '/assets/css/main.css', [], $ver);
    
    // Load all JS files in order (photos-loader first)
    wp_enqueue_script('photos-loader', $url . '/assets/js/photos-loader.js', [], $ver, true);
    wp_enqueue_script('gallery-js', $url . '/assets/js/gallery.js', ['photos-loader'], $ver, true);
    wp_enqueue_script('theme-js', $url . '/assets/js/main.js', [], $ver, true);
});

// Add proper script type attributes
add_filter('script_loader_tag', function($tag, $handle) {
    return str_replace('<script ', '<script type="application/javascript" ', $tag);
}, 10, 2);

// Disable admin bar
add_filter('show_admin_bar', '__return_false');

/**
 * Disable WordPress REST API for security (optional)
 * Uncomment if you don't need REST API
 */
// add_filter('rest_enabled', '__return_false');
// add_filter('rest_jsonp_enabled', '__return_false');
