<?php
/**
 * Generate an metabox at the bottom of the post editing page,
 * as well as handle the saving of settings.
 *
 * @since 1.0.0
 */

declare(strict_types=1);

namespace AirySEO\Admin;

use WP_Post;
use AirySEO\Enums;

/**
 * Metabox controller.
 */
class Metabox {

	/**
	 * Constructor.
	 */
	public function __construct() {
		add_action( 'add_meta_boxes', array( $this, 'add_meta_box' ) );
		add_action( 'save_post', array( $this, 'save_meta_box' ) );
	}

	/**
	 * Add the metabox to the post editing page.
	 */
	public function add_meta_box(): void {
		add_meta_box(
			'airyseo_post_metabox',
			__( 'Airy SEO', 'airy-seo' ),
			array( $this, 'render_meta_box' ),
			array( 'post', 'page' ),
			'normal',
			'default'
		);
	}

	/**
	 * Render the metabox in the post editing page.
	 *
	 * @param WP_Post $post Current post object.
	 */
	public function render_meta_box( WP_Post $post ) {
		$title       = get_post_meta( $post->ID, '_airyseo_title', true );
		$description = get_post_meta( $post->ID, '_airyseo_description', true );
		$nonce_field = wp_nonce_field( 'airyseo_create_nonce', 'airyseo_metabox_nonce', false );

		echo airyseo_get_template(
			'admin/metabox',
			array(
				'title'       => $title,
				'description' => $description,
				'nonce_field' => $nonce_field,
			)
		);
	}

	/**
	 * Save the metabox settings.
	 *
	 * @param int $post_id Current post ID.
	 */
	function save_meta_box( int $post_id ) {
		if (
			! isset( $_POST['airyseo_metabox_nonce'] ) ||
			! current_user_can( 'edit_post', $post_id )
		) {
			return;
		}

		$nonce = sanitize_text_field( wp_unslash( $_POST['airyseo_metabox_nonce'] ) );

		if ( ! wp_verify_nonce( $nonce, 'airyseo_create_nonce' ) ) {
			return;
		}

		if ( isset( $_POST['airyseo_title'] ) ) {
			$title = trim( sanitize_text_field( wp_unslash( $_POST['airyseo_title'] ) ) );
			update_post_meta( $post_id, Enums::META_TITLE, $title );
		}

		if ( isset( $_POST['airyseo_description'] ) ) {
			$description = trim( sanitize_text_field( wp_unslash( $_POST['airyseo_description'] ) ) );
			update_post_meta( $post_id, Enums::META_DESCRIPTION, $description );
		}
	}
}
