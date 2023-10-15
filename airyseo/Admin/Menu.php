<?php
/**
 * This class is responsible for the menu position of the plugin,
 * as well as the entry link to the settings page.
 *
 * @since 1.0.0
 */

declare(strict_types=1);

namespace AirySEO\Admin;

use AirySEO\Enums;

/**
 * Menu controller.
 */
class Menu {

	/**
	 * Constructor.
	 */
	public function __construct() {
		add_action( 'admin_menu', array( $this, 'create_options_page' ) );
	}

	/**
	 * Create the options page for the plugin.
	 *
	 * @return void
	 */
	function create_options_page(): void {
		add_options_page(
			__( 'Airy SEO', 'airy-seo' ),
			__( 'Airy SEO', 'airy-seo' ),
			'manage_options',
			ENUMS::MENU_SLUG,
			array( $this, 'render_options_page' )
		);
	}

	/**
	 * Render the options page for the plugin.
	 * Called by this::create_options_page().
	 *
	 * @return void
	 */
	function render_options_page(): void {
		echo airyseo_get_template(
			'admin/options',
			array(
				'setting_group' => Enums::SETTING_GROUP,
				'page'          => Enums::MENU_SLUG,
			)
		);
	}

}
