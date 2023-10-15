<?php
/**
 * Options page.
 */

?>

<div class="wrap">
	<h1><?php esc_html_e( 'Airy SEO', 'airy-seo' ); ?></h1>
	<p><?php esc_html_e( 'Please select the feature you would like to use.', 'airy-seo' ); ?></p>
	<form action="options.php" method="post">
		<?php
		settings_fields( $setting_group );
		do_settings_sections( $page );
		submit_button();
		?>
	</form>
</div>

