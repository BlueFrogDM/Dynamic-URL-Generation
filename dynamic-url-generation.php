<?php
/**
* Plugin Name: Dynamic URL Generator
* Plugin URI: https://github.com/BlueFrogDM/Dynamic-URL-Generation/
* Description: Generate dynamic URLs based on form field submissions using JQuery.
* Version: 1.0
* Author: Nick Hinzmann - Blue Frog
* Author URI: https://www.bluefrogdm.com/
**/

// Register and load the widget
function dyn_url_gen_load_widget() {
    register_widget( 'dyn_url_gen' );
}
add_action( 'widgets_init', 'dyn_url_gen_load_widget' );
 
// Creating the widget 
class dyn_url_gen extends WP_Widget {
 
function __construct() {
parent::__construct(
 
// Base ID of your widget
'dyn_url_gen', 
 
// Widget name will appear in UI
__('Dynamic URL Generation', 'dyn_url_gen_widget_domain'),
 
// Widget description
array( 'description' => __( 'Utilize custom form fields to dynamically generate URLs based on logic', 'dyn_url_gen_widget_domain' ), ) 
);
}
 
// Creating widget front-end
 
public function widget( $args, $instance ) {
$title = apply_filters( 'widget_title', $instance['title'] );
 
// before and after widget arguments are defined by themes
echo $args['before_widget'];
if ( ! empty( $title ) )
echo $args['before_title'] . $title . $args['after_title'];
 
// This is where you run the code and display the output
echo __( 'Hello, World!', 'dyn_url_gen_widget_domain' );
echo $args['after_widget'];
}
         
// Widget Backend 
public function form( $instance ) {
if ( isset( $instance[ 'title' ] ) ) {
$title = $instance[ 'title' ];
}
else {
$title = __( 'New title', 'dyn_url_gen_widget_domain' );
}
// Widget admin form
?>
<p>
<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>
<?php 
}
     
// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
$instance = array();
$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
return $instance;
}

} // Class dyn_url_gen ends here