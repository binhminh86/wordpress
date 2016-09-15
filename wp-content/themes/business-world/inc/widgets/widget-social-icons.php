<?php 
class Business_world_social extends WP_Widget {
    function __construct(){
    $widget_ops = array('description' => __('Social links', "business-world"));
    $control_ops = array('width' => '', 'height' => '');
    parent::__construct(false,$name='Social Links',$widget_ops,$control_ops);
  }
  /* Displays the Widget in the front-end */
    function widget($args, $instance) {
    extract($args);
    $title =  esc_html( $instance['title']);
    $description =  esc_html( $instance['description']);
    $width =  esc_html( $instance['width']);
    $show_facebook_icon = empty( $instance['show_facebook_icon'] ) ? '' : $instance['show_facebook_icon'];
    $show_twitter_icon = empty( $instance['show_twitter_icon'] ) ? '' : $instance['show_twitter_icon'];
    $facebook_url = empty( $instance['facebook_url'] ) ? '' : $instance['facebook_url'];
    $twitter_url = empty( $instance['twitter_url'] ) ? '' : $instance['twitter_url'];
    $show_rss_icon = empty( $instance['show_rss_icon'] ) ? '' : $instance['show_rss_icon'];
    $show_google_icon = empty( $instance['show_google_icon'] ) ? '' : $instance['show_google_icon'];
    $rss_url = empty( $instance['rss_url'] ) ? '' : $instance['rss_url'];
    $google_url = empty( $instance['google_url'] ) ? '' : $instance['google_url'];
    
    $show_linkedin_icon = empty( $instance['show_linkedin_icon'] ) ? '' : $instance['show_linkedin_icon'];
    $linkedin_url = empty( $instance['linkedin_url'] ) ? '' : $instance['linkedin_url'];
    $show_youtube_icon = empty( $instance['show_youtube_icon'] ) ? '' : $instance['show_youtube_icon'];
    $youtube_url = empty( $instance['youtube_url'] ) ? '' : $instance['youtube_url'];
    $show_instagram_icon = empty( $instance['show_instagram_icon'] ) ? '' : $instance['show_instagram_icon'];
    $instagram_url = empty( $instance['instagram_url'] ) ? '' : $instance['instagram_url'];

    $instances = array(
        'Facebook' =>array( $show_facebook_icon, $facebook_url, 'facebook' ),
        'Twitter'  =>array( $show_twitter_icon, $twitter_url, 'twitter' ),
        'Rss'      =>array( $show_rss_icon, $rss_url, 'rss' ),
        'Google+'  =>array( $show_google_icon, $google_url, 'google-plus' ),
        'LinkedIn'  =>array( $show_linkedin_icon, $linkedin_url, 'linkedin' ),
        'Youtube'  =>array( $show_youtube_icon, $youtube_url, 'youtube' ),
        'Instagram'  =>array( $show_instagram_icon, $instagram_url, 'instagram' ),
    );
    
    echo $before_widget;
    if ( $title )
      echo $before_title . $title . $after_title; ?>
  
       <div class="social-widg-cont" style="width:<?php echo (isset($width) && $width != 0)? $width."px" : "260px"; ?>">
          <div id="social_description">
            <?php echo htmlspecialchars_decode($description); ?>
          </div>
          <div class="social-widg-items">
          <?php foreach ($instances as $key => $value) {
            if( $value[0] != '' || $value[1] != "" ){ ?>
              <div class="social">
               <a href="<?php if( trim($value[1]) ) { echo esc_url($value[1]);} else { echo "javascript:;";}?>" target="_blank" title="<?php echo $key; ?>">
                   <div id="<?php echo $value[2]; ?>" class="socil"><i class="fa fa-<?php echo $value[2]; ?>"></i></div>  
               </a>
             </div>
          <?php 
            } 
          } ?>
          </div>              
      </div>              
    <?php echo $after_widget;     
  }
  /*Saves the settings. */
    function update($new_instance, $old_instance) {
    $instance = $old_instance;
    $instance['title'] = sanitize_text_field( $new_instance['title'] );
    $instance['description'] =  $new_instance['description'] ;    
    $instance['width'] =  $new_instance['width'] ;    
    $instance['show_facebook_icon'] = wp_filter_post_kses( addslashes($new_instance['show_facebook_icon']));
    $instance['show_twitter_icon'] = wp_filter_post_kses( addslashes($new_instance['show_twitter_icon']));
    $instance['facebook_url'] = wp_filter_post_kses( addslashes($new_instance['facebook_url']));
    $instance['twitter_url'] = wp_filter_post_kses( addslashes($new_instance['twitter_url']));
    $instance['show_rss_icon'] = wp_filter_post_kses( addslashes($new_instance['show_rss_icon']));
    $instance['show_google_icon'] = wp_filter_post_kses( addslashes($new_instance['show_google_icon']));
    $instance['rss_url'] = wp_filter_post_kses( addslashes($new_instance['rss_url']));
    $instance['google_url'] = wp_filter_post_kses( addslashes($new_instance['google_url']));
    
    $instance['show_linkedin_icon'] = wp_filter_post_kses( addslashes($new_instance['show_linkedin_icon']));
    $instance['linkedin_url'] = wp_filter_post_kses( addslashes($new_instance['linkedin_url']));
    $instance['show_youtube_icon'] = wp_filter_post_kses( addslashes($new_instance['show_youtube_icon']));
    $instance['youtube_url'] = wp_filter_post_kses( addslashes($new_instance['youtube_url']));
    $instance['show_instagram_icon'] = wp_filter_post_kses( addslashes($new_instance['show_instagram_icon']));
    $instance['instagram_url'] = wp_filter_post_kses( addslashes($new_instance['instagram_url']));

    return $instance;
  }
  /*Creates the form for the widget in the back-end. */
    function form($instance) {
    /* Defaults */
    $instance = extract(wp_parse_args( (array) $instance, array( 'title'=>'', 'show_facebook_icon'=>'','description'=>'', 'width'=>'260', 'show_twitter_icon'=>'', 'facebook_url'=>'', 'twitter_url' =>'','show_rss_icon'=>'', 'show_google_icon'=>'', 'rss_url'=>'', 'google_url' =>'', 'linkedin_url' =>'', 'youtube_url' =>'', 'instagram_url' =>'', 'show_linkedin_icon'=>'', 'show_youtube_icon'=>'', 'show_instagram_icon'=>'',) )); ?>
    
    <script type="text/javascript">
      function open_or_hide_param(cur_element) {
        if(cur_element.checked){
          jQuery(cur_element).parent().parent().find('.open_hide').show();
        }
        else {
          jQuery(cur_element).parent().parent().find('.open_hide').hide();
        }       
      }
      jQuery(document).ready(function() {
        jQuery('.with_input').each(function(){open_or_hide_param(this)})
      });
    </script> 
    <p>
      <label for="<?php echo $this->get_field_id('title'); ?>">Title:</label>
      <input class="widefat" id="<?php echo  $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
    </p>
    <div class="optiontitle">
      <p class="block open_hide">
        Enter your description.
        <textarea name="<?php echo  $this->get_field_name('description'); ?>" id="<?php echo  $this->get_field_id('description'); ?>"><?php echo esc_attr($description); ?></textarea>
      </p>
    </div>
    <div class="optiontitle">
      <p class="block open_hide">
        Enter width of widget.
        <input name="<?php echo  $this->get_field_name('width'); ?>" id="<?php echo  $this->get_field_id('width'); ?>" type="text" value="<?php echo stripslashes(esc_attr($width)); ?>">
      </p>
    </div>
    <div class="optiontitle">
      <p class="block margin">        
        <input type="checkbox" onclick="open_or_hide_param(this)" class="checkbox with_input" name="<?php echo  $this->get_field_name('show_facebook_icon'); ?>" id="<?php echo  $this->get_field_id('show_facebook_icon'); ?>" <?php checked($show_facebook_icon, "on"); ?> />               
        <label for="<?php echo $this->get_field_id('show_facebook_icon'); ?>"> Show Facebook Icon </label>    
      </p> 
      <p class="block open_hide">
        Enter your Facebook Profile URL below.
        <input name="<?php echo  $this->get_field_name('facebook_url'); ?>" id="<?php echo  $this->get_field_id('facebook_url'); ?>" type="text" value="<?php echo stripslashes(esc_attr($facebook_url)); ?>">
      </p>
    </div>
    <div class="optiontitle">
      <p class="block margin">        
        <input type="checkbox" onclick="open_or_hide_param(this)" class="checkbox with_input" name="<?php echo  $this->get_field_name('show_twitter_icon'); ?>" id="<?php echo  $this->get_field_id('show_twitter_icon'); ?>" <?php checked($show_twitter_icon, "on"); ?> />                
        <label for="<?php echo $this->get_field_id('show_twitter_icon'); ?>"> Show Twitter Icon </label>    
      </p> 
      <p class="block open_hide">
        Enter your Twitter Profile URL below.
        <input name="<?php echo  $this->get_field_name('twitter_url'); ?>" id="<?php echo  $this->get_field_id('twitter_url'); ?>" type="text" value="<?php echo stripslashes(esc_attr($twitter_url)); ?>">
      </p>
    </div>
    <div class="optiontitle">
      <p class="block margin">        
        <input type="checkbox" onclick="open_or_hide_param(this)" class="checkbox with_input" name="<?php echo  $this->get_field_name('show_rss_icon'); ?>" id="<?php echo  $this->get_field_id('show_rss_icon'); ?>" <?php checked($show_rss_icon, "on"); ?> />                
        <label for="<?php echo $this->get_field_id('show_rss_icon'); ?>"> Show RSS Icon </label>    
      </p> 
      <p class="block open_hide">
        Enter your RSS URL below.
        <input name="<?php echo  $this->get_field_name('rss_url'); ?>" id="<?php echo  $this->get_field_id('rss_url'); ?>" type="text" value="<?php echo stripslashes(esc_attr($rss_url)); ?>">
      </p>
    </div>
    <div class="optiontitle">
      <p class="block margin">        
        <input type="checkbox" onclick="open_or_hide_param(this)" class="checkbox with_input" name="<?php echo  $this->get_field_name('show_google_icon'); ?>" id="<?php echo  $this->get_field_id('show_google_icon'); ?>" <?php checked($show_google_icon, "on"); ?> />               
        <label for="<?php echo $this->get_field_id('show_google_icon'); ?>"> Show Google+ Icon </label>   
      </p> 
      <p class="block open_hide">
        Enter your Google+ Profile URL below.
        <input name="<?php echo  $this->get_field_name('google_url'); ?>" id="<?php echo  $this->get_field_id('google_url'); ?>" type="text" value="<?php echo stripslashes(esc_attr($google_url)); ?>">
      </p>
    </div>
    <div class="optiontitle">
      <p class="block margin">        
        <input type="checkbox" onclick="open_or_hide_param(this)" class="checkbox with_input" name="<?php echo  $this->get_field_name('show_linkedin_icon'); ?>" id="<?php echo  $this->get_field_id('show_linkedin_icon'); ?>" <?php checked($show_linkedin_icon, "on"); ?> />                
        <label for="<?php echo $this->get_field_id('show_linkedin_icon'); ?>"> Show Linkedin Icon </label>    
      </p> 
      <p class="block open_hide">
        Enter your Linkedin Profile URL below.
        <input name="<?php echo  $this->get_field_name('linkedin_url'); ?>" id="<?php echo  $this->get_field_id('linkedin_url'); ?>" type="text" value="<?php echo stripslashes(esc_attr($linkedin_url)); ?>">
      </p>
    </div>
    <div class="optiontitle">
      <p class="block margin">        
        <input type="checkbox" onclick="open_or_hide_param(this)" class="checkbox with_input" name="<?php echo  $this->get_field_name('show_youtube_icon'); ?>" id="<?php echo  $this->get_field_id('show_youtube_icon'); ?>" <?php checked($show_youtube_icon, "on"); ?> />                
        <label for="<?php echo $this->get_field_id('show_youtube_icon'); ?>"> Show Youtube Icon </label>    
      </p> 
      <p class="block open_hide">
        Enter your Youtube Profile URL below.
        <input name="<?php echo  $this->get_field_name('youtube_url'); ?>" id="<?php echo  $this->get_field_id('youtube_url'); ?>" type="text" value="<?php echo stripslashes(esc_attr($youtube_url)); ?>">
      </p>
    </div>
    <div class="optiontitle">
      <p class="block margin">        
        <input type="checkbox" onclick="open_or_hide_param(this)" class="checkbox with_input" name="<?php echo  $this->get_field_name('show_instagram_icon'); ?>" id="<?php echo  $this->get_field_id('show_instagram_icon'); ?>" <?php checked($show_instagram_icon, "on"); ?> />                
        <label for="<?php echo $this->get_field_id('show_instagram_icon'); ?>"> Show Instagram Icon </label>    
      </p> 
      <p class="block open_hide">
        Enter your Instagram Profile URL below.
        <input name="<?php echo  $this->get_field_name('instagram_url'); ?>" id="<?php echo  $this->get_field_id('instagram_url'); ?>" type="text" value="<?php echo stripslashes(esc_attr($instagram_url)); ?>">
      </p>
    </div>

  <?php    
  }
}
/* end business_world_social class */
add_action('widgets_init', create_function('', 'return register_widget("business_world_social");'))
?>