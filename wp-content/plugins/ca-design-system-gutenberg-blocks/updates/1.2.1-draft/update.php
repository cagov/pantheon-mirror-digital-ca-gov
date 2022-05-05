<?php 

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
 exit;
}
 
// ca_design_system_gb_update_1_2_0() {
//     // global $wpdb;

//     // $table = $wpdb->prefix . 'posts';

//     // $wpdb->query("UPDATE $table SET 
//     // post_content = replace(post_content, 'wp:ca-design-system/card-grid, 'wp:ca-design-system/link-grid')");
 

//     // var_dump( $wpdb->last_query ) ;

//     // $wpdb->flush();
// }


// /**
//  * This function runs when WordPress completes its upgrade process
//  * It iterates through each plugin updated to see if ours is included
//  * @param $upgrader_object Array
//  * @param $options Array
//  */
// function ca_design_system_gb_upgrade_completed( $upgrader_object, $options ) {
//  // The path to our plugin's main file
//  $our_plugin = plugin_basename( __FILE__ );


//  // If an update has taken place and the updated type is plugins and the plugins element exists
//  if( $options['action'] == 'update' && $options['type'] == 'plugin' && isset( $options['plugins'] ) ) {
//   // Iterate through the plugins being updated and check if ours is there
//   foreach( $options['plugins'] as $plugin ) {
//    if( $plugin == $our_plugin ) {
//     // Set a transient to record that our plugin has just been updated
//     set_transient( 'ca_design_system_gb_updated', 1 );
//    }
//   }
//  }
// }
// add_action( 'upgrader_process_complete', 'ca_design_system_gb_upgrade_completed', 10, 2 );
 
// /**
//  * Show a notice to anyone who has just updated this plugin
//  * This notice shouldn't display to anyone who has just installed the plugin for the first time
//  */
// function ca_design_system_gb_display_update_notice() {
//  // Check the transient to see if we've just updated the plugin
//  if( get_transient( 'ca_design_system_gb_updated' ) ) {
//   echo '<div class="notice notice-success">' . __( 'Thanks for updating', 'ca-design-system-gutenberg-blocks' ) . '</div>';
//   delete_transient( 'ca_design_system_gb_updated' );
//  }
// }
// add_action( 'admin_notices', 'ca_design_system_gb_display_update_notice' );
 
// /**
//  * Show a notice to anyone who has just installed the plugin for the first time
//  * This notice shouldn't display to anyone who has just updated this plugin
//  */
// function ca_design_system_gb_display_install_notice() {
//  // Check the transient to see if we've just activated the plugin
//  if( get_transient( 'ca_design_system_gb_activated' ) ) {
//   echo '<div class="notice notice-success">' . __( 'Thanks for installing', 'ca-design-system-gutenberg-blocks' ) . '</div>';
//   // Delete the transient so we don't keep displaying the activation message
//  delete_transient( 'ca_design_system_gb_activated' );
//  }
// }
// add_action( 'admin_notices', 'ca_design_system_gb_display_install_notice' );
 
// /**
//  * Run this on activation
//  * Set a transient so that we know we've just activated the plugin
//  */
// function ca_design_system_gb_activate() {
//  set_transient( 'ca_design_system_gb_activated', 1 );
// }
// register_activation_hook( __FILE__, 'ca_design_system_gb_activate' );