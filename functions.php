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

    // Register patterns manually
    register_block_pattern(
        'minimal-news/hero-grid',
        array(
            'title' => __('Hero Grid', 'minimal-news'),
            'categories' => array('minimal-news'),
            'keywords' => array('hero', 'grid', 'featured', 'posts'),
            'content' => '<!-- wp:group {"align":"wide","style":{"spacing":{"margin":{"bottom":"3rem"}}}} -->
<div class="wp-block-group alignwide" style="margin-bottom:3rem">
    <!-- wp:columns {"style":{"spacing":{"blockGap":"2rem"}}} -->
    <div class="wp-block-columns">
        <!-- wp:column {"width":"60%"} -->
        <div class="wp-block-column" style="flex-basis:60%">
            <!-- wp:query {"queryId":8,"query":{"perPage":1,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false},"displayLayout":{"type":"list","columns":3}} -->
            <div class="wp-block-query">
                <!-- wp:post-template -->
                <!-- wp:post-featured-image {"isLink":true,"style":{"spacing":{"margin":{"bottom":"1rem"}}}} /-->
                <!-- wp:post-title {"isLink":true,"style":{"typography":{"fontSize":"2rem","fontWeight":"700"}}} /-->
                <!-- wp:post-excerpt {"moreText":"Read More","style":{"spacing":{"margin":{"top":"1rem"}}}} /-->
                <!-- /wp:post-template -->
            </div>
            <!-- /wp:query -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"width":"40%"} -->
        <div class="wp-block-column" style="flex-basis:40%">
            <!-- wp:query {"queryId":9,"query":{"perPage":2,"pages":0,"offset":1,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false},"displayLayout":{"type":"list","columns":3}} -->
            <div class="wp-block-query">
                <!-- wp:post-template -->
                <!-- wp:post-featured-image {"isLink":true,"style":{"spacing":{"margin":{"bottom":"0.5rem"}}}} /-->
                <!-- wp:post-title {"isLink":true,"level":3,"style":{"typography":{"fontSize":"1.25rem","fontWeight":"600"}}} /-->
                <!-- /wp:post-template -->
            </div>
            <!-- /wp:query -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->',
        )
    );

    register_block_pattern(
        'minimal-news/dark-carousel',
        array(
            'title' => __('Dark Carousel', 'minimal-news'),
            'categories' => array('minimal-news'),
            'keywords' => array('carousel', 'dark', 'featured', 'video'),
            'content' => '<!-- wp:group {"align":"wide","style":{"spacing":{"margin":{"bottom":"3rem","padding":{"top":"2rem","bottom":"2rem"}}},"backgroundColor":"black"},"backgroundColor":"black","textColor":"white"} -->
<div class="wp-block-group alignwide has-white-color has-black-background-color has-text-color has-background" style="margin-bottom:3rem;padding-top:2rem;padding-bottom:2rem">
    <!-- wp:heading {"level":2,"style":{"spacing":{"margin":{"bottom":"2rem"}}}} -->
    <h2 class="wp-block-heading" style="margin-bottom:2rem">Watch Next</h2>
    <!-- /wp:heading -->
    
    <!-- wp:query {"queryId":10,"query":{"perPage":4,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false},"displayLayout":{"type":"grid","columns":4}} -->
    <div class="wp-block-query">
        <!-- wp:post-template -->
        <!-- wp:group {"style":{"spacing":{"padding":{"top":"1rem","bottom":"1rem","left":"1rem","right":"1rem"}},"border":{"radius":"8px"}},"backgroundColor":"black","className":"video-card"} -->
        <div class="wp-block-group has-black-background-color has-background video-card" style="border-radius:8px;padding-top:1rem;padding-right:1rem;padding-bottom:1rem;padding-left:1rem">
            <!-- wp:post-featured-image {"isLink":true,"style":{"spacing":{"margin":{"bottom":"1rem"}}}} /-->
            <!-- wp:post-title {"isLink":true,"level":4,"style":{"typography":{"fontSize":"1rem","fontWeight":"600"}}} /-->
        </div>
        <!-- /wp:group -->
        <!-- /wp:post-template -->
    </div>
    <!-- /wp:query -->
</div>
<!-- /wp:group -->',
        )
    );

    register_block_pattern(
        'minimal-news/ad-cta-block',
        array(
            'title' => __('Ad/CTA Block', 'minimal-news'),
            'categories' => array('minimal-news'),
            'keywords' => array('ad', 'cta', 'call-to-action', 'banner'),
            'content' => '<!-- wp:group {"align":"wide","style":{"spacing":{"margin":{"bottom":"3rem","padding":{"top":"2rem","bottom":"2rem"}}},"backgroundColor":"sunrise-orange"},"backgroundColor":"sunrise-orange","textColor":"white"} -->
<div class="wp-block-group alignwide has-white-color has-sunrise-orange-background-color has-text-color has-background" style="margin-bottom:3rem;padding-top:2rem;padding-bottom:2rem">
    <!-- wp:columns {"style":{"spacing":{"blockGap":"2rem"}}} -->
    <div class="wp-block-columns">
        <!-- wp:column {"width":"60%"} -->
        <div class="wp-block-column" style="flex-basis:60%">
            <!-- wp:heading {"level":2,"style":{"spacing":{"margin":{"bottom":"1rem"}}}} -->
            <h2 class="wp-block-heading" style="margin-bottom:1rem">Stay Updated</h2>
            <!-- /wp:heading -->
            <!-- wp:paragraph {"style":{"spacing":{"margin":{"bottom":"1.5rem"}}}} -->
            <p style="margin-bottom:1.5rem">Get the latest news delivered to your inbox. Subscribe to our newsletter for exclusive content and breaking updates.</p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:column -->
        
        <!-- wp:column {"width":"40%"} -->
        <div class="wp-block-column" style="flex-basis:40%">
            <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
            <div class="wp-block-buttons">
                <!-- wp:button {"backgroundColor":"white","textColor":"sunrise-orange","style":{"spacing":{"padding":{"top":"1rem","bottom":"1rem","left":"2rem","right":"2rem"}}}} -->
                <div class="wp-block-button">
                    <a class="wp-block-button__link has-sunrise-orange-color has-white-background-color has-text-color has-background wp-element-button" style="padding-top:1rem;padding-right:2rem;padding-bottom:1rem;padding-left:2rem">Subscribe Now</a>
                </div>
                <!-- /wp:button -->
            </div>
            <!-- /wp:buttons -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->',
        )
    );
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
