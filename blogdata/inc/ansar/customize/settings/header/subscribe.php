<?php

$blogdata_default = blogdata_get_default_theme_options();

// Subscribe Section Heading 
Blogdata_Customizer_Control::add_field(
	array(
		'type'      => 'hidden', 
        'settings'  => 'subscriber_btn_settings',
        'label'     => esc_html__('Subscribe', 'blogdata'),
		'section'   => 'header_subscribe_section',
	)
);
// Hide/Show Subscribe
Blogdata_Customizer_Control::add_field( 
	array(
		'type'     => 'toggle', 
        'settings'  => 'blogdata_menu_subscriber',
        'label' => esc_html__('Hide/Show', 'blogdata'),
		'section'  => 'header_subscribe_section',
        'default' => true,
        'sanitize_callback' => 'blogdata_sanitize_checkbox',
	)
);
// Subscribe Icon Layout
Blogdata_Customizer_Control::add_field(
	array(
		'type'     => 'radio-image',
		'settings' => 'subsc_icon_layout',
        'label' => esc_html__('Icon', 'blogdata'),
		'section'  => 'header_subscribe_section',
		'default'  => 'play',
        'choices'       => array(
            'bell' => get_template_directory_uri() . '/images/subs1.png',
            'play'    => get_template_directory_uri() . '/images/subs3.png', 
        ),
        'active_callback'   => 'blogdata_menu_subscriber_section_status',
        'sanitize_callback' => 'blogdata_sanitize_radio',
	)
);
Blogdata_Customizer_Control::add_field( 
	array(
		'type'     => 'text', 
        'settings'  => 'subs_news_title',
        'label' => esc_html__('Title', 'blogdata'),
		'section'  => 'header_subscribe_section',
        'default' => esc_html__('Subscribe','blogdata'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
        'active_callback'   => 'blogdata_menu_subscriber_section_status',
	)
);
// Subscribe Link
Blogdata_Customizer_Control::add_field( 
	array(
		'type'     => 'text', 
        'settings'  => 'blogdata_subsc_link',
        'label' => esc_html__('Link', 'blogdata'),
		'section'  => 'header_subscribe_section',
        'default' => '#',
        'sanitize_callback' => 'esc_url_raw',
        'active_callback'   => 'blogdata_menu_subscriber_section_status',
	)
);
// Subscribe Open in New Tab
Blogdata_Customizer_Control::add_field( 
	array(
		'type'     => 'toggle', 
        'settings'  => 'subsc_open_in_new',
        'label' => esc_html__('Open link in a new tab', 'blogdata'),
		'section'  => 'header_subscribe_section',
        'default' => true,
        'sanitize_callback' => 'blogdata_sanitize_checkbox',
        'active_callback'   => 'blogdata_menu_subscriber_section_status',
	)
);