<?php get_header() ?>
<?php while (have_posts()) { ?>
    <?php
    the_post();
    $media = get__post_meta('media');
    ?>
    <section class="single-rate-cards">
        <div class="container">
            <div class="row">
                <div class="col featured-image">
                    <?php the_post_thumbnail('large'); ?>
                </div>
                <div class="col the-content">
                    <?php the_content() ?>
                </div>
            </div>
            <?php if ($media) { ?>
                <?php 
                $mime_type = get_post_mime_type($media);
                echo $mime_type;
                ?>
                <div class="media">
                    
                </div>
            <?php } ?>
        </div>
    </section>
<?php } ?>
<?php get_footer() ?>