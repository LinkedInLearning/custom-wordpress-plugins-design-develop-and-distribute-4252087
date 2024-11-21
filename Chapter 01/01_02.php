<?php

// Register custom post type for Project Management
function opv_register_project_cpt() {
    $labels = array(
        'name'                  => _x('Projects', 'Post type general name', 'our-project-vault'),
        'singular_name'         => _x('Project', 'Post type singular name', 'our-project-vault'),
        'menu_name'             => _x('Our Project Vault', 'Admin Menu text', 'our-project-vault'),
        'name_admin_bar'        => _x('Project', 'Add New on Toolbar', 'our-project-vault'),
        'add_new'               => __('Add New Project', 'our-project-vault'),
        'add_new_item'          => __('Add New Project', 'our-project-vault'),
        'new_item'              => __('New Project', 'our-project-vault'),
        'edit_item'             => __('Edit Project', 'our-project-vault'),
        'view_item'             => __('View Project', 'our-project-vault'),
        'all_items'             => __('All Projects', 'our-project-vault'),
        'search_items'          => __('Search Projects', 'our-project-vault'),
        'not_found'             => __('No projects found.', 'our-project-vault'),
        'not_found_in_trash'    => __('No projects found in Trash.', 'our-project-vault'),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'has_archive'        => true,
        'show_in_rest'       => true,
        'supports'           => array('title', 'editor', 'custom-fields'),
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-portfolio',
        'rewrite'            => array('slug' => 'projects'),
    );

    register_post_type('project', $args);
}
add_action('init', 'opv_register_project_cpt');

