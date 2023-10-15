<?php
/**
 * The template for the metabox in the post editing page.
 */

?>

<div id="airyseo-metabox">
	<div class="airyseo-metabox__item">
		<div class="airyseo-metabox__item-row">
			<label for="airyseo-title"><?php _e( 'Title', 'airy-seo' ); ?></label>
			<div class="airyseo-metabox__seo-status">
				<span class="seo-status__count">
					<span class="seo-status__title--current">0</span>
					<span class="airyseo-metabox__row--right__count__max">/ 60</span>
				</span>
			</div>
		</div>
		<div class="airyseo-metabox__item-row">
			<input type="text" id="airyseo-title" 
				name="airyseo_title" value="<?php echo esc_attr( $title ); ?>" />
		</div>
	</div>
	<div class="airyseo-metabox__item">
		<div class="airyseo-metabox__item-row">
			<label for="airyseo-description"><?php _e( 'Description', 'airy-seo' ); ?></label>
			<div class="airyseo-metabox__seo-status">
				<span class="seo-status__count">
					<span class="seo-status__description--current">0</span>
					<span class="airyseo-metabox__row--right__count__max">/ 160</span>
				</span>
			</div>
		</div>
		<div class="airyseo-metabox__item-row">
			<textarea id="airyseo-description" name="airyseo_description"><?php echo esc_attr( $description ); ?></textarea>
		</div>
	</div>
	<?php echo $nonce_field; ?>
</div>
