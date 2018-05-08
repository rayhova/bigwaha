<?php 

// Team Members Meta Boxes
add_action( 'add_meta_boxes', 'rgdeuce_team_meta_box_add' );
/* Save post meta on the 'save_post' hook. */
  


// Normal Pages Meta Boxes
add_action( 'add_meta_boxes', 'rgdeuce_page_meta_box_add' );

function rgdeuce_page_meta_box_add()
{
    add_meta_box(
        'custom_meta_box', // $id
        'RGDeuce Page Options', // $title 
        'page_meta_box', // $callback
        'page', // $page
        'normal', // $context
        'high'); // $priority
}
/**
 * Outputs the content of the meta box
 */
function page_meta_box( $post ) {
	global $post; 
    $rgdeuce_stored_meta = get_post_meta( $post->ID );
    $selected = isset( $rgdeuce_stored_meta['my_sidebar_select'] ) ? esc_attr( $rgdeuce_stored_meta['my_sidebar_select'][0] ) : '';
    wp_nonce_field( 'my_meta_page_box_nonce', 'meta_page_box_nonce' );
    ?>
  <p>
    <label for="meta-image" class="rgdeuce-row-title">Title Background</label>
    <input type="text" name="meta-image" id="meta-image" value="<?php if ( isset ( $rgdeuce_stored_meta['meta-image'] ) ) echo $rgdeuce_stored_meta['meta-image'][0]; ?>" />
    <input type="button" id="meta-image-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'rgdeuce-textdomain' )?>" />
</p> 
<p>
   <label for="my_sidebar_select">Sidebar Position</label>
        <select name="my_sidebar_select" id="my_sidebar_select">
            <option value="no-sidebar" <?php selected( $selected, 'no-sidebar' ); ?>>No Sidebar</option>
            <option value="left-sidebar" <?php selected( $selected, 'left-sidebar' ); ?>>Left Sidebar</option>
            <option value="right-sidebar" <?php selected( $selected, 'right-sidebar' ); ?>>Right Sidebar</option>
        </select>
</p>
<?php
}

/**
 * Loads the image management javascript
 */
function rgdeuce_image_enqueue() {
    global $typenow;
    if( $typenow == 'page' ) {
        wp_enqueue_media();
 
        // Registers and enqueues the required javascript.
        wp_register_script( 'meta-box-image', get_template_directory_uri() . '/js/meta-box-image.js', array( 'jquery' ) );
        wp_localize_script( 'meta-box-image', 'meta_image',
            array(
                'title' => __( 'Choose or Upload an Image', 'rgdeuce-textdomain' ),
                'button' => __( 'Use this image', 'rgdeuce-textdomain' ),
            )
        );
        wp_enqueue_script( 'meta-box-image' );
    }
}
add_action( 'admin_enqueue_scripts', 'rgdeuce_image_enqueue' );
add_action( 'save_post', 'rgdeuce_page_box_save' );
function rgdeuce_page_box_save( $post_id )
{
    // Bail if we're doing an auto save
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
     
    // if our nonce isn't there, or we can't verify it, bail
    if( !isset( $_POST['meta_page_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_page_box_nonce'], 'my_meta_page_box_nonce' ) ) return;
     
    // if our current user can't edit this post, bail
    if( !current_user_can( 'edit_posts' ) ) return;
     
    // now we can actually save the data
    $allowed = array( 
        'a' => array( // on allow a tags
            'href' => array() // and those anchors can only have href attribute
        )
    );
     
    // Checks for input and saves if needed
if( isset( $_POST[ 'meta-image' ] ) ) {
    update_post_meta( $post_id, 'meta-image', $_POST[ 'meta-image' ] );
}
// Checks for input and saves if needed
if( isset( $_POST['my_sidebar_select'] ) ){
        update_post_meta( $post_id, 'my_sidebar_select', esc_attr( $_POST['my_sidebar_select'] ) );
}
}



