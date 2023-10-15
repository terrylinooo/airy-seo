<?php
/**
 * Template part for displaying the Facebook Open Graph option.
 */

?>

<label for="facebook-open-graph-option-yes">
	<?php _e( 'Yes', 'airy-seo' ); ?>
	<input id="facebook-open-graph-option-yes" type="radio" name="<?php echo $name; ?>" value="yes" <?php checked( 'yes', $option ); ?> />
</label>
<label for="facebook-open-graph-option-no">
	<?php _e( 'No', 'airy-seo' ); ?>
	<input id="facebook-open-graph-option-no" type="radio" name="<?php echo $name; ?>" value="no" <?php checked( 'no', $option ); ?> />
</label>
