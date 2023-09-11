<?php
$tags = get_the_tags();

if ( $tags ) {
	?>
	<div class="qodef-info-tags">
		<?php the_tags( '', ',' ); ?>
	</div>
<?php } ?>
