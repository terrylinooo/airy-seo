<?php
/**
 * Plugin Name: Airy SEO
 * Plugin URI:  https://github.com/terrylinooo/airy-seo
 * Description: A lightweight WordPress plugin offering essential SEO tools without the bloat.
 * Version:     1.0.0
 * Author:      Terry Lin
 * Author URI:  https://terryl.in/
 * License:     GPL 3.0
 * License URI: http://www.gnu.org/licenses/gpl-3.0.txt
 * Text Domain: airy-seo
 * Domain Path: /languages
 */

/**
 * This file is the entry point of the plugin.
 */

require 'vendor/autoload.php';

$airyseo = new AirySEO\Launcher( __FILE__, '1.0.0' );
$airyseo->init();
