<?php
if (!defined('ABSPATH')) { exit; }

// Theme Setup
add_action('after_setup_theme', function() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');
});

// Fix MIME types for CSS/JS
add_filter('mime_types', function($mimes) {
    $mimes['css'] = 'text/css';
    $mimes['js'] = 'application/javascript';
    return $mimes;
});

// Enqueue styles and scripts with proper MIME types
add_action('wp_enqueue_scripts', function() {
    $url = get_template_directory_uri();
    $time = time();
    
    // External fonts and libraries
    wp_enqueue_style('fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css', [], '6.4.0');
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;800&family=Montserrat:wght@300;400;500;600&family=Prata&display=swap', [], null);
    
    // Theme CSS
    wp_enqueue_style('theme-main', $url . '/assets/css/main.css', [], $time);
    
    // Theme JS - Load in footer with defer
    wp_enqueue_script('photos-loader', $url . '/assets/js/photos-loader.js', [], $time, true);
    wp_enqueue_script('gallery-js', $url . '/assets/js/gallery.js', ['photos-loader'], $time, true);
    wp_enqueue_script('theme-js', $url . '/assets/js/main.js', [], $time, true);
});

// Add script type attributes
add_filter('script_loader_tag', function($tag, $handle) {
    return str_replace('<script ', '<script type="application/javascript" ', $tag);
}, 10, 2);

// Hide admin bar
add_filter('show_admin_bar', '__return_false');

// Add header to ensure proper MIME type serving
add_action('send_headers', function() {
    header('Content-Type: text/html; charset=UTF-8');
});
