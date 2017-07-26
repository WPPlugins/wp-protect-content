<div class="wrap">
    <h2>WP Protect Content</h2>
	<div id="wpc-tab-menu"><a id="wpc-general" class="wpc-tab-links active" >General</a> <a  id="wpc-support" class="wpc-tab-links">Support</a> <a  id="wpc-other" class="wpc-tab-links">Other Plugins</a></div>
    <form method="post" action="options.php"> 
        <?php @settings_fields('wpc-group'); ?>
        <?php @do_settings_fields('wpc-group'); ?>
        <div class="wpc-setting">
			<!-- General Setting -->	
			<div class="first wpc-tab" id="div-wpc-general">
				<table class="form-table">  
					<tr valign="top">
						<th scope="row"><label for="wpc_disallow_copy_content">Disallow Copy of Content</label></th>
						<td><input type="checkbox" value="1" name="wpc_disallow_copy_content" id="wpc_disallow_copy_content" <?php checked(get_option('wpc_disallow_copy_content'),1); ?> /></td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="wpc_disallow_right_click">Disallow Right Click</label></th>
						<td><input type="checkbox" value="1" name="wpc_disallow_right_click" id="wpc_disallow_right_click" <?php checked(get_option('wpc_disallow_right_click'),1); ?> /></td>
					</tr>
				</table>
			</div>
			<div class="wpc-tab" id="div-wpc-support"> <h2>Support</h2> 
				<p><a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=ZEMSYQUZRUK6A" target="_blank" style="font-size: 17px; font-weight: bold;"><img src="https://www.paypal.com/en_US/i/btn/btn_donate_LG.gif" title="Donate for this plugin"></a></p>
				<p><strong>Plugin Author:</strong><br><img src="<?php echo  plugins_url( '../images/mrweb.jpg' , __FILE__ );?>" width="75" height="75" class="authorimg"><br><a href="http://raghunathgurjar.wordpress.com" target="_blank">MR Web Solution</a></p>
				<p><a href="mailto:raghunath.0087@gmail.com" target="_blank" class="contact-author">Contact Author</a></p>
			</div>
			<div class="last wpc-tab" id="div-wpc-other">
				<h2>Other plugins</h2>
				<p><strong>My Other Plugins:</strong><br>
				<ol>
				<li><a href="https://wordpress.org/plugins/custom-share-buttons-with-floating-sidebar" target="_blank">Custom Share Buttons With Floating Sidebar</a></li>
				<li><a href="https://wordpress.org/plugins/protect-wp-admin/" target="_blank">Protect WP-Admin</a></li>
				<li><a href="https://wordpress.org/plugins/wp-categories-widget/" target="_blank">WP Categories Widget</a></li>
				<li><a href="https://wordpress.org/plugins/wp-posts-widget/" target="_blank">WP Post Widget</a></li>
				<li><a href="https://wordpress.org/plugins/wp-importer" target="_blank">WP Importer</a></li>
				<li><a href="https://wordpress.org/plugins/wp-csv-importer/" target="_blank">WP CSV Importer</a></li>
				<li><a href="https://wordpress.org/plugins/wp-testimonial/" target="_blank">WP Testimonial</a></li>
				<li><a href="https://wordpress.org/plugins/wc-sales-count-manager/" target="_blank">WooCommerce Sales Count Manager</a></li>
				<li><a href="https://wordpress.org/plugins/wp-social-buttons/" target="_blank">WP Social Buttons</a></li>
				<li><a href="https://wordpress.org/plugins/wp-youtube-gallery/" target="_blank">WP Youtube Gallery</a></li>
				<li><a href="https://wordpress.org/plugins/tweets-slider/" target="_blank">Tweets Slider</a></li>
				<li><a href="https://wordpress.org/plugins/rg-responsive-gallery/" target="_blank">RG Responsive Slider</a></li>
				<li><a href="https://wordpress.org/plugins/cf7-advance-security" target="_blank">Contact Form 7 Advance Security WP-Admin</a></li>
				<li><a href="https://wordpress.org/plugins/wp-easy-recipe/" target="_blank">WP Easy Recipe</a></li>
				</ol>
				</p>
			</div>
		</div>
        <?php @submit_button(); ?>
    </form>
</div>
