<?php
/**
 * This class is responsible for the admin post list page.
 *
 * @since 1.0.0
 */

declare(strict_types=1);

namespace AirySEO\Admin;

/**
 * Posts controller.
 */
class Posts {

	/**
	 * Constructor.
	 */
	public function __construct() {
		add_action( 'manage_posts_custom_column', array( $this, 'display_column_data' ), 10, 2 );
		add_filter( 'manage_posts_columns', array( $this, 'add_column' ) );
	}

	/**
	 * Add a custom column to the post list.
	 *
	 * @param array $columns The current columns.
	 * @return array
	 */
	public function add_column( array $columns ): array {
		$new_columns = array();

		foreach ( $columns as $key => $value ) {
			$new_columns[ $key ] = $value;
			if ( 'author' === $key ) {
				$new_columns['seo_column'] = __( 'SEO', 'airy-seo' );
			}
		}

		return $new_columns;
	}

	/**
	 * Display the data for the custom column.
	 *
	 * @param string $column  The name of the column to display.
	 * @param int    $post_id The current post ID.
	 * @return void
	 */
	public function display_column_data( string $column, int $post_id ): void {
		if ( 'seo_column' !== $column ) {
			return;
		}
		$title       = get_post_meta( $post_id, '_airyseo_title', true );
		$description = get_post_meta( $post_id, '_airyseo_description', true );
		if ( ! empty( $title ) && ! empty( $description ) ) {
			echo airyseo_get_template( 'admin/parts/seo-column' );
		}
	}
}
