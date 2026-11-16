<?php
add_action('admin_enqueue_scripts','blogdata_author_widget_scripts');

function blogdata_author_widget_scripts() {    

    wp_enqueue_media();

    wp_enqueue_script('news_author_widget_script', get_template_directory_uri() . '/js/widget-image.js', false, '1.0', true);

}
class blogdata_author_info extends WP_Widget {  



    public function __construct() {
        parent::__construct(
            'blogdata-author-widget',
            __( 'AR: Author Info', 'blogdata' )
        );
    }

    function widget($args, $instance) {

        extract($args);

        echo '<!-- Start Author Widget -->' . $before_widget;

        $blogdata_btnone_target = !empty($instance['open_btnone_new_window']) ? '_blank' : '_self';
        $title = !empty($instance['title']) ? apply_filters( 'widget_title', $instance['title'] ) : '';

        ?>
        
        <div class="blogdata-author-widget">
            <?php if (!empty($instance['title'])){ ?>
            <!-- bs-sec-title -->
            <div class="bs-widget-title one">
				<h4 class="title"><?php echo esc_html($title) ?></h4>
			</div> 
            <!-- // bs-sec-title -->
            <?php } ?>
            <div class="bs-author"> 
                <?php if( !empty($instance['image_uri']) ){ ?> 
                    <img class="rounded-circle" src="<?php echo esc_url( $instance['image_uri'] ); ?>" alt="<?php echo esc_attr( apply_filters( 'widget_title', $instance['name'] ) ); ?>" />
                <?php }
                if (!empty($instance['name'])) {
                    echo '<h4 class="name">'. esc_html($instance['name']).'</h4>';
                } if (!empty($instance['desc'])) {
                    echo '<p class="description">'. wp_kses_post($instance['desc']).'</p>';
                } 
                if( !empty($instance['facebook']) || !empty($instance['twt']) || !empty($instance['insta']) || !empty($instance['youtube']) || !empty($instance['lnk']) ) { ?>
                    <ul class="bs-social">
                      <?php
                        $social_links = [
                            'facebook' => 'fab fa-facebook',
                            'twt'      => 'fab fa-x-twitter',
                            'insta'    => 'fab fa-instagram',
                            'youtube'  => 'fab fa-youtube',
                        ];
                        foreach ($social_links as $key => $icon) {
                            if (!empty($instance[$key])) {
                                ?>
                                <li>
                                    <a class="<?php echo esc_attr($key); ?>" href="<?php echo esc_url($instance[$key]); ?>" target="<?php echo esc_attr($blogdata_btnone_target); ?>">
                                        <i class="<?php echo esc_attr($icon); ?>"></i>
                                    </a>
                                </li>
                            <?php 
                            }
                        }
                        ?>
                    </ul>
                <?php } ?>
            </div>
        </div>
        <?php echo $after_widget . '<!-- End Author Widget -->';

    }
    function update($new_instance, $old_instance) {

        $instance = array();

        $instance['title'] = !empty($new_instance['title']) ? sanitize_text_field($new_instance['title']) : '';
        $instance['name'] = !empty($new_instance['name']) ? sanitize_text_field($new_instance['name']) : '';
        $instance['desc'] = !empty($new_instance['desc']) ? sanitize_textarea_field($new_instance['desc']) : '';
        $instance['image_uri'] = !empty($new_instance['image_uri']) ? esc_url_raw($new_instance['image_uri']) : '';
        $instance['open_btnone_new_window'] = !empty($new_instance['open_btnone_new_window']) ? 'on' : '';

        $social_platforms = ['facebook', 'twt', 'insta', 'youtube'];
        foreach ($social_platforms as $platform) {
            $instance[$platform] = !empty($new_instance[$platform]) ? esc_url_raw($new_instance[$platform]) : '';
        }
        return $instance;
    }

    function form($instance) {
        $defaults = [
            'title' => 'Author Details',
            'name' => '',
            'desc' => '',
            'image_uri' => '',
            'open_btnone_new_window' => '',
            'facebook' => '',
            'twt' => '',
            'insta' => '',
            'youtube' => '',
        ];
        $instance = wp_parse_args((array) $instance, $defaults);
        ?>
        <p>
          <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title','blogdata'); ?></label> 
          <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($instance['title']); ?>" />
        </p>
        <p class="author-image-wrap">
            <label for="<?php echo esc_attr($this->get_field_id('image_uri')); ?>"><?php _e('Author Image', 'blogdata'); ?></label><br/>
            <img 
                class="custom_media_image_team" 
                src="<?php echo esc_url($instance['image_uri']); ?>" 
                style="max-width:100px; margin-bottom:5px; <?php echo empty($instance['image_uri']) ? 'display:none;' : 'display:block;'; ?>" 
                alt="<?php esc_attr_e('Uploaded image', 'blogdata'); ?>" 
            />
            <input 
                type="text" 
                class="widefat custom_media_url_team" 
                style="margin-bottom: 10px;" 
                name="<?php echo esc_attr($this->get_field_name('image_uri')); ?>" 
                id="<?php echo esc_attr($this->get_field_id('image_uri')); ?>" 
                value="<?php echo esc_attr($instance['image_uri']); ?>" 
            />
            <button 
                type="button" 
                class="button button-primary custom_media_button_team">
                <?php esc_html_e('Upload Image', 'blogdata'); ?>
            </button>
            <button 
                type="button" 
                class="button button-secondary custom_media_remove_team" 
                style="<?php echo empty($instance['image_uri']) ? 'display:none;' : 'display:inline-block;'; ?>">
                <?php esc_html_e('Remove', 'blogdata'); ?>
            </button>
        </p>
        <p>
          <label for="<?php echo $this->get_field_id( 'name' ); ?>"><?php _e( 'Name','blogdata' ); ?></label> 
          <input class="widefat" id="<?php echo $this->get_field_id( 'name' ); ?>" name="<?php echo $this->get_field_name( 'name' ); ?>" type="text" value="<?php echo esc_attr( $instance['name'] ); ?>" />
        </p>
        <p>
          <label for="<?php echo $this->get_field_id( 'desc' ); ?>"><?php _e( 'Description','blogdata' ); ?></label>
          <textarea class="widefat" id="<?php echo $this->get_field_id('desc'); ?>" name="<?php echo $this->get_field_name('desc'); ?>"><?php echo esc_textarea($instance['desc']); ?></textarea>
        </p>
        <table>
            <?php
            $social_platforms = [
                'facebook' => __('Facebook Link', 'blogdata'),
                'twt'      => __('X Link', 'blogdata'),
                'insta'    => __('Instagram Link', 'blogdata'),
                'youtube'  => __('YouTube Link', 'blogdata'),
            ];

            foreach ($social_platforms as $key => $label) {
                ?>
                <tr>
                    <td>
                        <label for="<?php echo $this->get_field_id($key); ?>"><?php echo $label; ?></label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="text" class="widefat" id="<?php echo $this->get_field_id($key); ?>" name="<?php echo $this->get_field_name($key); ?>" value="<?php echo esc_attr($instance[$key]); ?>" />
                    </td>
                </tr>
                <?php
            }
            ?>
        </table>
        <p>
            <input type="checkbox" id="<?php echo $this->get_field_id('open_btnone_new_window'); ?>" name="<?php echo $this->get_field_name('open_btnone_new_window'); ?>" <?php checked($instance['open_btnone_new_window'], 'on'); ?> />
            <label for="<?php echo $this->get_field_id('open_btnone_new_window'); ?>"><?php _e('Open links in new window', 'blogdata'); ?></label>
        </p>
    <?php
    }
}