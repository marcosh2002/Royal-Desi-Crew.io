<?php
/**
 * Royal Desi Crew Theme - Ultra Minimal Functions
 * NO stylesheets loaded - only JS
 */

if (!defined('ABSPATH')) exit;

// Theme basics
add_action('after_setup_theme', function() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');
});

// ONLY LOAD JAVASCRIPT - NO STYLESHEETS
add_action('wp_enqueue_scripts', function() {
    $theme_uri = get_template_directory_uri();
    
    // JavaScript files only
    wp_enqueue_script('photos-loader', $theme_uri . '/assets/js/photos-loader.js', array(), '1.0', true);
    wp_enqueue_script('gallery-js', $theme_uri . '/assets/js/gallery.js', array('photos-loader'), '1.0', true);
    wp_enqueue_script('main-js', $theme_uri . '/assets/js/main.js', array(), '1.0', true);
}, 999);

// REMOVE ALL WordPress CSS before anything else
remove_action('wp_head', 'wp_print_styles', 8);

// Block all stylesheet enqueuing at multiple points
add_action('wp_print_styles', function() { global $wp_styles; if ($wp_styles) { $wp_styles->queue = array(); } }, 0);
add_filter('style_loader_src', '__return_false', 999, 2);
add_filter('wp_print_style_loader_tag', '__return_empty_string', 999);

// Remove emoji styles
remove_action('wp_head', 'print_emoji_dcnames_scripts');
remove_action('wp_head', 'print_emoji_styles');

// Disable all stylesheet related actions
add_action('init', function() {
    global $wp_styles;
    if ($wp_styles instanceof WP_Styles) {
        foreach ($wp_styles->queue as $handle) {
            wp_dequeue_style($handle);
        }
    }
}, 999);

// No caching of styles
header('Cache-Control: no-cache, no-store, must-revalidate');
header('Pragma: no-cache');
header('Expires: 0');
