<?php
namespace RedonleftCopyright;

class PageContent {
	
	public function MakeShortCode() {
		add_shortcode('redonleft_copyright', [$this, 'PageHtml']);
	}
	
	public function PageHtml() {
		$content_before1 = "<div id='owner'>"."<a href='".get_option('url_1')."' target='_blank'><span style='color: ".get_option('color_1').";'><i class='".get_option('icon_1')."'></i></span></a>";
		$content_before2 = "<a href='".get_option('url_2')."' target='_blank'><span style='color: ".get_option('color_2').";'><i class='".get_option('icon_2')."'></i></span></a>";
		$content_before3 = "<a href='".get_option('url_3')."' target='_blank'><span style='color: ".get_option('color_3').";'><i class='".get_option('icon_3')."'></i></span></a>";
		$content_before = $content_before1.$content_before2.$content_before3;
		$content_middle = nl2br(get_option('copyright_content_down'));
		$content = $content_before."<br>".$content_middle."</div>";
//		$content = apply_filters('rol_copyright',$content);
		return $content;
	}
}