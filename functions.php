<?php

/**
 * Setup the theme and theme settings such as sync ACF fields.
 */
require_once('vendor/class-tgm-plugin-activation.php');

include('settings/register-required-plugins.php');
include('settings/setup.php');
include('settings/theme-panel.php');
/**
 * Hide editor on specific pages.
 *   - Use $remove_editor_from_titles array to remove editor from pages with specific title
 *     Example: $remove_editor_from_titles = ['Homepage', 'Home'];
 *   - Use $templates array to add specific templates.
 */
include('settings/hide-editor.php');

/**
 * Sync "Ftont Page" ACF group with:
 *  - Sections
 *      - Hero Section
 *      - Partners Section
 *      - Subscribe Section
 */

function motionkata_scripts()
{
    wp_deregister_script('jquery');
    
    wp_enqueue_script('jquery', get_stylesheet_directory_uri() . '/assets/js/vendor/jquery-3.1.1.min.js');
    wp_enqueue_script('slickjs', get_stylesheet_directory_uri() . '/assets/js/vendor/slick/slick.js');
    wp_enqueue_script('functions', get_stylesheet_directory_uri() . '/assets/js/functions.js');

    wp_enqueue_style('slickstyle', get_stylesheet_directory_uri() . '/assets/js/vendor/slick/slick.css');
    wp_enqueue_style('style', get_stylesheet_directory_uri() . '/assets/css/style.css');
}
add_action('wp_enqueue_scripts', 'motionkata_scripts');

/**
 * Include Custom Post Creator.
 */
include('helpers/CustomPostType.php');

/**
 * Create custom post type "Campaigns"
 */
// Example
// $campaigns = new CustomPostType('Campaigns', 'Campaign', 'campaigns', ['category']);
