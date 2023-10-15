<?php
/**
 * The general meta tags, such as title and description.
 *
 * @since 1.0.0
 */

declare(strict_types=1);

namespace AirySEO\Modules;

use AirySEO\Enums;

/**
 * Meta tags controller.
 */
class MetaTags {

	/**
	 * Constructor.
	 */
	public function __construct() {
		add_action( 'wp_head', array( $this, 'print_meta_description' ), 2 );
		add_filter( 'document_title_parts', array( $this, 'modify_head_title' ), 10, 1 );
	}

	/**
	 * Modify the title of the current page.
	 *
	 * @param array $title_parts The current title parts.
	 * @return string
	 */
	public function modify_head_title( array $title_parts ): array {
		if ( ! is_singular() ) {
			return $title_parts;
		}
		global $post;

		$seo_title = get_post_meta( $post->ID, Enums::META_TITLE, true );
		if ( ! empty( $seo_title ) ) {
			$title_parts['title'] = $seo_title;
		}
		return $title_parts;
	}

	/**
	 * Get the meta description of the current page.
	 *
	 * @return void
	 */
	public function print_meta_description() {
		if ( ! is_singular() ) {
			return;
		}
		global $post;

		$description = get_post_meta( $post->ID, Enums::META_DESCRIPTION, true );
		if ( ! empty( $description ) ) {
			echo '<meta name="description" content="' . $description . '">' . "\n";
		}
	}
}
