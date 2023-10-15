<?php
/**
 * Handling plugin activation and deactivation.
 *
 * @since 1.0.0
 */

declare(strict_types=1);

namespace AirySEO\Admin;

use AirySEO\Enums;

/**
 * Metabox controller.
 */
class Activation {

	/**
	 * Constructor.
	 *
	 * @param string $base The base path for the plugin's entry file.
	 */
	public function __construct( string $base ) {
		register_activation_hook( $base, array( $this, 'activate' ) );
		register_deactivation_hook( $base, array( $this, 'deactivate' ) );
	}

	/**
	 * Method triggered upon plugin activation.
	 *
	 * @return void
	 */
	public function activate() {
		update_option(
			Enums::SETTING_OPTION_NAME,
			array(
				'enable_facebook_open_graph' => 'no',
				'enable_twitter_card'        => 'no',
			)
		);
	}

	/**
	 * Method triggered upon plugin deactivation.
	 *
	 * @return void
	 */
	public function deactivate() {
		delete_option( Enums::SETTING_OPTION_NAME );
	}
}
