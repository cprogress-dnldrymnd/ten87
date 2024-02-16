<?php get_header() ?>
<div>
    <?php
    $client = new \Storyblok\Client('YOUR_OAUTH_TOKEN');

    $client->get('cdn/stories', [
        "token" =>  "Z5R6TMf4M0FDuypDqcwQIwtt"
    ])->getBody();
    ?>
</div>
<?php get_footer() ?>