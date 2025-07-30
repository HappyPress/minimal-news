<?php
/**
 * Title: Dark Carousel
 * Slug: minimal-news/dark-carousel
 * Categories: minimal-news
 * Keywords: carousel, dark, featured, video
 */
?>

<!-- wp:group {"align":"wide","style":{"spacing":{"margin":{"bottom":"3rem","padding":{"top":"2rem","bottom":"2rem"}}},"backgroundColor":"black"},"backgroundColor":"black","textColor":"white"} -->
<div class="wp-block-group alignwide has-white-color has-black-background-color has-text-color has-background" style="margin-bottom:3rem;padding-top:2rem;padding-bottom:2rem">
    <!-- wp:heading {"level":2,"style":{"spacing":{"margin":{"bottom":"2rem"}}}} -->
    <h2 class="wp-block-heading" style="margin-bottom:2rem">Watch Next</h2>
    <!-- /wp:heading -->
    
    <!-- wp:query {"queryId":10,"query":{"perPage":4,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false},"displayLayout":{"type":"grid","columns":4}} -->
    <div class="wp-block-query">
        <!-- wp:post-template -->
        <!-- wp:group {"style":{"spacing":{"padding":{"top":"1rem","bottom":"1rem","left":"1rem","right":"1rem"}},"border":{"radius":"8px"}},"backgroundColor":"black","className":"video-card"} -->
        <div class="wp-block-group has-black-background-color has-background video-card" style="border-radius:8px;padding-top:1rem;padding-right:1rem;padding-bottom:1rem;padding-left:1rem">
            <!-- wp:post-featured-image {"isLink":true,"style":{"spacing":{"margin":{"bottom":"1rem"}}}} /-->
            <!-- wp:post-title {"isLink":true,"level":4,"style":{"typography":{"fontSize":"1rem","fontWeight":"600"}}} /-->
        </div>
        <!-- /wp:group -->
        <!-- /wp:post-template -->
    </div>
    <!-- /wp:query -->
</div>
<!-- /wp:group -->
