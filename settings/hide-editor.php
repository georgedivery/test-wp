<?php
/**
 * Hide editor on specific pages.
 *   - Use $remove_editor_from_titles array to remove editor from pages with specific title
 *     Example: $remove_editor_from_titles = ['Homepage', 'Home'];
 *   - Use $templates array to add specific templates.
 */
function hide_editor($arg)
{
    $remove_editor_from_titles = ['Home'];
    $remove_editor_from_templates = ['template-team.php','template-contact-us.php'];
    // Get the Post ID.
    $post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'];
    if (!isset($post_id)) {
        return;
    }

    // Hide the editor on the page titled 'Homepage'
    $home_page_name = get_the_title($post_id);
    if (in_array($home_page_name, $remove_editor_from_titles)) {
        remove_post_type_support('page', 'editor');
    }

    // Hide the editor on a page with a specific page template
    // Get the name of the Page Template file.
    $template_file = get_post_meta($post_id, '_wp_page_template', true);
    // dd($template_file);
    if (in_array($template_file, $remove_editor_from_templates)) {
        remove_post_type_support('page', 'editor');
    }
}

add_action('admin_init', 'hide_editor');
