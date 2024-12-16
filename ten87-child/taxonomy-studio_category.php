<?php
get_header();
$args = array(
    'numberposts' => -1,
    'post_type' => 'studios',
    'orderby'    => 'menu_order',
    'order' => 'asc',
    'tax_query' => array(
        array(
            'taxonomy' => 'studio_category',
            'field' => 'term_id',
            'terms' => get_queried_object()->term_id,
        ),
    )
);

$posts = get_posts($args);

?>
<div class="post-slider-holder">
    <div class="swiper mySwiperPostSlider">
        <div class="swiper-wrapper">
            <?php foreach ($posts as $post) { ?>
                <?php
                $args = array(
                    'bg' => get_the_post_thumbnail_url($post->ID, 'full'),
                    'title' => $post->post_title,
                    'post_excerpt' => $post->post_excerpt,
                    'post_id' => $post->ID
                );

                get_template_part('template-parts/studio/studio-swiper-slide', 'null', $args);
                ?>
            <?php } ?>
        </div>
        <?= swiper_navigation() ?>
    </div>
</div>

<script>
    jQuery(document).ready(function() {
        jQuery('.qodef-section-title h1').addClass('animate');
        setTimeout(function() {
            jQuery('.qodef-section-title .qodef-section-title').addClass('animate');
        }, 300);
    });
</script>

<?php get_footer() ?>