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
				
				// make a new menu for 'Old Castle Web Services'
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
				
				function ocws_abm() {
					global $wp_admin_bar;
					$ocws_pl_url = site_url('/wp-admin/plugins.php');
					$ocws_usr_url = site_url('/wp-admin/users.php');
					$ocws_id = 'site-name';
					$ocws_plug_url = str_replace( '/classes', '', plugins_url( plugin_basename( dirname( __FILE__ ) ) ) );
					$ocws_abtitle = "<img src=\"".$ocws_plug_url."/images/castlelogo16x16.png\"";
					$ocws_abtitle .= " style=\"vertical-align:middle;margin-right:5px\" width=\"16\" height=\"16\" alt=\"OCWS\" />";
					
					// add 'plugins' to the Site Name menu
					if ( !is_admin() ) {
					$wp_admin_bar->add_menu(array(
						'parent' => $ocws_id,
						'title' => 'Plugins',
						'href' => $ocws_pl_url,
						));
					$wp_admin_bar->add_menu(array(
						'parent' => $ocws_id,
						'title' => 'Users',
						'href' => $ocws_usr_url,
						));
					}
					// change the logo at the top left
					$wp_admin_bar->add_menu( array(
						'id'    => 'wp-logo',
						'title' => $ocws_abtitle.'<span class="screen-reader-text">'. __( 'About WordPress' ) . '</span>',
						'href'  => self_admin_url( 'about.php' ),
					) );
				}
				add_action('admin_bar_menu', 'ocws_abm', 2000);

		}
	}
}//End Class OCWS_admin_bar_extend


?>