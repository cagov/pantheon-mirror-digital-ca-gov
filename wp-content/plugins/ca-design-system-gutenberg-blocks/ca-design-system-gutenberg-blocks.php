<?php

/**
 * Plugin Name: ca.gov Design System Gutenberg Blocks
 * Plugin URI: https://github.com/cagov/ca-design-system-gutenberg-blocks
 * Description: Integrate the <a href="https://designsystem.webstandards.ca.gov">State of California Design System</a> into the WordPress Gutenberg editor.
 * Author: Office of Digital Innovation
 * Author URI: https://digital.ca.gov
 * Version: 1.2.0
 * License: MIT
 * License URI: https://opensource.org/licenses/MIT
 * Text Domain: ca-design-system
 *
 * @package  CAGOVDesignSystemGutenbergBlocks
 * @author   Office of Digital Innovation <info@digital.ca.gov>
 * @license  https://opensource.org/licenses/MIT MIT
 * @link     https://github.com/cagov/ca-design-system-gutenberg-blocks#README
 */

if (!defined('ABSPATH')) {
	exit;
}

// Plugin Constants.
define('CAGOV_DS_GUTENBERG_BLOCKS__VERSION', '1.2.0');
define('CAGOV_DS_GUTENBERG_BLOCKS__DIR_PATH', plugin_dir_path(__FILE__));
define('CAGOV_DS_GUTENBERG_BLOCKS__ADMIN_URL', plugin_dir_url(__FILE__));
define('CAGOV_DS_GUTENBERG_BLOCKS__FILE', __FILE__);

/**
 * Plugin API/Action Reference
 * Actions Run During an Admin Page Request.
 *
 * @link https://codex.wordpress.org/Plugin_API/Action_Reference#Actions_Run_During_an_Admin_Page_Request
 */
add_action('admin_init', 'cagov_design_system_gutenberg_blocks_admin_init');

/**
 * Admin Init
 *
 * Triggered before any other hook when a user accesses the admin area.
 * Note, this does not just run on user-facing admin screens.
 * It runs on admin-ajax.php and admin-post.php as well.
 * 
 * This pings the latest GitHub release and makes it available to plugin users to pull down changes.
 * For scheduling updates, please refer to GitHub. 
 * https://github.com/cagov/ca-design-system-gutenberg-blocks#README 
 * @NOTE will rename to https://github.com/cagov/cagov-design-system-headless-wordpress
 *
 * @category add_action( 'init', 'cagov_design_system_gutenberg_blocks_admin_init' );
 * @link   https://codex.wordpress.org/Plugin_API/Action_Reference/admin_init
 * @return void
 */
function cagov_design_system_gutenberg_blocks_admin_init()
{
	include_once CAGOV_DS_GUTENBERG_BLOCKS__DIR_PATH . '/core/class-ca-design-system-gutenberg-blocks-plugin-update.php';
}

/* Include Gutenberg blocks and patterns. */
// Core design system blocks (periodically synced with design system changes)
require_once CAGOV_DS_GUTENBERG_BLOCKS__DIR_PATH . '/cagov-design-system/blocks/plugin.php';
// Connect content modules/patterns 
// Patterns have more data & API requirements and multiple layouts.
require_once CAGOV_DS_GUTENBERG_BLOCKS__DIR_PATH . '/cagov-patterns/cagov-design-system-events/plugin.php'; // @TODO NEW Fix event api sorting
require_once CAGOV_DS_GUTENBERG_BLOCKS__DIR_PATH . '/cagov-patterns/cagov-design-system-posts/plugin.php';


$theme = wp_get_theme();

// If we are using the CAWeb theme (hosted on Flywheel)

// Until support in CAWeb theme is complete this adjusts the page layouts to be compatible

if ('CAWeb' === $theme->name) {
	// Add page templates
	if (!class_exists('CAGOVDesignSystemGutenbergBlocks_Plugin_Templates_Loader')) {
		include_once CAGOV_DS_GUTENBERG_BLOCKS__DIR_PATH . '/includes/class-ca-design-system-gutenberg-blocks-templates.php';
	}

	CAGOVDesignSystemGutenbergBlocks_Plugin_Templates_Loader::get_instance();
	include_once CAGOV_DS_GUTENBERG_BLOCKS__DIR_PATH . '/includes/caweb-page-resources.php';
	include_once CAGOV_DS_GUTENBERG_BLOCKS__DIR_PATH . '/includes/caweb-filters.php';
	include_once CAGOV_DS_GUTENBERG_BLOCKS__DIR_PATH . '/includes/caweb-functions.php';
} else {

	if ('cagov-wp-theme' == $theme->name) {
		// Theme specific handling
	}

	// Add page templates for "Pantheon version" of theme (currently: @cagov/cagov-wp-theme-generate-press)
	if (!class_exists('CADesignSystemGutenbergBlocks_Plugin_Templates_Loader_Pantheon')) {
		include_once CAGOV_DS_GUTENBERG_BLOCKS__DIR_PATH . '/includes/class-ca-design-system-gutenberg-blocks-templates-pantheon.php';
	}

	CADesignSystemGutenbergBlocks_Plugin_Templates_Loader_Pantheon::get_instance();
	include_once CAGOV_DS_GUTENBERG_BLOCKS__DIR_PATH . '/includes/pantheon-filters.php';
	include_once CAGOV_DS_GUTENBERG_BLOCKS__DIR_PATH . '/includes/pantheon-functions.php';

	// Plugin updates
	include_once CAGOV_DS_GUTENBERG_BLOCKS__DIR_PATH . '/updates/1.2.1-draft/update.php';
}


