<?php
/*
  Plugin Name: Redonleft Copyright
  Plugin URI: https://www.redonleft.com
  Description: only for redonleft.com, display copyright on page
  Version: 1.0.0
  Author: Redonleft
  Author URI: https://www.redonleft.com

  Copyright 2019  Redonleft  (email : 844614585@qq.com)

  This program is free software; you can redistribute it and/or modify
  it under the terms of the GNU General Public License as published by
  the Free Software Foundation; either version 3 of the License, or
  any later version.

  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.

  You should have received a copy of the GNU General Public License
  along with this program; if not, write to the Free Software
  Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

include 'rc_options.php';
class redonleft_copyright{
	public function rol_copyright() {
		$content_before1 = "<div id='owner'>"."<a href='".get_option('url_1')."' target='_blank'><span style='color: ".get_option('color_1').";'><i class='".get_option('icon_1')."'></i></span></a>";
		$content_before2 = "<a href='".get_option('url_2')."' target='_blank'><span style='color: ".get_option('color_2').";'><i class='".get_option('icon_2')."'></i></span></a>";
		$content_before3 = "<a href='".get_option('url_3')."' target='_blank'><span style='color: ".get_option('color_3').";'><i class='".get_option('icon_3')."'></i></span></a>";
		$content_before = $content_before1.$content_before2.$content_before3;
		$content_middle = nl2br(get_option('copyright_content_down'));
		$content = $content_before."<br>".$content_middle."</div>";
		$content = apply_filters('rol_copyright',$content);
		echo $content;
	}
}

$redonleft_copyright = new redonleft_copyright();

if ( ! function_exists( 'rol_copyright' ) ) {
	function rol_copyright() {
		global $redonleft_copyright;
		return $redonleft_copyright->rol_copyright();
	}
}
?>