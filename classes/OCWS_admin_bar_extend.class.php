<?php
require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
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
                                        $ocws_murl = array(
                                            'plugins' => site_url('/wp-admin/plugins.php'),
                                            'users' => site_url('/wp-admin/users.php'),
                                            'orders' => site_url('/wp-admin/edit.php?post_type=shop_order'),
                                            'products' => site_url('/wp-admin/edit.php?post_type=product'),
                                            'caches' => site_url('/wp-admin/edit.php?post_type=creationcache'),
                                            'sliders' => site_url('/wp-admin/edit.php?post_type=ocwssl_images'),
                                            'newsbox' => site_url('/wp-admin/edit.php?post_type=ocwsnb_newsbox'),
                                            );
					
					$ocws_id = 'site-name';
                                        $ocws_side = 'ocws_anchor';
                                        $ocws_theme = wp_get_theme();
                                        //$ocws_side_label = 'This Menu';
                                        $ocws_side_label = $ocws_theme->get( 'Name' ).' Theme Menu';
					$ocws_plug_url = str_replace( '/classes', '', plugins_url( plugin_basename( dirname( __FILE__ ) ) ) );
					$ocws_abtitle = "<img src=\"".$ocws_plug_url."/images/castlelogo16x16.png\"";
					$ocws_abtitle .= " style=\"vertical-align:middle;margin-right:5px\" width=\"16\" height=\"16\" alt=\"OCWS\" />";
					
					// add 'plugins' to the Site Name menu
					if ( !is_admin() ) {
                                            $wp_admin_bar->add_menu(array(
                                                    'id' => $ocws_side,
                                                    'parent' => $ocws_id,
                                                    'title' => $ocws_side_label,
                                                    ));
                                            $wp_admin_bar->add_menu(array(
                                                    'parent' => $ocws_side,
                                                    'title' => 'Plugins',
                                                    'href' => $ocws_murl['plugins'],
                                                    ));
                                            $wp_admin_bar->add_menu(array(
                                                    'parent' => $ocws_side,
                                                    'title' => 'Users',
                                                    'href' => $ocws_murl['users'],
                                                    ));
                                            if ( is_plugin_active('woocommerce/woocommerce.php') ) {
                                                // testing for Woocommerce
                                                $wp_admin_bar->add_menu(array(
                                                    'parent' => $ocws_side,
                                                    'title' => 'Orders',
                                                    'href' => $ocws_murl['orders'],
                                                    ));
                                                $wp_admin_bar->add_menu(array(
                                                    'parent' => $ocws_side,
                                                    'title' => 'Products',
                                                    'href' => $ocws_murl['products'],
                                                    ));
                                            }
                                            if ( is_plugin_active('ocws-creationcache/ocws-creationcache.php') ) {
                                                // testing for Creation Cache
                                                $wp_admin_bar->add_menu(array(
                                                    'parent' => $ocws_side,
                                                    'title' => 'Creation Caches',
                                                    'href' => $ocws_murl['caches'],
                                                    ));
                                                
                                            }
                                            if ( is_plugin_active('ocws-slider/ocws-slider.php') ) {
                                                // testing for Creation Cache
                                                $wp_admin_bar->add_menu(array(
                                                    'parent' => $ocws_side,
                                                    'title' => 'Image Sliders',
                                                    'href' => $ocws_murl['sliders'],
                                                    ));
                                                
                                            }
                                            if ( is_plugin_active('ocws-newsbox/ocws-newsbox.php') ) {
                                                // testing for Creation Cache
                                                $wp_admin_bar->add_menu(array(
                                                    'parent' => $ocws_side,
                                                    'title' => 'Newsboxes',
                                                    'href' => $ocws_murl['newsbox'],
                                                    ));
                                                
                                            }
                                        
					} // end adding to Site Name menu
                                        
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