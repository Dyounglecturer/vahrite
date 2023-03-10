<?php
/**
 * This class handles Weclome page for Jupiter X.
 *
 * @since 1.21.0
 *
 * @package JupiterX\Framework\Admin\Weclcome
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Welcome class.
 *
 * @since 1.21.0
 *
 * @package JupiterX\Framework\Admin\Notices
 */
class JupiterX_Admin_Welcome {

	/**
	 * Class Constructor.
	 *
	 * @since 1.21.0
	 * @access public
	 */
	public function __construct() {
		add_filter( 'tgmpa_load', '__return_true', 10, 1 );
		add_action( 'wp_ajax_jupiterx_get_plugins', [ $this, 'get_required_plugins' ] );
	}

	/**
	 * Get inactive required plugins.
	 *
	 * @since 1.21.0
	 * @access public
	 *
	 * @return void
	 */
	public function get_required_plugins() {
		check_ajax_referer( 'jupiterx_get_welcome_inactive_required_plugins' );

		$plugins = jupiterx_get_inactive_required_plugins();

		if ( ! is_array( $plugins ) || count( $plugins ) === 0 ) {
			wp_send_json_error();
		}

		wp_send_json_success( [
			'bulk_actions' => $this->get_plugin_bulk_actions( $plugins ),
			'plugins'      => $plugins,
		] );
	}

	/**
	 * Get Plugin Bulk Actions.
	 *
	 * @since 1.21.0
	 *
	 * @param array $plugins Plugins list.
	 *
	 * @return array
	 */
	public function get_plugin_bulk_actions( $plugins ) {
		return [
			'activate_required_plugins' => [
				'url' => admin_url( 'plugins.php' ),
				'action' => 'activate-selected',
				'action2' => -1,
				'_wpnonce' => wp_create_nonce( 'bulk-plugins' ),
				'checked' => $this->get_required_plugins_slug( $plugins, 'basename' ),
			],
			'install_required_plugins' => [
				'url' => admin_url( 'themes.php?page=tgmpa-install-plugins' ),
				'action' => 'tgmpa-bulk-install',
				'action2' => -1,
				'_wpnonce' => wp_create_nonce( 'bulk-plugins' ),
				'tgmpa-page' => 'tgmpa-install-plugins',
				'plugin' => $this->get_required_plugins_slug( $plugins, 'slug' ),
			],
		];
	}

	/**
	 * Get plugin slugs for bulk action.
	 *
	 * @since 1.21.0
	 *
	 * @param array  $plugins Plugins list.
	 * @param string $field Plugin slug or basename.
	 *
	 * @return array
	 */
	private function get_required_plugins_slug( $plugins, $field ) {
		$slugs = [];

		if ( ! is_array( $plugins ) ) {
			return slugs;
		}

		foreach ( $plugins as $plugin ) {
			if ( 'true' === $plugin['required'] ) {
				$slugs[] = $plugin[ $field ];
			}
		}

		return $slugs;
	}
}

new JupiterX_Admin_Welcome();
