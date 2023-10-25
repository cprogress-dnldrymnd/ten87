<?php
get_header();
?>
<?= do_shortcode('[custom_template post_id=5791]'); ?>
<?php if (have_posts()) { ?>
    <?php while (have_posts()) {
        the_post() ?>

<?php } ?>
<?php } ?>
<?php get_footer() ?>