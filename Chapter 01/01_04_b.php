<?php
function opv_render_project_meta_box($post) {
    // Retrieve current meta values
    $project_start_date = get_post_meta($post->ID, '_opv_project_start_date', true);
    $project_end_date = get_post_meta($post->ID, '_opv_project_end_date', true);
    $project_status = get_post_meta($post->ID, '_opv_project_status', true);

    ?>
    <label for="opv_project_start_date"><?php _e('Start Date', 'our-project-vault'); ?>:</label>
    <input type="date" id="opv_project_start_date" name="opv_project_start_date" value="<?php echo esc_attr($project_start_date); ?>" style="width: 100%; margin-bottom: 10px;" />
    
    <label for="opv_project_end_date"><?php _e('End Date', 'our-project-vault'); ?>:</label>
    <input type="date" id="opv_project_end_date" name="opv_project_end_date" value="<?php echo esc_attr($project_end_date); ?>" style="width: 100%; margin-bottom: 10px;" />
    
    <label for="opv_project_status"><?php _e('Project Status', 'our-project-vault'); ?>:</label>
    <select id="opv_project_status" name="opv_project_status" style="width: 100%; margin-bottom: 10px;">
        <option value="not_started" <?php selected($project_status, 'not_started'); ?>><?php _e('Not Yet Started', 'our-project-vault'); ?></option>
        <option value="in_progress" <?php selected($project_status, 'in_progress'); ?>><?php _e('In Progress', 'our-project-vault'); ?></option>
        <option value="complete" <?php selected($project_status, 'complete'); ?>><?php _e('Complete', 'our-project-vault'); ?></option>
    </select>
    <?php
}

