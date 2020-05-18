<?php
/**
 * Custom class to create new post types.
 */
class CustomPostType
{
    private $settings;

    /**
     * 
     */
    public function __construct($name, $singular_name, $slug, $taxonomies = [])
    {
        $this->settings = [
            'name' => $name,
            'singular_name' => $singular_name,
            'slug' => $slug,
            'taxonomies' => $taxonomies,
        ];

        add_action('init', [&$this, 'add_custom_post_type']);
    }

    public function add_custom_post_type()
    {
        $labels = [
            'name'                  => _x($this->settings['name'], 'Post Type General Name', 'motionkata-adt'),
            'singular_name'         => _x($this->settings['singular_name'], 'Post Type Singular Name', 'motionkata-adt'),
            'menu_name'             => __($this->settings['name'], 'motionkata-adt'),
            'name_admin_bar'        => __('Post Type', 'motionkata-adt'),
            'archives'              => __('Item Archives', 'motionkata-adt'),
            'attributes'            => __('Item Attributes', 'motionkata-adt'),
            'parent_item_colon'     => __('Parent Item:', 'motionkata-adt'),
            'all_items'             => __('All ' . $this->settings['name'], 'motionkata-adt'),
            'add_new_item'          => __('Add New Item', 'motionkata-adt'),
            'add_new'               => __('Add New', 'motionkata-adt'),
            'new_item'              => __('New Item', 'motionkata-adt'),
            'edit_item'             => __('Edit Item', 'motionkata-adt'),
            'update_item'           => __('Update Item', 'motionkata-adt'),
            'view_item'             => __('View Item', 'motionkata-adt'),
            'view_items'            => __('View Items', 'motionkata-adt'),
            'search_items'          => __('Search Item', 'motionkata-adt'),
            'not_found'             => __('Not found', 'motionkata-adt'),
            'not_found_in_trash'    => __('Not found in Trash', 'motionkata-adt'),
            'featured_image'        => __('Featured Image', 'motionkata-adt'),
            'set_featured_image'    => __('Set featured image', 'motionkata-adt'),
            'remove_featured_image' => __('Remove featured image', 'motionkata-adt'),
            'use_featured_image'    => __('Use as featured image', 'motionkata-adt'),
            'insert_into_item'      => __('Insert into item', 'motionkata-adt'),
            'uploaded_to_this_item' => __('Uploaded to this item', 'motionkata-adt'),
            'items_list'            => __('Items list', 'motionkata-adt'),
            'items_list_navigation' => __('Items list navigation', 'motionkata-adt'),
            'filter_items_list'     => __('Filter items list', 'motionkata-adt'),
        ];

        $args = array(
            'label'                 => __($this->settings['name'], 'motionkata-adt'),
            'description'           => __($this->settings['name'], 'motionkata-adt'),
            'labels'                => $labels,
            'supports'              => array( 'title',  'thumbnail' ),
            'hierarchical'          => false,
            'taxonomies' 	      	=> $this->settings['taxonomies'],
            'public'                => true,
            'show_ui'               => true,
            'show_in_rest'          => true,
            'show_in_menu'          => true,
            'menu_position'         => 5,
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'can_export'            => true,
            'has_archive'           => true,
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            'capability_type'       => 'post',
        );
        register_post_type($this->settings['slug'], $args);
    }
}
