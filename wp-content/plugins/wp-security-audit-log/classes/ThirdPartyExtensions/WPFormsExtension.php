<?php
/**
 * WP Forms extension class.
 *
 * @package    wsal
 * @subpackage add-ons
 */

if ( ! class_exists( 'WSAL_WPFormsExtension' ) ) {

	/**
	 * Class provides basic information about WSAL extension for WP Forms.
	 *
	 * @package    wsal
	 * @subpackage add-ons
	 */
	class WSAL_WPFormsExtension extends WSAL_AbstractExtension {

		/**
		 * {@inheritDoc}
		 */
		public function filter_installable_plugins( $plugins ) {
			$new_plugin = array(
				array(
					'addon_for'          => 'wpforms',
					'title'              => $this->get_plugin_name(),
					'image_filename'     => 'wpforms.png',
					'plugin_slug'        => $this->get_plugin_filename(),
					'plugin_basename'    => 'wsal-wpforms.php',
					'plugin_url'         => 'https://downloads.wordpress.org/plugin/wp-security-audit-log-add-on-for-wpforms.latest-stable.zip',
					'event_tab_id'       => '#cat-wpforms',
					'plugin_description' => 'Keep a record of when someone adds, modifies or deletes forms, entries and more in the WPForms plugin.',
				),
			);

			// combine the two arrays.
			return array_merge( $plugins, $new_plugin );
		}

		/**
		 * {@inheritDoc}
		 */
		public function add_event_codes( $addon_event_codes ) {
			$new_event_codes = array(
				'wpforms' => array(
					'name'      => $this->get_plugin_name(),
					'event_ids' => array( 5500, 5501, 5502, 5503, 5504, 5505, 5506 ),
				),
			);

			// combine the two arrays.
			return array_merge( $addon_event_codes, $new_event_codes );
		}

		/**
		 * {@inheritDoc}
		 */
		public function get_custom_post_types() {
			return array( 'wpforms' );
		}

		/**
		 * {@inheritDoc}
		 */
		public function get_plugin_name() {
			return 'WPForms';
		}

		/**
		 * {@inheritDoc}
		 */
		public function get_plugin_icon_url() {
			return 'https://ps.w.org/wp-security-audit-log-add-on-for-wpforms/assets/icon-128x128.png?rev=2241926';
		}

		/**
		 * {@inheritDoc}
		 */
		public function get_color() {
			return '#e27730';
		}

		/**
		 * {@inheritDoc}
		 */
		public function get_plugin_filename() {
			return 'wp-security-audit-log-add-on-for-wpforms/wsal-wpforms.php';
		}
	}
}
