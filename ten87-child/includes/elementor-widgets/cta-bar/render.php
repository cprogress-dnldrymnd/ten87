<div class="cta-bar">
    <div class="container">
        <?php
        if (!empty($settings['cta_url']['url'])) {
            $this->add_link_attributes('cta_url', $settings['cta_url']);
        }
        if ($settings['cta_url']) {
            echo '<a ' . $this->get_render_attribute_string('cta_url') . '>';
        }
        ?>
        <div class="row">
            <?php if ($settings['cta_text']) { ?>
                <div class="heading">
                    <h2><?= $settings['cta_text'] ?></h2>
                </div>
            <?php } ?>
            <div class="icon">
                <img src="<?= $settings['icon']['value']['url'] ?>" alt="">
                <img src="<?= $settings['icon']['value']['url'] ?>" alt="">
            </div>
        </div>
        <?php
        if ($settings['cta_url']) {
            echo '</a>';
        }
        ?>
    </div>
</div>