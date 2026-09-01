<?php
$blogdata_default = blogdata_get_default_theme_options();

$wp_customize->get_control( 'blogname' )->section = 'blogdata_site_title_section';
$wp_customize->get_control( 'display_header_text' )->section = 'blogdata_site_title_section';
$wp_customize->get_control( 'display_header_text' )->label = esc_html__( 'Display Site Title', 'blogdata' );
$wp_customize->get_control( 'blogdescription' )->section = 'blogdata_site_title_section';

Blogdata_Customizer_Control::add_field( 
	array(
		'type'     => 'blogdata-range', 
        'settings'  => 'site_title_font_size',
        'label' => esc_html__('Site Title Size', 'blogdata'),
		'section'  => 'blogdata_site_title_section',
        'transport'         => 'postMessage',
        'media_query'   => true,
        'input_attr'    => array(
            'mobile'  => array('min' => 0,'max' => 100,'step' => 1,'default_value' => 30,),
            'tablet'  => array('min' => 0,'max' => 110,'step' => 1,'default_value' => 35,),
            'desktop' => array('min' => 0,'max' => 120,'step' => 1,'default_value' => 40,),
        ),
    ),
);
Blogdata_Customizer_Control::add_field( 
    array(
        'type'              => 'checkbox', 
        'settings'          => 'display_header_tagline',
        'label'             => esc_html__('Display Tagline', 'blogdata'),
        'section'           => 'blogdata_site_title_section',
        'transport'         => 'postMessage',
        'priority'          => 100,
        'default'           => false,
        'sanitize_callback' => 'blogdata_sanitize_checkbox',
    )
);