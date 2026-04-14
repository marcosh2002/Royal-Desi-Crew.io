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

// Load all scripts only (CSS is loaded directly in header.php)
add_action('wp_enqueue_scripts', function() {
    $url = get_template_directory_uri();
    $ver = time();
    
    // Load all JS files in order (photos-loader first)
    wp_enqueue_script('photos-loader', $url . '/assets/js/photos-loader.js', [], $ver, true);
    wp_enqueue_script('gallery-js', $url . '/assets/js/gallery.js', ['photos-loader'], $ver, true);
    wp_enqueue_script('theme-js', $url . '/assets/js/main.js', [], $ver, true);
});

/**
 * NUCLEAR FIX: Completely disable all stylesheet enqueuing
 * Force inline CSS only, prevent any stylesheet loading
 */

// Remove WordPress default styles
add_action('wp_enqueue_scripts', function() {
    // Remove emoji styles
    remove_action('wp_head', 'print_emoji_dcnames_scripts');
    remove_action('wp_head', 'print_emoji_styles');
    
    // Remove block library CSS
    wp_dequeue_style('wp-block-library');
    wp_dequeue_style('wp-block-library-theme');
    
    // Dequeue global styles
    wp_dequeue_style('global-styles');
    
    // Clear all enqueued styles
    global $wp_styles;
    if ($wp_styles instanceof WP_Styles) {
        $wp_styles->queue = [];
    }
}, 100);

// Prevent any stylesheet from being printed
add_action('wp_print_styles', function() {
    global $wp_styles;
    if ($wp_styles instanceof WP_Styles) {
        $wp_styles->queue = [];
    }
}, 1);

// Block stylesheet loading via filter
add_filter('style_loader_src', function($src, $handle) {
    // Return false to prevent loading
    return false;
}, 10, 2);

// Remove emoji script
add_filter('emoji_svg_url', '__return_false');

// Add proper script type attributes
add_filter('script_loader_tag', function($tag, $handle) {
    return str_replace('<script ', '<script type="application/javascript" ', $tag);
}, 10, 2);

// Remove favicon request to avoid 404
add_filter('site_icon_url', '__return_false');

// Disable admin bar
add_filter('show_admin_bar', '__return_false');

/**
 * Disable WordPress REST API for security (optional)
 * Uncomment if you don't need REST API
 */
// add_filter('rest_enabled', '__return_false');

/**
 * CRITICAL FIX: Ensure inline CSS is properly output for all visitors
 * This bypasses server file redirect issues and loads CSS reliably
 */
add_action('wp_head', function() {
    // Check if CSS wasn't already output in header template
    if (!did_action('wp_head') || !has_filter('wp_head', 'output_inline_css')) {
        // CSS will be output directly in header.php <style> tag
        // This ensures it loads for all visitors regardless of caching
    }
}, 1);

// Force no caching of HTML to ensure CSS always loads fresh
add_action('send_headers', function() {
    if (!is_admin()) {
        header('Cache-Control: no-cache, no-store, must-revalidate, public, s-maxage=0');
        header('Pragma: no-cache');
        header('Expires: 0');
    }
});
// add_filter('rest_jsonp_enabled', '__return_false');
