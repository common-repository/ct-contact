<?php
/*
Plugin Name: Contempo Contact Info Widget
Plugin URI: http://contemporealestatethemes.com
Description: A simple contact information widget
Version: 1.0.0
Author: Chris Robinson
Author URI: http://contemporealestatethemes.com
*/

/*-----------------------------------------------------------------------------------*/
/* Include CSS */
/*-----------------------------------------------------------------------------------*/
 
function ct_contact_css() {		
	wp_register_style( 'ct_contact_css', plugins_url( 'assets/style.css', __FILE__ ), false, '1.0' );
	wp_enqueue_style( 'ct_contact_css' );
}
add_action( 'wp_print_styles', 'ct_contact_css' );

/*-----------------------------------------------------------------------------------*/
/* Register Widget */
/*-----------------------------------------------------------------------------------*/

class ct_Contact extends WP_Widget {

	function ct_Contact() {
	   $widget_ops = array('description' => 'Use this widget to display your contact information.' );
	   parent::WP_Widget(false, __('CT Contact Info', 'contempo'),$widget_ops);      
	}
	
	function widget($args, $instance) {  
		
		extract( $args );
		
		$title = $instance['title'];
		$company = $instance['company'];
		$street = $instance['street'];
		$city = $instance['city'];
		$state = $instance['state'];
		$postal = $instance['postal'];
		$country = $instance['country'];
		$email = $instance['email'];
		$viewalltext = $instance['viewalltext'];
		$viewalllink = $instance['viewalllink'];
	
	?>
		<?php echo $before_widget; ?>
		<?php if ($title) { echo $before_title . $title . $after_title; } ?>
        <ul>
            <?php if($company != "") { ?><li id="company-name"><?php echo $company; ?></li><?php } ?>
            <?php if($street != "") { ?><li><?php echo $street; ?></li><?php } ?>
            <?php if($city != "" || $state != "" || $postal != "") { ?><li><?php echo $city; ?>, <?php echo $state; ?> <?php echo $postal; ?></li><?php } ?>
            <?php if($country != "") { ?><li><?php echo $country; ?></li><?php } ?>
            <?php if($email != "") { ?><li id="company-email"><a href="mailto:<?php echo $email; ?>"><?php _e('Email us', 'contempo'); ?></a></li><?php } ?>
            <?php if($viewalltext != "" || $viewalllink != "") { ?><li id="viewmore" class="right"><a class="read-more" href="<?php echo $viewalllink; ?>"><?php echo $viewalltext; ?> <em>&rarr;</em></a></li><?php } ?>
        </ul>		
		<?php echo $after_widget; ?>   
    <?php
   }

   function update($new_instance, $old_instance) {                
	   return $new_instance;
   }

   function form($instance) {        
   
		$title = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : ''; 
		$company = isset( $instance['company'] ) ? esc_attr( $instance['company'] ) : '';
		$street = isset( $instance['street'] ) ? esc_attr( $instance['street'] ) : '';
		$city = isset( $instance['city'] ) ? esc_attr( $instance['city'] ) : '';
		$state = isset( $instance['state'] ) ? esc_attr( $instance['state'] ) : '';
		$postal = isset( $instance['postal'] ) ? esc_attr( $instance['postal'] ) : '';
		$country = isset( $instance['country'] ) ? esc_attr( $instance['country'] ) : '';
		$email = isset( $instance['email'] ) ? esc_attr( $instance['email'] ) : '';
		$viewalltext = isset( $instance['viewalltext'] ) ? esc_attr( $instance['viewalltext'] ) : '';
		$viewalllink = isset( $instance['viewalllink'] ) ? esc_attr( $instance['viewalllink'] ) : '';
		
		?>
		<p>
		   <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:','contempo'); ?></label>
		   <input type="text" name="<?php echo $this->get_field_name('title'); ?>"  value="<?php echo $title; ?>" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" />
		</p>
        <p>
		   <label for="<?php echo $this->get_field_id('company'); ?>"><?php _e('Company Name:','contempo'); ?></label>
		   <input type="text" name="<?php echo $this->get_field_name('company'); ?>"  value="<?php echo $company; ?>" class="widefat" id="<?php echo $this->get_field_id('company'); ?>" />
		</p>
		<p>
		   <label for="<?php echo $this->get_field_id('street'); ?>"><?php _e('Street Address:','contempo'); ?></label>
		   <input type="text" name="<?php echo $this->get_field_name('street'); ?>"  value="<?php echo $street; ?>" class="widefat" id="<?php echo $this->get_field_id('street'); ?>" />
		</p>
        <p>
		   <label for="<?php echo $this->get_field_id('city'); ?>"><?php _e('City:','contempo'); ?></label>
		   <input type="text" name="<?php echo $this->get_field_name('city'); ?>"  value="<?php echo $city; ?>" class="widefat" id="<?php echo $this->get_field_id('city'); ?>" />
		</p>
        <p>
		   <label for="<?php echo $this->get_field_id('state'); ?>"><?php _e('State:','contempo'); ?></label>
		   <input type="text" name="<?php echo $this->get_field_name('state'); ?>"  value="<?php echo $state; ?>" class="widefat" id="<?php echo $this->get_field_id('state'); ?>" />
		</p>
        <p>
		   <label for="<?php echo $this->get_field_id('postal'); ?>"><?php _e('Postal:','contempo'); ?></label>
		   <input type="text" name="<?php echo $this->get_field_name('postal'); ?>"  value="<?php echo $postal; ?>" class="widefat" id="<?php echo $this->get_field_id('postal'); ?>" />
		</p>
        <p>
		   <label for="<?php echo $this->get_field_id('country'); ?>"><?php _e('Country:','contempo'); ?></label>
		   <input type="text" name="<?php echo $this->get_field_name('country'); ?>"  value="<?php echo $country; ?>" class="widefat" id="<?php echo $this->get_field_id('country'); ?>" />
		</p>
        <p>
		   <label for="<?php echo $this->get_field_id('email'); ?>"><?php _e('Email:','contempo'); ?></label>
		   <input type="text" name="<?php echo $this->get_field_name('email'); ?>"  value="<?php echo $email; ?>" class="widefat" id="<?php echo $this->get_field_id('email'); ?>" />
		</p>
        <p>
		   <label for="<?php echo $this->get_field_id('viewalltext'); ?>"><?php _e('View More Link Text','contempo'); ?></label>
		   <input type="text" name="<?php echo $this->get_field_name('viewalltext'); ?>"  value="<?php echo $viewalltext; ?>" class="widefat" id="<?php echo $this->get_field_id('viewalltext'); ?>" />
		</p>
        <p>
		   <label for="<?php echo $this->get_field_id('viewalllink'); ?>"><?php _e('View More Link URL','contempo'); ?></label>
		   <input type="text" name="<?php echo $this->get_field_name('viewalllink'); ?>"  value="<?php echo $viewalllink; ?>" class="widefat" id="<?php echo $this->get_field_id('viewalllink'); ?>" />
		</p>
		<?php
	}
}  

add_action( 'widgets_init', create_function( '', 'register_widget("ct_Contact");' ) );

?>