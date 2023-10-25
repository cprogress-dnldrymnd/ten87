<div class="cta-bar">
    <div class="container">
        <div class="row">
            <?php
            if ( ! empty( $settings['cta_url']['url'] ) ) {
                $this->add_link_attributes( 'cta_url', $settings['cta_url'] );
            }
            if ($settings['cta_url']['url']) {
                echo '<a' . $this->get_render_attribute_string('cta_url');
            }
            ?>
            <?php if ($settings['cta_text']) { ?>
                <h2><?= $settings['cta_text'] ?></h2>
            <?php } ?>
            <div class="icon">

            </div>
        </div>
    </div>
</div>