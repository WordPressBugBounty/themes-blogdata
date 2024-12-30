<?php
/**
 * The template for displaying search results pages.
 *
 * @package BlogData
 */
get_header(); ?>
<!--==================== main content section ====================-->
<main id="content" class="search-class content">
    <!--container-->
    <div class="container">
    <!--row-->
        <div class="row">
            <!--==================== breadcrumb section ====================-->
            <?php do_action('blogdata_breadcrumb_content');
            get_template_part('sections/content','search'); ?>
            <aside class="col-lg-4 sidebar-right">
                <?php get_sidebar();?>
            </aside>
        </div><!--/row-->
    </div><!--/container-->
</div>
<?php
get_footer();