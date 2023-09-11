<div class="qodef-e-media">
	<?php
	switch ( get_post_format() ) {
		case 'gallery':
			obsius_template_part( 'blog', 'templates/parts/post-format/gallery' );
			break;
		case 'video':
			obsius_template_part( 'blog', 'templates/parts/post-format/video' );
			break;
		case 'audio':
			obsius_template_part( 'blog', 'templates/parts/post-format/audio' );
			break;
		default:
			obsius_template_part( 'blog', 'templates/parts/post-info/image' );
			break;
	}
	?>
</div>
