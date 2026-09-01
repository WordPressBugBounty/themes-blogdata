<?php
$blogdata_default = blogdata_get_default_theme_options();

// Setting banner_advertisement_section. 
Blogdata_Customizer_Control::add_field( 
	array(
		'type'     => 'cropped_image', 
        'settings'  => 'banner_ad_image',
        'label' => esc_html__('Banner Advertisement', 'blogdata'),
        'description' => sprintf(esc_html__('Recommended Size %1$s px X %2$s px', 'blogdata'), 930, 100),
        'section' => 'header_advert_section',
        'default' => $blogdata_default['banner_ad_image'],
        'width' => 930,
        'height' => 100,
        'flex_width' => true,
        'flex_height' => true,
        'sanitize_callback' => 'absint',
	)
);
/*banner_advertisement_section_url*/
Blogdata_Customizer_Control::add_field( 
	array(
		'type'     => 'text', 
        'settings'  => 'banner_ad_url',
        'label' => esc_html__('Link', 'blogdata'),
		'section'  => 'header_advert_section',
        'priority' => 15,
        'default' => '#',
        'sanitize_callback' => 'esc_url_raw',
	)
);

Blogdata_Customizer_Control::add_field( 
	array(
		'type'     => 'toggle', 
        'settings'  => 'banner_open_on_new_tab',
        'label' => esc_html__('Open link in a new tab', 'blogdata'),
		'section'  => 'header_advert_section',
        'priority' => 16,
        'default' => true,
        'sanitize_callback' => 'blogdata_sanitize_checkbox',
	)
);