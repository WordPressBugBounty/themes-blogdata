<?php
// Site Identity Panel
$wp_customize->add_panel( 'blogdata_site_identity_panel', array(
    'title' => __( 'Site Identity', 'blogdata' ),
    'priority' => 5,
));
    $wp_customize->add_section( 'title_tagline', array(
        'title' => __( 'Logo & Site Icon', 'blogdata' ),
        'panel' => 'blogdata_site_identity_panel',
    ));
    $wp_customize->add_section( 'blogdata_site_title_section', array(
        'title' => __( 'Site Title & Tagline', 'blogdata' ),
        'panel' => 'blogdata_site_identity_panel',
    ));

// Theme Header Panel
$wp_customize->add_panel('header_option_panel', array(
    'title' => __('Theme Header', 'blogdata'),
    'priority' => 6,
) );
$wp_customize->get_section('header_image')->panel = 'header_option_panel';
    $wp_customize->add_section( 'header_menu_sidebar_section' , array(
        'title' => __('Header Toggle Icon', 'blogdata'),
        'panel' => 'header_option_panel',
    ) );
    $wp_customize->add_section( 'header_search_section' , array(
        'title' => __('Search', 'blogdata'),
        'panel' => 'header_option_panel',
    ) );
    $wp_customize->add_section( 'header_dark_mode_section' , array(
        'title' => __('Dark and Light Mode Switcher', 'blogdata'),
        'panel' => 'header_option_panel',
    ) );
    $wp_customize->add_section( 'header_cart_section' , array(
        'title' => __('Shopping Cart', 'blogdata'),
        'panel' => 'header_option_panel',
    ) );
    $wp_customize->add_section( 'header_subscribe_section' , array(
        'title' => __('Subscribe Button', 'blogdata'),
        'panel' => 'header_option_panel',
    ) );
    $wp_customize->add_section( 'sticky_header' , array(
        'title' => __('Sticky Header', 'blogdata'),
        'panel' => 'header_option_panel',
    ) );
    $wp_customize->add_section( 'header_advert_section' , array(
        'title' => __('Banner Advertisement', 'blogdata'),
        'panel' => 'header_option_panel',
    )  );
// $wp_customize->get_section( 'header_image')->priority = 6;
