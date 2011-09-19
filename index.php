<?php get_header(); ?>
<div id="contentWrapper" class="container">
    <div id="primaryContent">
        <?php 
            if (have_posts()) {
                get_template_part("content","loop");
            }
            else { 
        ?>
                <article>
                    <h1><?php _e('Nothing Found', 'twentyeleven'); ?></h1>
                    <div>
                        <p><?php _e('Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'twentyeleven'); ?></p>
                        <?php get_search_form(); ?>
                    </div>
                </article>
        <?php } ?>
    </div>
    <!-- End div primaryContent -->
    <aside>
        <?php get_sidebar(); ?>
    </aside>
</div>
<!-- End div contentWrapper -->
<?php get_footer(); ?>