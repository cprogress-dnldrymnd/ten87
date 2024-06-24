<?php get_header() ?>
<?php while (have_posts()) { ?>
    <?php
    the_post();
    $media = get__post_meta('media');
    ?>
    <section class="single-rate-cards">
        <?php if ($media) { ?>
            <?php
            $mime_type = get_post_mime_type($media);
            ?>
            <div class="media">
                <?php if (str_contains($mime_type, 'image')) { ?>
                    <img src="<?= wp_get_attachment_image_url($media, 'large') ?>">
                <?php } else if (str_contains($mime_type, 'video')) { ?>
                    <video src="<?= wp_get_attachment_url($media) ?>" controls autoplay muted></video>
                <?php } ?>
            </div>
        <?php } ?>
        <div class="container">
            <div class="row">
                <div class="col featured-image">
                    <?php the_post_thumbnail('large'); ?>
                </div>
                <div class="col the-content">
                    <?php the_content() ?>
                </div>
            </div>

        </div>
    </section>
<?php } ?>
<?php get_footer() ?>