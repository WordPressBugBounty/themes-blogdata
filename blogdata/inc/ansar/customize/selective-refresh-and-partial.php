<?php
function blogdata_selective_refresh( $wp_customize ) {
	if (isset($wp_customize->selective_refresh)) {
		$wp_customize->selective_refresh->add_partial('blogname', array(
            'selector'        => '.site-title a , .site-title-footer a',
            'render_callback' => 'blogdata_customize_partial_blogname',
        ));
        $wp_customize->selective_refresh->add_partial('blogdescription', array(
            'selector'        => '.site-description , .site-description-footer',
            'render_callback' => 'blogdata_customize_partial_blogdescription',
        ));
		$wp_customize->selective_refresh->add_partial('custom_logo', array(
			'selector'        => '.site-logo', 
			'render_callback' => 'custom_logo_selective_refresh'
		));	

        $wp_customize->selective_refresh->add_partial('blogdata_social_icons', array(
            'selector'        => 'footer .bs-social ',
        ));

        $wp_customize->selective_refresh->add_partial('blogdata_scrollup_enable', array(
            'selector'        => '.bs_upscr',
        ));

        $wp_customize->selective_refresh->add_partial('you_missed_title', array(
            'selector'          => '.missed .bs-widget-title',
            'render_callback'   => 'blogdata_customize_partial_you_missed_title',
        ));

        $wp_customize->selective_refresh->add_partial('sidebar_menu', array(
            'selector'        => '.navbar-wp [data-bs-toggle=offcanvas]',
            'render_callback' => 'blogdata_customize_partial_sidebar_menu',
        ));
        $wp_customize->selective_refresh->add_partial('blogdata_related_post_title', array(
            'selector'        => '.bs-related-post-info .mb-3 .title',
            'render_callback' => 'blogdata_customize_partial_blogdata_related_post_title',
        ));

        $wp_customize->selective_refresh->add_partial('blogdata_menu_search', array(
            'selector'        => '.desk-header .right-nav a',
            'render_callback' => 'blogdata_customize_partial_blogdata_menu_search',
        ));

        $wp_customize->selective_refresh->add_partial('subs_news_title', array(
            'selector'        => '.subscribe-btn span',
            'render_callback' => 'blogdata_customize_partial_subs_news_title',
        ));

        $wp_customize->selective_refresh->add_partial('blogdata_lite_dark_switcher', array(
            'selector'        => '.switch .slider',    
        ));

        $wp_customize->selective_refresh->add_partial('single_post_meta', array(
            'selector'        => '.bs-blog-post .bs-header .bs-blog-meta ',
        )); 
        $wp_customize->selective_refresh->add_partial('blogdata_drop_caps_enable', array(
            'selector'        => '.content-right .bs-blog-post .bs-blog-meta', 
        ));   
        $wp_customize->selective_refresh->add_partial('hide_copyright', array(
            'selector'        => '.bs-footer-copyright .container', 
        ));
        $wp_customize->selective_refresh->add_partial('main_banner_section_background_image', array(
            'selector'        => '.homemain .bs-blog-post.three .bs-blog-meta', 
        ));
        $wp_customize->selective_refresh->add_partial('blogdata_archive_page_layout', array(
            'selector'        => '.index-class .row, .archive-class > .container > .row', 
            'render_callback' => 'blogdata_customize_partial_archive_page'
        ));    
        $wp_customize->selective_refresh->add_partial('blogdata_single_page_layout', array(
            'selector'        => '.single-class .row', 
            'render_callback' => 'blogdata_customize_partial_single_page'
        ));    
        $wp_customize->selective_refresh->add_partial('blogdata_page_layout', array(
            'selector'        => '.page-class > .container > .row', 
            'render_callback' => 'blogdata_customize_partial_page'
        ));
        $wp_customize->selective_refresh->add_partial('blogdata_404_title', array(
            'selector'        => '.bs-error-404 .subtitle', 
            'render_callback' => 'blogdata_customize_partial_404_page_title'
        ));
        $wp_customize->selective_refresh->add_partial('blogdata_404_desc', array(
            'selector'        => '.bs-error-404 .description', 
            'render_callback' => 'blogdata_customize_partial_404_page_desc'
        ));
        $wp_customize->selective_refresh->add_partial('blogdata_404_btn_title', array(
            'selector'        => '.bs-error-404 .btn-theme', 
            'render_callback' => 'blogdata_customize_partial_404_page_btn'
        ));
	}
}
add_action( 'customize_register', 'blogdata_selective_refresh' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function blogdata_customize_partial_blogname() {
	bloginfo('name');
}

function blogdata_customize_partial_blogdescription() {
	bloginfo('description');
}

function custom_logo_selective_refresh() {
	if( get_theme_mod( 'custom_logo' ) === "" ) return;
	echo '<div id="site-logo">'.the_custom_logo().'</div>';
}

function blogdata_customize_partial_footer_social_icon_enable() {
    return get_theme_mod( 'blogdata_social_icons' ); 
}

function blogdata_customize_partial_blogdata_related_post_title() {
    return get_theme_mod( 'blogdata_related_post_title' ); 
}

function blogdata_customize_partial_subs_news_title() {
    return get_theme_mod( 'subs_news_title' ); 
}

function blogdata_customize_partial_you_missed_title() {
	if( get_theme_mod( 'you_missed_title' ) === "" ) return;
	echo '<h2 class="title">'.get_theme_mod( 'you_missed_title' ).'</h2>';
}

function blogdata_customize_partial_sidebar_menu() {
    return get_theme_mod( 'sidebar_menu' ); 
}

function blogdata_customize_partial_blogdata_menu_subscriber() {
    return get_theme_mod( 'blogdata_menu_subscriber' ); 
}

function blogdata_customize_partial_404_page_title() {
    return get_theme_mod( 'blogdata_404_title' ); 
}

function blogdata_customize_partial_404_page_desc() {
    return get_theme_mod( 'blogdata_404_desc' ); 
}

function blogdata_customize_partial_404_page_btn() {
    return get_theme_mod( 'blogdata_404_btn_title' ); 
}

function blogdata_customize_partial_archive_page() { 
    do_action('blogdata_action_main_content_layouts'); 
}

function blogdata_customize_partial_single_page() {
    do_action('blogdata_action_single_main_content_layouts');
}

function blogdata_customize_partial_page() {
    get_template_part('sections/page','data'); 
}