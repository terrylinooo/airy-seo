<?php
/**
 * The constants for this plugin.
 * Main propose is to avoid typos and make it easier to check with intellisense.
 */

declare(strict_types=1);

namespace AirySEO;

/**
 * Airy SEO plugin constants.
 */
class Enums {

	// The postmeta key for the title.
	const META_TITLE = '_airyseo_title';

	// The postmeta key for the description.
	const META_DESCRIPTION = '_airyseo_description';

	// The pluing settings name.
	const SETTING_OPTION_NAME = 'airyseo_settings';

	// The pluing settings group.
	const SETTING_GROUP = 'airyseo_settings_group';

	// The plugin menu slug.
	const MENU_SLUG = 'airyseo-options';

	// The setting option of the Facebook OG tags.
	const OPTION_ENABLE_FACEBOOK_OG_TAGS = 'enable_facebook_og_tags';

	// The setting option of the Twitter card.
	const OPTION_ENABLE_TWITTER_CARD = 'enable_twitter_card';
}
