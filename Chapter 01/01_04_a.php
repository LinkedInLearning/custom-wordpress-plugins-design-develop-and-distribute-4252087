<?php
// Add custom meta boxes for additional project details
function opv_add_project_meta_boxes() {
    add_meta_box(
        'opv_project_details',
        __('Project Details', 'our-project-vault'),
        'opv_render_project_meta_box',
        'project',
        'normal',
        'default'
    );
}
add_action('add_meta_boxes', 'opv_add_project_meta_boxes');


