<?php
namespace RedonleftCopyright;

class options {
	private static $instance = null;

	public static function get_instance() : self {
		if ( null === self::$instance ) self::$instance = new self();
		return self::$instance;
	}
	
	public function init() {
		add_action( 'admin_menu', [self::get_instance(),'redonleft_copyright_menu'] );
		add_action( 'admin_init', [self::get_instance(),'rc_settings'] );
		
	}

	public function redonleft_copyright_menu(){
		add_options_page(
			'Redonleft Copyright Options',
			'Redonleft Copyright',
			'manage_options',
			'Redonleft-Copyright',
			[self::get_instance(),'redonleft_copyright_options']);
	}

	public function rc_settings(){
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

	public function redonleft_copyright_options(){
		$page = new \RedonleftCopyright\OptionContent();
		$page->putdown_page();
	}
}

