<footer id="qodef-page-footer" <?php obsius_class_attribute( implode( ' ', apply_filters( 'obsius_filter_footer_holder_classes', array() ) ) ); ?> role="contentinfo">
    <?php
    echo obsius_get_template_part( 'footer', 'templates/footer-logo' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
    ?>
    <div class="qodef-page-footer-inner-holder">
        <?php
        // Hook to include additional content before page footer content
        do_action( 'obsius_action_before_page_footer_content' );

        // Include module content template
        echo apply_filters( 'obsius_filter_footer_content_template', obsius_get_template_part( 'footer', 'templates/footer-content' ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

        // Hook to include additional content after page footer content
        do_action( 'obsius_action_after_page_footer_content' );
        ?>
    </div>
</footer>
