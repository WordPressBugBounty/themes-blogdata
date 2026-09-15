<?php
/**
 * Default theme options.
 *
 * @package BlogData
 */

if (!function_exists('blogdata_get_default_theme_options')):

/**
 * Get default theme options
 *
 * @since 1.0.0
 *
 * @return array Default theme options.
 */
function blogdata_get_default_theme_options() {

    $defaults = array();
    
    // Header options section

    $defaults['banner_ad_image'] = '';
    $defaults['banner_ad_url'] = '#';
    $defaults['banner_open_on_new_tab'] = true;

    // Frontpage Section.
    $defaults['show_main_banner_section'] = 1;
    $defaults['select_slider_news_category'] = 0;

    $defaults['select_trending_news_category'] = 0;

    $defaults['select_editor_news_category'] = 0;

    $defaults['main_banner_section_background_image']= '';
    $defaults['remove_header_image_overlay'] = 0;
    
    // Blog Post Options
    $defaults['blogdata_blog_post_category'] = true;
    $defaults['blogdata_enable_post_meta'] = true;
    $defaults['blogdata_blog_content'] = 'excerpt';

    // Single Post Options
    $defaults['blogdata_single_post_category'] = true;
    $defaults['blogdata_single_post_meta'] = true;
    $defaults['blogdata_single_post_image'] = true;
    $defaults['blogdata_enable_single_admin'] = true;
    $defaults['blogdata_enable_single_related'] = true;
    $defaults['blogdata_enable_single_comments'] = true;
    $defaults['blogdata_single_post_image'] = true;
    $defaults['blogdata_enable_single_related_category'] = true;
    $defaults['blogdata_enable_single_related_admin'] = true;
    $defaults['blogdata_enable_single_related_date'] = true;
    
    //layout options
    $defaults['blogdata_archive_page_layout'] = 'align-content-right';
    $defaults['global_hide_post_date_author_in_list'] = 1;
    $defaults['global_widget_excerpt_setting'] = 'trimmed-content';
    $defaults['global_date_display_setting'] = 'theme-date';

    // filter.
    $defaults = apply_filters('blogdata_filter_default_theme_options', $defaults);

    // You Missed Section.
    $defaults['you_missed_enable'] = true;
    $defaults['you_missed_title'] = __('You Missed', 'blogdata');

    $defaults['blogdata_footer_bg_img'] = '';

    // Copyright.
    $defaults['blogdata_footer_copyright'] = __('Copyright &copy; All rights reserved','blogdata');
    
    // Footer
    $defaults['blogdata_footer_copy_bg'] = '';
    $defaults['blogdata_footer_copy_text'] = '';
    
    // Typography Section.
    // Body
    $defaults['heading_fontfamily'] = 'Inter';
    $defaults['heading_fontweight'] =  '600';

    // Meus
    $defaults['blogdata_menu_fontfamily'] = 'Inter';

    // Body Background Color
    $defaults['body_background_color'] = blogdata_background_color();

	return $defaults;
}
endif;

if ( ! function_exists( 'blogdata_get_social_icon_default' ) ) {
    function blogdata_get_social_icon_default() {
        return apply_filters( 'blogdata_get_social_icon_default',
            json_encode(
                array(
                    array(
                        'icon_value' => 'fab fa-facebook',
                        'link'       => '#',
                        'id'         => 'customizer_repeater_header_social_001',
                    ),
                    array(
                        'icon_value' => 'fa-brands fa-x-twitter',
                        'link'       => '#',
                        'id'         => 'customizer_repeater_header_social_003',
                    ),
                    array(
                        'icon_value' => 'fab fa-instagram',
                        'link'       => '#',
                        'id'         => 'customizer_repeater_header_social_005',
                    ),
                    array(
                        'icon_value' => 'fab fa-youtube',
                        'link'       => '#',
                        'id'         => 'customizer_repeater_header_social_006',
                    ),
                    array(
                        'icon_value' => 'fab fa-telegram',
                        'link'       => '#',
                        'id'         => 'customizer_repeater_header_social_008',
                    ),
                )
            )
        );
    }
}
function blogdata_background_color() {
    $color = get_theme_mod(
        'background_color',
        get_theme_support( 'custom-background' )[0]['default-color'] ?? '#fff'
    );
    return $color;
}