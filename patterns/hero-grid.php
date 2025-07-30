<?php
/**
 * Title: Hero Grid
 * Slug: minimal-news/hero-grid
 * Categories: minimal-news
 * Keywords: hero, grid, featured, posts
 */
?>

<!-- wp:group {"align":"wide","style":{"spacing":{"margin":{"bottom":"3rem"}}}} -->
<div class="wp-block-group alignwide" style="margin-bottom:3rem">
    <!-- wp:columns {"style":{"spacing":{"blockGap":"2rem"}}} -->
    <div class="wp-block-columns">
        <!-- wp:column {"width":"60%"} -->
        <div class="wp-block-column" style="flex-basis:60%">
            <!-- wp:query {"queryId":8,"query":{"perPage":1,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false},"displayLayout":{"type":"list","columns":3}} -->
            <div class="wp-block-query">
                <!-- wp:post-template -->
                <!-- wp:post-featured-image {"isLink":true,"style":{"spacing":{"margin":{"bottom":"1rem"}}}} /-->
                <!-- wp:post-title {"isLink":true,"style":{"typography":{"fontSize":"2rem","fontWeight":"700"}}} /-->
                <!-- wp:post-excerpt {"moreText":"Read More","style":{"spacing":{"margin":{"top":"1rem"}}}} /-->
                <!-- /wp:post-template -->
            </div>
            <!-- /wp:query -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"width":"40%"} -->
        <div class="wp-block-column" style="flex-basis:40%">
            <!-- wp:query {"queryId":9,"query":{"perPage":2,"pages":0,"offset":1,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false},"displayLayout":{"type":"list","columns":3}} -->
            <div class="wp-block-query">
                <!-- wp:post-template -->
                <!-- wp:post-featured-image {"isLink":true,"style":{"spacing":{"margin":{"bottom":"0.5rem"}}}} /-->
                <!-- wp:post-title {"isLink":true,"level":3,"style":{"typography":{"fontSize":"1.25rem","fontWeight":"600"}}} /-->
                <!-- /wp:post-template -->
            </div>
            <!-- /wp:query -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->
