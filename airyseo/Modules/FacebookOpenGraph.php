<?php
/**
 * The Facebook Open Graph module.
 *
 * @since 1.0.0
 */

declare(strict_types=1);

namespace AirySEO\Modules;

/**
 * Facebook Open Graph module.
 */
class FacebookOpenGraph {

	/**
	 * Constructor.
	 */
	public function __construct() {
		add_action( 'wp_head', array( $this, 'add_tags' ), 2 );
	}

	/**
	 * Add the Facebook Open Graph tags to the head.
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
			'og_tags' => array(
				'og:site_name'   => get_bloginfo( 'name' ),
				'og:title'       => get_the_title(),
				'og:description' => $description,
				'og:url'         => get_permalink(),
				'og:type'        => 'article',
				'og:image'       => $thumbnail_src[0] ?? '',
			),
		);

		echo airyseo_get_template( 'modules/facebook-open-graph', $data );
	}
}
