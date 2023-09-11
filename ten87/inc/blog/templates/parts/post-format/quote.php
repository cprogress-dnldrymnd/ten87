<?php
$quote_meta = get_post_meta( get_the_ID(), 'qodef_post_format_quote_text', true );
$quote_text = ! empty( $quote_meta ) ? $quote_meta : get_the_title();

if ( ! empty( $quote_text ) ) {
	$quote_author     = get_post_meta( get_the_ID(), 'qodef_post_format_quote_author', true );
	$title_tag        = isset( $title_tag ) && ! empty( $title_tag ) ? $title_tag : 'h4';
	$author_title_tag = isset( $author_title_tag ) && ! empty( $author_title_tag ) ? $author_title_tag : 'span';
	?>
	<div class="qodef-e-quote">
		<span class="qodef-e-quote-label">
			<?php esc_html_e( 'Quote', 'obsius') ?>
		</span>
		<<?php echo esc_attr( $title_tag ); ?> class="qodef-e-quote-text"><?php echo esc_html( $quote_text ); ?></<?php echo esc_attr( $title_tag ); ?>>
		<?php if ( ! empty( $quote_author ) ) { ?>
			<<?php echo esc_attr( $author_title_tag ); ?> class="qodef-e-quote-author"><?php echo esc_html( $quote_author ); ?></<?php echo esc_attr( $author_title_tag ); ?>>
		<?php } ?>
		<?php if ( ! is_single() ) { ?>
			<a itemprop="url" class="qodef-e-quote-url" href="<?php the_permalink(); ?>"></a>
		<?php } ?>
		<svg xmlns="http://www.w3.org/2000/svg" width="80" height="73" viewBox="0 0 80 73">
			<path d="M.5.5V37H18.9A18.4,18.4,0,0,1,.5,55V72.5A35.829,35.829,0,0,0,36.3,37V.5Z" fill="none" stroke="#fff" stroke-miterlimit="10" stroke-width="1"/>
			<path d="M43.7.5V37H62.1A18.4,18.4,0,0,1,43.7,55V72.5A35.829,35.829,0,0,0,79.5,37V.5Z" fill="none" stroke="#fff" stroke-miterlimit="10" stroke-width="1"/>
		</svg>
	</div>
<?php } ?>
