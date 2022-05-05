<?php

/**
 * Page and post template overrides for CA Design System content
 * @package CADesignSystem
 */


add_action('after_setup_theme', 'cagov_init');
add_action('caweb_pre_main_primary', 'cagov_pre_main_primary');
add_action('caweb_pre_footer', 'cagov_content_menu');
add_action('wp_head', 'cagov_footer_scripts');

/**
 * CADesignSystem Init
 * Triggered before any other hook when a user accesses the admin area.
 * Note, this does not just run on user-facing admin screens.
 * It runs on admin-ajax.php and admin-post.php as well.
 *
 * @category add_action( 'init', 'cagov_init' );
 * @link https://codex.wordpress.org/Plugin_API/Action_Reference/admin_init
 * @return void
 */
function cagov_init()
{
    /* Include functionality */
    foreach (glob(__DIR__ . '/includes/*.php') as $file) {
        require_once $file;
    }
}

