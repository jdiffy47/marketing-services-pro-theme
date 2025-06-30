<?php
/**
 * Marketing Services Pro Theme Functions
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Theme setup
 */
function marketing_services_pro_setup() {
    // Add theme support for various features
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));
    add_theme_support('customize-selective-refresh-widgets');
    add_theme_support('responsive-embeds');
    
    // Register navigation menus
    register_nav_menus(array(
        'primary' => esc_html__('Primary Menu', 'marketing-services-pro'),
    ));
}
add_action('after_setup_theme', 'marketing_services_pro_setup');

/**
 * Enqueue scripts and styles
 */
function marketing_services_pro_scripts() {
    // Enqueue Tailwind CSS
    wp_enqueue_style('tailwindcss', get_template_directory_uri() . '/dist/tailwind.css', array(), '1.0.0');
    
    // Enqueue main stylesheet
    wp_enqueue_style('marketing-services-pro-style', get_stylesheet_uri(), array(), '1.0.0');
    
    // Enqueue custom JavaScript
    wp_enqueue_script('marketing-services-pro-script', get_template_directory_uri() . '/js/main.js', array(), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'marketing_services_pro_scripts');

/**
 * Customizer additions
 */
function marketing_services_pro_customize_register($wp_customize) {
    // Hero Section
    $wp_customize->add_section('hero_section', array(
        'title' => __('Hero Section', 'marketing-services-pro'),
        'priority' => 30,
    ));
    
    $wp_customize->add_setting('hero_title', array(
        'default' => 'Transform Your Business with Expert Marketing',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('hero_title', array(
        'label' => __('Hero Title', 'marketing-services-pro'),
        'section' => 'hero_section',
        'type' => 'text',
    ));
    
    $wp_customize->add_setting('hero_subtitle', array(
        'default' => 'Professional website design and digital marketing services that drive results and grow your business.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    
    $wp_customize->add_control('hero_subtitle', array(
        'label' => __('Hero Subtitle', 'marketing-services-pro'),
        'section' => 'hero_section',
        'type' => 'textarea',
    ));
    
    $wp_customize->add_setting('hero_cta_primary', array(
        'default' => 'View Services',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('hero_cta_primary', array(
        'label' => __('Primary CTA Text', 'marketing-services-pro'),
        'section' => 'hero_section',
        'type' => 'text',
    ));
    
    $wp_customize->add_setting('hero_cta_secondary', array(
        'default' => 'Get Free Quote',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('hero_cta_secondary', array(
        'label' => __('Secondary CTA Text', 'marketing-services-pro'),
        'section' => 'hero_section',
        'type' => 'text',
    ));
    
    // Services Section
    $wp_customize->add_section('services_section', array(
        'title' => __('Services Section', 'marketing-services-pro'),
        'priority' => 31,
    ));
    
    $wp_customize->add_setting('services_title', array(
        'default' => 'Our Services',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('services_title', array(
        'label' => __('Services Title', 'marketing-services-pro'),
        'section' => 'services_section',
        'type' => 'text',
    ));
    
    $wp_customize->add_setting('services_subtitle', array(
        'default' => 'Comprehensive digital solutions to help your business thrive online',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    
    $wp_customize->add_control('services_subtitle', array(
        'label' => __('Services Subtitle', 'marketing-services-pro'),
        'section' => 'services_section',
        'type' => 'textarea',
    ));
    
    // About Section
    $wp_customize->add_section('about_section', array(
        'title' => __('About Section', 'marketing-services-pro'),
        'priority' => 32,
    ));
    
    $wp_customize->add_setting('about_title', array(
        'default' => 'Why Choose Us?',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('about_title', array(
        'label' => __('About Title', 'marketing-services-pro'),
        'section' => 'about_section',
        'type' => 'text',
    ));
    
    $wp_customize->add_setting('about_content', array(
        'default' => 'With years of experience in digital marketing and web design, we understand what it takes to create successful online businesses. Our data-driven approach ensures measurable results for our clients.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    
    $wp_customize->add_control('about_content', array(
        'label' => __('About Content', 'marketing-services-pro'),
        'section' => 'about_section',
        'type' => 'textarea',
    ));
    
    // Contact Section
    $wp_customize->add_section('contact_section', array(
        'title' => __('Contact Section', 'marketing-services-pro'),
        'priority' => 33,
    ));
    
    $wp_customize->add_setting('contact_title', array(
        'default' => 'Ready to Get Started?',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('contact_title', array(
        'label' => __('Contact Title', 'marketing-services-pro'),
        'section' => 'contact_section',
        'type' => 'text',
    ));
    
    $wp_customize->add_setting('contact_subtitle', array(
        'default' => 'Let\'s discuss how we can help grow your business online',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    
    $wp_customize->add_control('contact_subtitle', array(
        'label' => __('Contact Subtitle', 'marketing-services-pro'),
        'section' => 'contact_section',
        'type' => 'textarea',
    ));
    
    $wp_customize->add_setting('contact_email', array(
        'default' => 'hello@yourcompany.com',
        'sanitize_callback' => 'sanitize_email',
    ));
    
    $wp_customize->add_control('contact_email', array(
        'label' => __('Contact Email', 'marketing-services-pro'),
        'section' => 'contact_section',
        'type' => 'email',
    ));
    
    $wp_customize->add_setting('contact_phone', array(
        'default' => '+1 (555) 123-4567',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('contact_phone', array(
        'label' => __('Contact Phone', 'marketing-services-pro'),
        'section' => 'contact_section',
        'type' => 'text',
    ));
    
    $wp_customize->add_setting('contact_address', array(
        'default' => 'Your City, State 12345',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('contact_address', array(
        'label' => __('Contact Address', 'marketing-services-pro'),
        'section' => 'contact_section',
        'type' => 'text',
    ));
}
add_action('customize_register', 'marketing_services_pro_customize_register');

/**
 * Add custom image sizes
 */
function marketing_services_pro_image_sizes() {
    add_image_size('hero-image', 1920, 800, true);
    add_image_size('service-thumbnail', 400, 300, true);
}
add_action('after_setup_theme', 'marketing_services_pro_image_sizes');

/**
 * Custom excerpt length
 */
function marketing_services_pro_excerpt_length($length) {
    return 20;
}
add_filter('excerpt_length', 'marketing_services_pro_excerpt_length');

/**
 * Custom excerpt more
 */
function marketing_services_pro_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'marketing_services_pro_excerpt_more');

/**
 * Add custom body classes
 */
function marketing_services_pro_body_classes($classes) {
    // Add a class of no-sidebar when there is no sidebar present
    if (!is_active_sidebar('sidebar-1')) {
        $classes[] = 'no-sidebar';
    }
    
    return $classes;
}
add_filter('body_class', 'marketing_services_pro_body_classes'); 