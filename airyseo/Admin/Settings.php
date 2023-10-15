<?php
/**
 * Mange the settings of the plugin.
 *
 * @since 1.0.0
 */

declare(strict_types=1);

namespace AirySEO\Admin;

use AirySEO\Enums;

/**
 * Settings controller.
 */
class Settings {

	/**
	 * The plugin's settings.
	 *
	 * @var array
	 */
	public $settings = array();

	/**
	 * Constructor.
	 */
	public function __construct() {
		$this->settings = get_option( Enums::SETTING_OPTION_NAME );

		add_action( 'admin_init', array( $this, 'regster_setting' ) );
		add_action( 'admin_init', array( $this, 'add_setting_fields' ) );
	}

	/**
	 * Register the settings of the plugin.
	 *
	 * @return void
	 */
	public function regster_setting(): void {
		register_setting(
			Enums::SETTING_GROUP,
			Enums::SETTING_OPTION_NAME
		);
	}

	/**
	 * Add the setting fields.
	 *
	 * @return void
	 */
	public function add_setting_fields(): void {
		add_settings_section(
			'airy-seo-settings-section',
			__( 'General Settings', 'airy-seo' ),
			array( $this, 'render_section' ),
			Enums::MENU_SLUG
		);

		add_settings_field(
			'social-media-facebook',
			__( 'Facebook Open Graph', 'airy-seo' ),
			array( $this, 'render_facebook_open_graph_option' ),
			Enums::MENU_SLUG,
			'airy-seo-settings-section'
		);

		add_settings_field(
			'social-media-twitter',
			__( 'Twitter Card', 'airy-seo' ),
			array( $this, 'render_twitter_card_option' ),
			Enums::MENU_SLUG,
			'airy-seo-settings-section'
		);
	}

	/**
	 * Render the settings section.
	 *
	 * @return void
	 */
	public function render_section() {
		echo '';
	}

	/**
	 * Render the twitter card option.
	 *
	 * @return void
	 */
	public function render_twitter_card_option(): void {
		$name   = airyseo_get_option_name( Enums::OPTION_ENABLE_TWITTER_CARD );
		$option = airyseo_get_option( Enums::OPTION_ENABLE_TWITTER_CARD );

		echo airyseo_get_template(
			'admin/options/twitter-card',
			array(
				'name'   => $name,
				'option' => $option,
			)
		);
	}

	/**
	 * Render the facebook open graph option.
	 *
	 * @return void
	 */
	public function render_facebook_open_graph_option(): void {
		$name   = airyseo_get_option_name( Enums::OPTION_ENABLE_FACEBOOK_OG_TAGS );
		$option = airyseo_get_option( Enums::OPTION_ENABLE_FACEBOOK_OG_TAGS );

		echo airyseo_get_template(
			'admin/options/facebook-open-graph',
			array(
				'name'   => $name,
				'option' => $option,
			)
		);
	}
}
