<?php 
function blogdata_scripts() {

	wp_enqueue_style('all-css', BLOGDATA_THEME_URI .'css/all.css', array(), BLOGDATA_THEME_VERSION );

	wp_enqueue_style('dark', BLOGDATA_THEME_URI . 'css/colors/dark.css', array(), BLOGDATA_THEME_VERSION );

	wp_enqueue_style('core',  BLOGDATA_THEME_URI . 'css/core.css', array(), BLOGDATA_THEME_VERSION );
	
	wp_style_add_data('core', 'rtl', 'replace' );
	
	wp_enqueue_style('blogdata-style', get_stylesheet_uri(), array(), BLOGDATA_THEME_VERSION );
	
	wp_style_add_data('blogdata-style', 'rtl', 'replace' );
	
	wp_enqueue_style('wp-core', BLOGDATA_THEME_URI . 'css/wp-core.css', array(), BLOGDATA_THEME_VERSION );
	
	wp_enqueue_style('default', BLOGDATA_THEME_URI . 'css/colors/default.css', array(), BLOGDATA_THEME_VERSION );
	
	wp_enqueue_style('swiper-bundle-css', BLOGDATA_THEME_URI . 'css/swiper-bundle.css', array(), BLOGDATA_THEME_VERSION );
	
	wp_enqueue_style('menu-core-css', BLOGDATA_THEME_URI . 'css/sm-core-css.css', array(), BLOGDATA_THEME_VERSION );
	
	wp_enqueue_style('smartmenus', BLOGDATA_THEME_URI . 'css/sm-clean.css', array(), BLOGDATA_THEME_VERSION ); 
	
	if (class_exists('WooCommerce')) {
		wp_enqueue_style('woocommerce-css', BLOGDATA_THEME_URI . 'css/woo.css', array(), BLOGDATA_THEME_VERSION );
	}

	/* Js script */

	wp_enqueue_script( 'blogdata-navigation', BLOGDATA_THEME_URI . 'js/navigation.js', array('jquery'), BLOGDATA_THEME_VERSION );

	wp_enqueue_script('swiper-bundle', BLOGDATA_THEME_URI . 'js/swiper-bundle.js', array('jquery'), BLOGDATA_THEME_VERSION );

	wp_enqueue_script('sticky-js', BLOGDATA_THEME_URI . 'js/hc-sticky.js' , array('jquery'), BLOGDATA_THEME_VERSION );

	wp_enqueue_script('sticky-header-js', BLOGDATA_THEME_URI . 'js/jquery.sticky.js' , array('jquery'), BLOGDATA_THEME_VERSION );

	wp_enqueue_script('smartmenus-js', BLOGDATA_THEME_URI . 'js/jquery.smartmenus.js', array(), BLOGDATA_THEME_VERSION );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_enqueue_script('jquery-cookie', BLOGDATA_THEME_URI . 'js/jquery.cookie.min.js', array('jquery'), BLOGDATA_THEME_VERSION );

	blogdata_customize_options();
	
}
add_action('wp_enqueue_scripts', 'blogdata_scripts');

function blogdata_admin_enqueue( $hook ) {

	wp_enqueue_script( 'media-upload' );

	wp_enqueue_media();

	wp_enqueue_style( 'blogdata-admin-style', BLOGDATA_THEME_URI . 'css/admin-style.css', array(), BLOGDATA_THEME_VERSION );

}
add_action( 'admin_enqueue_scripts', 'blogdata_admin_enqueue' );

if ( ! function_exists( 'blogdata_admin_scripts' ) ) :
	function blogdata_admin_scripts() {
		wp_enqueue_script(
			'blogdata-admin-script',
			BLOGDATA_THEME_URI . 'inc/ansar/customizer-admin/js/admin-script.js',
			array( 'jquery' ), BLOGDATA_THEME_VERSION,
			'',
			true
		);
		wp_localize_script(
			'blogdata-admin-script',
			'blogdata_ajax_object',
			array(
				'ajax_url'      => admin_url( 'admin-ajax.php' ),
				'install_nonce' => wp_create_nonce( 'blogdata_install_plugin_nonce' ),
				'can_install'   => current_user_can( 'install_plugins' ),
			)
		);
		wp_enqueue_style('blogdata-admin-style-css', BLOGDATA_THEME_URI . 'css/customizer-controls.css', array(), BLOGDATA_THEME_VERSION );
	}
	endif;
	add_action( 'admin_enqueue_scripts', 'blogdata_admin_scripts' );


//Custom Color
function blogdata_custom_js() {

	wp_enqueue_script('blogdata_custom-js', BLOGDATA_THEME_URI . 'js/custom.js' , array('jquery'), BLOGDATA_THEME_VERSION );	
    
	wp_enqueue_script('blogdata-dark', BLOGDATA_THEME_URI . 'js/dark.js' , array('jquery'), BLOGDATA_THEME_VERSION );

	theme_options_color();

	theme_options_dark_color();
}
add_action('wp_footer','blogdata_custom_js');


/**
 * Fix skip link focus in IE11.
 *
 * This does not enqueue the script because it is tiny and because it is only for IE11,
 * thus it does not warrant having an entire dedicated blocking script being loaded.
 *
 * @link https://git.io/vWdr2
 */
function blogdata_skip_link_focus_fix() {
	// The following is minified via `terser --compress --mangle -- js/skip-link-focus-fix.js`.
	?>
	<script>
	/(trident|msie)/i.test(navigator.userAgent)&&document.getElementById&&window.addEventListener&&window.addEventListener("hashchange",function(){var t,e=location.hash.substring(1);/^[A-z0-9_-]+$/.test(e)&&(t=document.getElementById(e))&&(/^(?:a|select|input|button|textarea)$/i.test(t.tagName)||(t.tabIndex=-1),t.focus())},!1);
	</script>
	<?php
}
add_action( 'wp_print_footer_scripts', 'blogdata_skip_link_focus_fix' );

function blogdata_customizer_scripts() {
	
	wp_enqueue_style( 'blogdata-customizer-styles', BLOGDATA_THEME_URI . 'css/customizer-controls.css', array(), BLOGDATA_THEME_VERSION );

	wp_enqueue_style('blogdata-custom-controls-css', BLOGDATA_THEME_URI . 'inc/ansar/customize/css/customizer.css', array(), BLOGDATA_THEME_VERSION );
}
add_action( 'customize_controls_print_footer_scripts', 'blogdata_customizer_scripts' );