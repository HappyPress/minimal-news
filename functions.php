<?php
/**
 * Minimal News Theme Functions
 *
 * @package Minimal_News
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Theme setup
 */
function minimal_news_setup() {
    // Add theme support for various features
    add_theme_support('wp-block-styles');
    add_theme_support('editor-styles');
    add_theme_support('responsive-embeds');
    add_theme_support('automatic-feed-links');
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ));

    // Add support for full site editing
    add_theme_support('block-templates');
    add_theme_support('block-template-parts');

    // Register navigation menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'minimal-news'),
        'footer' => __('Footer Menu', 'minimal-news'),
    ));
}
add_action('after_setup_theme', 'minimal_news_setup');

/**
 * Enqueue scripts and styles
 */
function minimal_news_scripts() {
    // Enqueue theme stylesheet
    wp_enqueue_style('minimal-news-style', get_stylesheet_uri(), array(), wp_get_theme()->get('Version'));
    
    // Enqueue editor styles
    add_editor_style('style.css');
}
add_action('wp_enqueue_scripts', 'minimal_news_scripts');

/**
 * Register block patterns
 */
function minimal_news_register_patterns() {
    // Register pattern category
    if (function_exists('register_block_pattern_category')) {
        register_block_pattern_category(
            'minimal-news',
            array('label' => __('Minimal News', 'minimal-news'))
        );
    }

    // Include pattern files
    $pattern_files = array(
        'hero-grid',
        'dark-carousel',
        'ad-cta-block'
    );

    foreach ($pattern_files as $pattern) {
        $pattern_file = get_template_directory() . '/patterns/' . $pattern . '.php';
        if (file_exists($pattern_file)) {
            include $pattern_file;
        }
    }
}
add_action('init', 'minimal_news_register_patterns');

/**
 * Add custom block styles
 */
function minimal_news_block_styles() {
    // Register custom block styles
    register_block_style('core/group', array(
        'name' => 'news-card',
        'label' => __('News Card', 'minimal-news'),
    ));

    register_block_style('core/group', array(
        'name' => 'hero-section',
        'label' => __('Hero Section', 'minimal-news'),
    ));

    register_block_style('core/group', array(
        'name' => 'dark-section',
        'label' => __('Dark Section', 'minimal-news'),
    ));
}
add_action('init', 'minimal_news_block_styles');

/**
 * Custom excerpt length
 */
function minimal_news_excerpt_length($length) {
    return 20;
}
add_filter('excerpt_length', 'minimal_news_excerpt_length');

/**
 * Custom excerpt more
 */
function minimal_news_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'minimal_news_excerpt_more');

/**
 * Add custom image sizes
 */
function minimal_news_image_sizes() {
    add_image_size('minimal-news-hero', 1140, 600, true);
    add_image_size('minimal-news-card', 400, 250, true);
    add_image_size('minimal-news-thumbnail', 200, 150, true);
}
add_action('after_setup_theme', 'minimal_news_image_sizes');
