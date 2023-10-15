<?php
/**
 * Template part for displaying the Facebook Open Graph tags.
 */

?>

<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="<?php echo esc_attr( $x['twitter:title'] ); ?>">
<meta name="twitter:description" content="<?php echo esc_attr( $x['twitter:description'] ); ?>">
<?php if ( $x['twitter:image'] ) { ?>
	<meta name="twitter:image" content="<?php echo esc_url( $x['twitter:image'] ); ?>">
<?php } ?>
