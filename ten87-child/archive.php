<?php get_header() ?>
<section class="archive-section">
    <div class="elementor-element elementor-element-d906c2c elementor-widget elementor-widget-obsius_core_team_list" data-id="d906c2c" data-element_type="widget" id="our-community" data-widget_type="obsius_core_team_list.default">
        <div class="elementor-widget-container">
            <div class="qodef-shortcode qodef-m  qodef-team-list qodef-item-layout--info-below qodef-grid qodef-layout--columns  qodef-gutter--normal qodef-col-num--4 qodef-item-layout--info-below qodef-pagination--on qodef-pagination-type--infinite-scroll qodef-responsive--custom qodef-col-num--1440--4 qodef-col-num--1366--4 qodef-col-num--1024--2 qodef-col-num--768--2 qodef-col-num--680--1 qodef-col-num--480--1">
                <div class="qodef-grid-inner clear">
                    <?php $count = 0; ?>
                    <?php while (have_posts()) { ?>
                        <?php
                        the_post();
                        $has_readmore = carbon_get_post_meta(get_the_ID(), 'has_readmore')
                        ?>

                        <div class="qodef-e qodef-grid-item  post-<?php the_ID() ?> team type-team status-publish has-post-thumbnail hentry post-counter-<?= $count ?>" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="<?= 200 * $count ?>">
                            <div class="qodef-e-inner">
                                <div class="qodef-e-image">
                                    <div class="qodef-e-media-image">
                                        <img fetchpriority="high" decoding="async" width="1080" height="1080" src="<?= get_the_post_thumbnail_url(get_the_ID(), 'large') ?>" class="attachment-full size-full wp-post-image" alt="">
                                    </div>
                                </div>
                                <div class="qodef-e-content">
                                    <h5 itemprop="name" class="qodef-e-title entry-title">
                                        <?php the_title() ?>
                                    </h5>
                                    <div itemprop="description" class="qodef-e-excerpt">
                                        <?php the_content() ?>
                                    </div>
                                    <p>
                                        <button class="modal-trigger <?= $has_readmore ? 'has-readmore' : '' ?>" post_id="<?php the_ID() ?>">Read More </button>
                                    </p>

                                </div>
                            </div>
                        </div>

                        <?php $count++ ?>
                        <?php
                        if ($count % 4 == 0) {
                            $count = 0;
                        }
                        ?>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php get_footer() ?>

<script>
    AOS.init();
</script>