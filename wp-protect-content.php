<?php
/*
Plugin Name: WP Protect Content
Plugin URI: http://www.mrwebsolution.in/
Description: It's a very simple plugin for protect your site content. "WP Protect Content" plugin will disable copy content.
Author: MR Web Solution
Author URI: http://raghunathgurjar.wordpress.com
Version: 1.0
*/
/**
License GPL2
Copyright 2016  MR Web Solution  (email  raghunath.0087@gmail.com)

This program is free software; you can redistribute it andor modify
it under the terms of the GNU General Public License, version 2, as 
published by the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
if(!class_exists('WP_Protect_Content'))
{
    class WP_Protect_Content
    {
        /**
         * Construct the plugin object
         */
        public function __construct()
        {
            // register actions
			add_action('admin_init', array(&$this, 'wpc_admin_init'));
			add_action('admin_menu', array(&$this, 'wpc_add_menu'));
			add_action('init', array(&$this, 'init_wp_protect_content'));
        } // END public function __construct
		
		/**
		* remove wp version param from any enqueued scripts
		*/
		function init_wp_protect_content()
		{
			if(!is_admin()){
				$wpc_disallow_copy_content = get_option('wpc_disallow_copy_content');
				$wpc_disallow_right_click = get_option('wpc_disallow_right_click');
				// disable copy of content
				if($wpc_disallow_copy_content)
				add_action( 'wp_head', array(&$this,'wp_protect_content_disable_copy') );
			    // disable right click
				if($wpc_disallow_right_click)
				add_action( 'wp_head', array(&$this,'wp_protect_content_disable_right_click') );
			}
		}
		/**
		* 
		* Disallow copy content
		*/
		function wp_protect_content_disable_copy() {
			$copycss ='<style>body{margin:0;padding:0;-webkit-touch-callout:none;-webkit-user-select:none;-khtml-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none}</style>';
			print $copycss;
		}
		/**
		* Disallow right click
		*/
		function wp_protect_content_disable_right_click(){
			$script ='<script type="text/javascript"> 
						function disableselect(e){  
						return false  
						}  

						function reEnable(){  
						return true  
						}  

						//if IE4+  
						document.onselectstart=new Function ("return false")  
						document.oncontextmenu=new Function ("return false")  
						//if NS6  
						if (window.sidebar){  
						document.onmousedown=disableselect  
						document.onclick=reEnable  
						}
				</script>';
			
			print $script;
		}
		
		/**
		 * hook into WP's admin_init action hook
		 */
		public function wpc_admin_init()
		{
			// Set up the settings for this plugin
			$this->wpc_init_settings();
			// Possibly do additional admin_init tasks
		} // END public static function activate
		/**
		 * Initialize some custom settings
		 */     
		public function wpc_init_settings()
		{
			// register the settings for this plugin
			register_setting('wpc-group', 'wpc_disallow_copy_content');
			register_setting('wpc-group', 'wpc_disallow_right_click');
		} // END public function init_custom_settings()
		/**
		 * add a menu
		 */     
		public function wpc_add_menu()
		{
			add_options_page('WP Protect Content Settings', 'WP Protect Content', 'manage_options', 'wp_protect_content', array(&$this, 'wpc_settings_page'));
		} // END public function add_menu()

		/**
		 * Menu Callback
		 */     
		public function wpc_settings_page()
		{
			if(!current_user_can('manage_options'))
			{
				wp_die(__('You do not have sufficient permissions to access this page.'));
			}

			// Render the settings template
			include(sprintf("%s/lib/settings.php", dirname(__FILE__)));
			//include(sprintf("%s/css/admin.css", dirname(__FILE__)));
			// Style Files
			wp_register_style( 'wpc_admin_style', plugins_url( 'css/wpc-admin.css',__FILE__ ) );
			wp_enqueue_style( 'wpc_admin_style' );
			// JS files
			wp_register_script('wpc_admin_script', plugins_url('/js/wpc-admin.js',__FILE__ ), array('jquery'));
            wp_enqueue_script('wpc_admin_script');
		} // END public function plugin_settings_page()
        /**
         * Activate the plugin
         */
        public static function wpc_activate()
        {
            // Do nothing
        } // END public static function activate
    
        /**
         * Deactivate the plugin
         */     
        public static function wpc_deactivate()
        {
            // Do nothing
        } // END public static function deactivate
    } // END class WP_Protect_Content
} // END if(!class_exists('WP_Protect_Content'))

if(class_exists('WP_Protect_Content'))
{
    // Installation and uninstallation hooks
    register_activation_hook(__FILE__, array('WP_Protect_Content', 'wpc_activate'));
    register_deactivation_hook(__FILE__, array('WP_Protect_Content', 'wpc_deactivate'));

    // instantiate the plugin class
    $wpc_plugin_template = new WP_Protect_Content();
	// Add a link to the settings page onto the plugin page
	if(isset($wpc_plugin_template))
	{
		// Add the settings link to the plugins page
		function wpc_settings_link($links)
		{ 
			$settings_link = '<a href="options-general.php?page=wp_protect_content">Settings</a>'; 
			array_unshift($links, $settings_link); 
			return $links; 
		}

		$plugin = plugin_basename(__FILE__); 
		add_filter("plugin_action_links_$plugin", 'wpc_settings_link');
	}
}
