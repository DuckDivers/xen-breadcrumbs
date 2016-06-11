<?php
// Admin Menu
add_action( 'admin_menu', 'xenforo_custom_admin_menu' );
add_action('admin_menu' , 'register_xen_settings');
function xenforo_custom_admin_menu() {
    add_options_page(
        'Xenforo Breadcrumbs Options',
        'Xen Breadcrumbs',
        'manage_options',
        'xenforo-breadcrumbs-plugin',
        'xenbreadcrumbs_options_page'
    );
}
add_action( 'admin_enqueue_scripts', 'mw_enqueue_color_picker' );
function mw_enqueue_color_picker( $hook_suffix ) {
    wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_script( 'my-script-handle', plugins_url('my-script.js', __FILE__ ), array( 'wp-color-picker' ), false, true );
}
function register_xen_settings() {
	register_setting( 'xenbreadcrumbs_options_page' , 'xen_show_current_page' );
	register_setting( 'xenbreadcrumbs_options_page' , 'xen_custom_css' );
	register_setting( 'xenbreadcrumbs_options_page', 'xen_show_on_homepage');
	register_setting( 'xenbreadcrumbs_options_page', 'xen_background_color');
	register_setting( 'xenbreadcrumbs_options_page', 'xen_active_color');
	register_setting( 'xenbreadcrumbs_options_page', 'xen_trail_color');
	register_setting( 'xenbreadcrumbs_options_page', 'xen_hover_color');
	register_setting( 'xenbreadcrumbs_options_page', 'xen_font_color');
	register_setting( 'xenbreadcrumbs_options_page', 'xen_bc_height');
 } 

function xenbreadcrumbs_options_page() {
    ?>

<div class="wrap">
  <?php screen_icon(); ?>
  <form action="options.php" method="post" id="xen_show_current_page" name="xenbreadcrumbs_options_form">
    <?php settings_fields('xenbreadcrumbs_options_page'); ?>
    <?php // Get Existing or Initialize Options
		if(get_option( 'xen_show_current_page' )){
			$checked = 'checked';}
			else {$checked ='';};
	  	if(get_option('xen_show_on_homepage')){
	  		$homepage = 'checked';}
			else {$homepage = '';};
		 if(get_option('xen_background_color')){
	  		$bgcolor = get_option ('xen_background_color');}
			else {$bgcolor = '#f7f7f7';};
		 if(get_option('xen_active_color')){
	  		$active = get_option ('xen_active_color');}
			else {$active = '#e6e6e6';};
		 if(get_option('xen_font_color')){
	  		$fontcolor = get_option ('xen_font_color');}
			else {$fontcolor = '#000000';};
		 if(get_option('xen_trail_color')){
	  		$trailcolor = get_option ('xen_trail_color');}
			else {$trailcolor = '#aaaaaa';};	
		 if(get_option('xen_hover_color')){
	  		$hovercolor = get_option ('xen_hover_color');}
			else {$hovercolor = '#a3a3a3';};	
		 if(get_option('xen_bc_height')){
	  		$bcheight = get_option ('xen_bc_height');}
			else {$bcheight = '38';};	
		?>
    <h2>Xenforo Style Breadcrumbs Options</h2>
    <table class="widefat">
    <thead>
      <tr>
        <th><strong>Implement your Xenforo Style Breadcrumbs.</strong></th>
        <th> 
    </thead>
    <tbody>
    <tr>	
    	<td style="padding: 5px; margin: 10px 0; font-family:Verdana, Geneva, sans-serif;color:#666;"> To implement your breadcrumbs, add the following code to your header.php template, or wherever you want the breadcrumbs to go in the page template.  Usually, the header.php or if your theme has a title-section template.
        </td>
    </tr>
    <tr>
    	<td style="border-bottom: 1px solid #666; padding: 10px; font-family:Verdana, Geneva, sans-serif;color:#666;">
        	<table width="500" bgcolor="#ddd" style="margin-left: 40px;">
            	<tr>
                	<td>&lt;?php if (function_exists('breadcrumbs')) {<br>
            			&nbsp;&nbsp;&nbsp;&nbsp;breadcrumbs();<br>
       					&nbsp; }; ?&gt;<br>
                     </td>
                </tr>
             </table>           
        </td>
    </tr>
    <td style="padding: 5px; font-family:Verdana, Geneva, sans-serif;color:#666; font-weight:bold; font-size: 16px;"> Customize Your Breadcrumbs
        </td>
    <tr>
      <td style="padding:15px 10px 5px; font-family:Verdana, Geneva, sans-serif;color:#666;"><label for="xen_show_current_page">
        <p>
          <input id="current" type="checkbox" name="xen_show_current_page" value="1" <?php echo $checked;?>>
          Check this box to display the current page in the breadcrumbs</p>
        </label></td>
    </tr>
    <tr>
      <td style="padding:5px 10px 5px;font-family:Verdana, Geneva, sans-serif;color:#666;"><label for="xen_show_on_homepage">
        <p>
          <input id="homepage" type="checkbox" name="xen_show_on_homepage" value="1" <?php echo $homepage;?>>
          Check this box to display breadcrumbs on homepage</p>
        </label></td>
    </tr>
    <tr>
    <td style="padding:5px;font-family:Verdana, Geneva, sans-serif;color:#666;">
        <table>
        	<tr>
            	<td><label for="xen_background_color">Choose the Background Color: </label></td>
           		<td><p><input id="bgcolor"  type="text" name="xen_background_color" class="my-color-field" value="<?php echo $bgcolor;?>"></p></td>
            </tr>
            <tr>
            	<td><label for="xen_active_color"> Choose the Active BG Color: </label></td>
           		<td><p><input id="activecolor"  type="text" name="xen_active_color" class="my-color-field" value="<?php echo $active;?>"></p></td>
            </tr>
            <tr>
            	<td><label for="xen_trail_color"> Choose the Color of the Trail: </label></td>
           		<td><p><input id="trailcolor"  type="text" name="xen_trail_color" class="my-color-field" value="<?php echo $trailcolor;?>"></p></td>
            </tr>
             <tr>
            	<td><label for="xen_hover_color"> Choose the Hover color: </label></td>
           		<td><p><input id="hovercolor"  type="text" name="xen_hover_color" class="my-color-field" value="<?php echo $hovercolor;?>"></p></td>
            </tr>
            <tr>
            	<td><label for="xen_font_color"> Choose the Font Color: </label></td>
           		<td><p><input id="fontcolor"  type="text" name="xen_font_color" class="my-color-field" value="<?php echo $fontcolor;?>"></p></td>
            </tr>
            <tr>
            	<td><label for="xen_bc_height"> Enter the Height of the Breadcrumbs: </label></td>
           		<td><p><input id="bc_height"  type="text" name="xen_bc_height" value="<?php echo $bcheight;?>"> Pixels</p></td>
            </tr>
        </table>
	<!-- end CSS Options -->       
     </td>
     </tr>
      <tr>
        <td style="padding:5px 10px;font-family:Verdana, Geneva, sans-serif;color:#666; border-top: 1px solid #666;"><label for="xen_custom_css">
          <p>Enter Any Additional Custom CSS Below</p>
          <p>
            <textarea rows="10" cols="50" name="xen_custom_css" style="margin-left: 10px;"><?php echo get_option('xen_custom_css');?></textarea>
          </p>
          </label></td>
      </tr>
        </tbody>
        <tfoot>
        <tr>
          <th><input type="submit" name="submit" value="Save Settings" class="button button-primary" onClick="return empty()"  /></th>
        </tr>
      </tfoot>
    </table>
  </form>
</div>
<?php }; ?>
