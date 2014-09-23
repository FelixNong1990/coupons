<?php
/**
 * Child Theme functions file
 *
 * @package Flatter
 * @author Themebound
 */

require( dirname(__FILE__) . '/includes/theme-defaults.php' );
if( is_admin() ) 
	require( dirname(__FILE__) . '/includes/theme-admin.php' );
require( dirname(__FILE__) . '/includes/theme-actions.php' );
require( dirname(__FILE__) . '/includes/theme-functions.php' );
require( dirname(__FILE__) . '/includes/theme-mobile-widgets.php' );

//allow redirection, even if my theme starts to send output to the browser
add_action('init', 'do_output_buffer');
function do_output_buffer() {
        ob_start();
}


// Little function to return a custom field value
function wpshed_get_custom_field($value)
{
    global $post;
    
    $custom_field = get_post_meta($post->ID, $value, true);
    if (!empty($custom_field))
        return is_array($custom_field) ? stripslashes_deep($custom_field) : stripslashes(wp_kses_decode_entities($custom_field));
    
    return false;
}

// Register the Metabox
function wpshed_add_custom_meta_box()
{
    add_meta_box('wpshed-meta-box', __('Embed Video', 'textdomain'), 'wpshed_meta_box_output', 'post', 'normal', 'high');
    //add_meta_box('wpshed-meta-box', __('Metabox Example', 'textdomain'), 'wpshed_meta_box_output', 'page', 'normal', 'high');
}
//add_action('add_meta_boxes', 'wpshed_add_custom_meta_box');

// Output the Metabox
function wpshed_meta_box_output($post)
{
    // create a nonce field
    wp_nonce_field('my_wpshed_meta_box_nonce', 'wpshed_meta_box_nonce');
?>
	<div class="pyre_metabox_field">
		<label for="wpshed_textarea">Embed Code</label>
		<div class="field">
			<textarea name="post_field_embed_code" id="post_field_embed_code" cols="70" rows="8"><?php echo wpshed_get_custom_field('post_meta_embed_code');?></textarea>
		</div>
	</div>
	<?php
}

// Save the Metabox values
function wpshed_meta_box_save($post_id)
{
    // Stop the script when doing autosave
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
        return;
    
    // Verify the nonce. If insn't there, stop the script
    if (!isset($_POST['wpshed_meta_box_nonce']) || !wp_verify_nonce($_POST['wpshed_meta_box_nonce'], 'my_wpshed_meta_box_nonce'))
        return;
    
    // Stop the script if the user does not have edit permissions
    if (!current_user_can('edit_post'))
        return;
    
    // Save the textfield
    //if (isset($_POST['wpshed_textfield']))
        //update_post_meta($post_id, 'post_meta_embed_code', esc_attr($_POST['post_field_embed_code']));
    
    // Save the textarea
    if (isset($_POST['post_field_embed_code']))
        update_post_meta($post_id, 'post_meta_embed_code', esc_attr($_POST['post_field_embed_code']));
}
add_action('save_post', 'wpshed_meta_box_save');
