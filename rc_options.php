<?php
if ( is_admin() ){
	add_action( 'admin_menu', 'redonleft_copyright_menu' );
	add_action( 'admin_init', 'rc_settings' );
}

function redonleft_copyright_menu(){
	add_options_page(
	'Redonleft Copyright Options', 
	'Redonleft Copyright', 
	'manage_options', 
	'Redonleft-Copyright', 
	'redonleft_copyright_options');
}

function rc_settings(){
	register_setting( 'redonleft_copyright_group', 'icon_1' );
	register_setting( 'redonleft_copyright_group', 'icon_2' );
	register_setting( 'redonleft_copyright_group', 'icon_3' );
	register_setting( 'redonleft_copyright_group', 'color_1' );
	register_setting( 'redonleft_copyright_group', 'color_2' );
	register_setting( 'redonleft_copyright_group', 'color_3' );
	register_setting( 'redonleft_copyright_group', 'url_1' );
	register_setting( 'redonleft_copyright_group', 'url_2' );
	register_setting( 'redonleft_copyright_group', 'url_3' );
	register_setting( 'redonleft_copyright_group', 'copyright_content_down' );
}

function redonleft_copyright_options(){
	  if ( !current_user_can( 'manage_options' ) )  {
          wp_die( 'You do not have sufficient permissions to access this page.' );
     }
?>
<div class="wrap">
<h2>Redonleft专用版权信息设置</h2>
<p><?php _e("下面内容用于设置redonleft.com公开版权信息和其他相关信息，通常展示在sidebar下方","Redonleft-Copyright")?></p>
<form method="post" action="options.php" id="copyright">
	<?php
	settings_fields('redonleft_copyright_group');
	do_settings_sections('redonleft_copyright_group');
	?>
	<br>
	位于上方的三个图标链接，采用font-awesome库
	<br>
	<table>
		<tr>
			<th>
				链接
			</th>
			<th>
				颜色16位码
			</th>
			<th>
				font-awesome标识码
			</th>
		</tr>
		<tr>
			<td>
				<input size="40" type="text" name="url_1" value="<?php echo get_option('url_1'); ?>" />
			</td>
			<td>
				<input type="text" name="color_1" value="<?php echo get_option('color_1'); ?>" />
			</td>
			<td>
				<input type="text" name="icon_1" value="<?php echo get_option('icon_1'); ?>" />
			</td>
		</tr>
		<tr>
			<td>
				<input size="40" type="text" name="url_2" value="<?php echo get_option('url_2'); ?>"/>
			</td>
			<td>
				<input type="text" name="color_2" value="<?php echo get_option('color_2'); ?>" />
			</td>
			<td>
				<input type="text" name="icon_2" value="<?php echo get_option('icon_2'); ?>" />
			</td>
		</tr>
		<tr>
			<td>
				<input size="40" type="text" name="url_3" value="<?php echo get_option('url_3'); ?>"/>
			</td>
			<td>
				<input type="text" name="color_3" value="<?php echo get_option('color_3'); ?>" />
			</td>
			<td>
				<input type="text" name="icon_3" value="<?php echo get_option('icon_3'); ?>" />
			</td>
		</tr>
	</table>
	<br>
	位于下方的版权信息内容<br>
	<textarea form="copyright" rows="6" cols="80" id="copyright_content_down" name="copyright_content_down" ><?php echo get_option('copyright_content_down'); ?></textarea>
	<?php submit_button(); ?>
</form>
</div>
<?php }?>