<?php
/**
 * Uninstall plugin.
 */

defined( 'WP_UNINSTALL_PLUGIN' ) || die;

delete_option( 'airyseo_settings' );
