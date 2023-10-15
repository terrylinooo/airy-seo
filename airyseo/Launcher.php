<?php
/**
 * The constants for this plugin.
 * Main propose is to avoid typos and make it easier to check with intellisense.
 */

declare(strict_types=1);

namespace AirySEO;

/**
 * The class that initializes the plugin.
 */
class Launcher {

	/**
	 * The plugin version.
	 *
	 * @var string
	 */
	public $plugin_version = '1.0.0';

	/**
	 * Plugin directory, e.g. /var/www/html/wp-content/plugins/airy-seo/
	 *
	 * @var string
	 */
	public $plugin_dir = '';

	/**
	 * Plugin URL, e.g. http://localhost/wp-content/plugins/airy-seo/
	 *
	 * @var string
	 */
	public $plugin_url = '';

	/**
	 * Plugin name, e.g. airy-seo/airy-seo.php
	 *
	 * @var string
	 */
	public $plugin_name = '';

	/**
	 * Plugin base, e.g. /var/www/html/wp-content/plugins/airy-seo/airy-seo.php
	 *
	 * @var string
	 */
	public $plugin_base = '';

	/**
	 * Constructor.
	 *
	 * @param string $base    The plugin base path.
	 * @param string $version The plugin version.
	 */
	public function __construct( string $base, string $version ) {
		$this->plugin_base    = $base;
		$this->plugin_version = $version;
		$this->plugin_dir     = plugin_dir_path( $base );
		$this->plugin_url     = plugin_dir_url( $base );
		$this->plugin_name    = plugin_basename( $base );
	}

	/**
	 * Initialize the plugin.
	 *
	 * @return void
	 */
	public function init() {
		$this->load_textdomain();
		$this->load_admin_modules();
		$this->load_front_modules();
	}

	/**
	 * Load the textdomain for this plugin.
	 *
	 * @return void
	 */
	private function load_textdomain(): void {
		load_plugin_textdomain(
			'airy-seo',
			false,
			dirname( $this->plugin_name ) . '/languages'
		);
	}

	/**
	 * Only load the admin modules when the current page is in the admin area.
	 *
	 * @return void
	 */
	private function load_admin_modules(): void {
		if ( ! is_admin() ) {
			return;
		}

		new Admin\Activation( $this->plugin_base );
		new Admin\Assets( $this->plugin_url, $this->plugin_version );
		new Admin\Menu();
		new Admin\Metabox();
		new Admin\Posts();
		new Admin\Settings();
	}

	/**
	 * Functional component for features displayed on the front-end webpage.
	 *
	 * @return void
	 */
	private function load_front_modules(): void {
		if ( is_admin() ) {
			return;
		}

		new Modules\MetaTags();

		if ( 'yes' === airyseo_get_option( Enums::OPTION_ENABLE_FACEBOOK_OG_TAGS ) ) {
			new Modules\FacebookOpenGraph();
		}

		if ( 'yes' === airyseo_get_option( Enums::OPTION_ENABLE_TWITTER_CARD ) ) {
			new Modules\TwitterCard();
		}
	}
}
