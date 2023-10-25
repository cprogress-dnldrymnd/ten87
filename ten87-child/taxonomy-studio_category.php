<?php
get_header();
?>
<?php if (have_posts()) { ?>
    <?php while (have_posts()) {
        the_post() ?>
<?php do_shortcode('[custom_template id=5791]'); ?>
<?php } ?>
<?php } ?>
<?php get_footer() ?>