<?php
/**
 * Template part for displaying the Facebook Open Graph tags.
 */

?>

<meta property="og:title" content="<?php echo esc_attr( $og_tags['og:title'] ); ?>">
<meta property="og:description" content="<?php echo esc_attr( $og_tags['og:description'] ); ?>">
<meta property="og:url" content="<?php echo esc_url( $og_tags['og:url'] ); ?>">
<?php if ( $og_tags['og:image'] ) : ?>
	<meta property="og:image" content="<?php echo esc_url( $og_tags['og:image'] ); ?>">
<?php endif; ?>
<meta property="og:type" content="article">
<meta property="og:site_name" content="<?php echo esc_attr( $og_tags['og:site_name'] ); ?>">
