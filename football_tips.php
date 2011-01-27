<?php
/*
Plugin Name: Football_Tips
Plugin URI: http://www.goal.mu/wordpress-widget
Description: Display the Latest Football_Tips and the best Odds
Author: Nababsingh-Ramdharry/Goal.mu
Version: 0.02
Author URI: http://www.goal.mu/wordpress-widget

*/
function widget_Football_Tips_init() 
	  {

	  
	  /* Your Function */
	  function Football_Tips()
	  {
		  

		  
		  $URL = "http://server1.goal.mu/bookieodds.php";
$a = file_get_contents("$URL");
echo ($a);
		  

		  
	  }
	  


	  
	  function widget_Football_Tips($args) 
	  {
	  
	  	  // Collect our widget's options, or define their defaults.
		  $options = get_option('widget_Football_Tips');
		  $title = empty($options['title']) ? __('Football_Tips') : $options['title'];
			
		  extract($args);
		  echo $before_widget;
		  echo $before_title;
		  echo $title;
		  echo $after_title;
		  Football_Tips();
		  echo $after_widget;
	  }  
	  
	
	  
	  function widget_Football_Tips_control()
	  {
	  
		// Collect our widget options.
		$options = $newoptions = get_option('widget_Football_Tips');
		
		// This is for handing the control form submission.
		if ( $_POST['widget_Football_Tips-submit'] ) 
		{
			// Clean up control form submission options
			$newoptions['title'] = strip_tags(stripslashes($_POST['widget_Football_Tips-title']));
		}
				
		// If original widget options do not match control form
		// submission options, update them.
		if ( $options != $newoptions ) 
		{
			$options = $newoptions;
			update_option('widget_Football_Tips', $options);
		}
						
		$title = attribute_escape($options['title']);

		echo '<p><label for="Football_Tips-title">';
		echo 'Title: <input style="width: 250px;" id="widget_Football_Tips-title" name="widget_Football_Tips-title" type="text" value="';
		echo $title;
		echo '" />';
		echo '</label></p>';
		echo '<input type="hidden" id="widget_Football_Tips-submit" name="widget_Football_Tips-submit" value="1" />';
	  }
	  
	  
	// This registers the widget.
    register_sidebar_widget('Football_Tips', 'widget_Football_Tips');
	
	// This registers the (optional!) widget control form.
    register_widget_control('Football_Tips', 'widget_Football_Tips_control');
	
  }
  add_action('plugins_loaded', 'widget_Football_Tips_init');?>
	