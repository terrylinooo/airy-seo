<?php
/**
 * Template part for displaying the Twitter Card option.
 */

?>

<label for="twitter-card-option-yes">
	<?php _e( 'Yes', 'airy-seo' ); ?>
	<input id="twitter-card-option-yes" type="radio" name="<?php echo $name; ?>" value="yes" <?php checked( 'yes', $option ); ?> />
</label>
<label for="twitter-card-option-no">
	<?php _e( 'No', 'airy-seo' ); ?>
	<input id="twitter-card-option-no" type="radio" name="<?php echo $name; ?>" value="no" <?php checked( 'no', $option ); ?> />
</label>
