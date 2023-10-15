<?php
/**
 * The Twitter Card module.
 *
 * @since 1.0.0
 */

declare(strict_types=1);

namespace AirySEO\Modules;

/**
 * Twitter Card module.
 */
class TwitterCard {

	/**
	 * Constructor.
	 */
	public function __construct() {
		add_action( 'wp_head', array( $this, 'add_tags' ), 2 );
	}

	/**
	 * Add the Twitter Card to the head.
	 *
	 * @return void
	 */
	public function add_tags() {
		if ( ! is_singular() ) {
			return;
		}

		global $post;

		$post_content  = strip_tags( $post->post_content );
		$description   = wp_trim_words( $post_content, 15, '...' );
		$thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' );

		$data = array(
			'x' => array(
				'twitter:card'        => 'summary_large_image',
				'twitter:title'       => get_the_title(),
				'twitter:description' => $description,
				'twitter:url'         => get_permalink(),
				'twitter:image'       => $thumbnail_src[0] ?? '',
			),
		);

		echo airyseo_get_template( 'modules/twitter-card', $data );
	}
}
