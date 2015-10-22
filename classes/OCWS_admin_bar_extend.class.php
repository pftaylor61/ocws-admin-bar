<?php
if (!class_exists("OCWS_admin_bar_extend")) {
	class OCWS_admin_bar_extend{
		
		function OCWS_admin_bar_extend(){//constructor
			function wp_admin_bar_new_item() {
				global $plugin_url;
				global $ocwsabtitle;
				$plugin_url = str_replace( '/classes', '', plugins_url( plugin_basename( dirname( __FILE__ ) ) ) );
				$ocwsabtitle = "<img src=\"".$plugin_url."/images/castlelogo16x16.png\"";
				$ocwsabtitle .= " style=\"vertical-align:middle;margin-right:5px\" width=\"16\" height=\"16\" alt=\"OCWS\" />";
				$ocwsabtitle .= "Old Castle Web Solutions";
				global $wp_admin_bar;
				$wp_admin_bar->add_menu(array(
				'id' => 'wp-admin-bar-new-item',
				'title' => __($ocwsabtitle),
				'href' => 'http://www.oldcastleweb.com/'
				));

				$wp_admin_bar->add_menu(array(
				'parent' => 'wp-admin-bar-new-item',
				'title' => __('OCWS Web Packages'),
				'href' => 'http://www.oldcastleweb.com/pws/website-packages/'
				));

				$wp_admin_bar->add_menu(array(
				'parent' => 'wp-admin-bar-new-item',
				'title' => __('OCWS Plugins'),
				'href' => 'http://www.oldcastleweb.com/pws/plugins/'
				));

				$wp_admin_bar->add_menu(array(
				'parent' => 'wp-admin-bar-new-item',
				'title' => __('OCWS Themes'),
				'href' => 'http://www.oldcastleweb.com/pws/themes/'
				));
				}
				add_action('wp_before_admin_bar_render', 'wp_admin_bar_new_item');


		}
	}
}//End Class OCWS_admin_bar_extend


?>