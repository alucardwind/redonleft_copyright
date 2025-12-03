<?php
/**
  Plugin Name: Redonleft Copyright
  Plugin URI: https://www.redonleft.com
  Description: 针对redonleft.com，显示版权信息
  Version: 2.0.0
  Author: Redonleft
  Author URI: https://www.redonleft.com

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

if ( ! defined( 'ABSPATH' ) ) exit;

define("REDONLEFT_COPYRIGHT_SRC", plugin_dir_path(__FILE__) . 'src/');
define("REDONLEFT_COPYRIGHT_URL", plugin_dir_url(__FILE__) . 'assets/');

require_once REDONLEFT_COPYRIGHT_SRC . 'options.php';
require_once REDONLEFT_COPYRIGHT_SRC . 'OptionContent.php';
require_once REDONLEFT_COPYRIGHT_SRC . 'PageContent.php';

if (is_admin()){
	add_action('plugins_loaded', function() {
		$option = RedonleftCopyright\options::get_instance();
		$option->init();
	});
}
else{
	add_action('plugins_loaded', function() {
		$copyright = new RedonleftCopyright\PageContent();
		$copyright->MakeShortCode();
	});
}