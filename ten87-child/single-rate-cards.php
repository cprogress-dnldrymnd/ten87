<?php get_header() ?>
<?php while (have_posts()) { ?>
    <?php
    the_post();
    ?>
    <section class="single-rate-cards">
        <div class="container">
            <div class="featured-image">
                <?php the_post_thumbnail('large'); ?>
            </div>
            <div class="the-content">
                <?php the_content() ?>
            </div>
        </div>
    </section>
<?php } ?>
<?php get_footer() ?>