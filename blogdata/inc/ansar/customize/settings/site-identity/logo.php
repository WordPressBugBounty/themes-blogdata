<?php
$blogdata_default = blogdata_get_default_theme_options();

//Site Logo Width    
Blogdata_Customizer_Control::add_field( 
	array(
		'type'     => 'blogdata-range', 
        'settings'  => 'side_main_logo_width',
        'label' => esc_html__('Logo Width', 'blogdata'),
		'section'  => 'title_tagline',
        'transport'         => 'postMessage',
        'media_query'   => true,
        'input_attr'    => array(
            'mobile'  => array('min' => 0,'max' => 300,'step' => 1,'default_value' => 150,),
            'tablet'  => array('min' => 0,'max' => 350,'step' => 1,'default_value' => 200,),
            'desktop' => array('min' => 0,'max' => 400,'step' => 1,'default_value' => 250,),
        ),
    ),
);