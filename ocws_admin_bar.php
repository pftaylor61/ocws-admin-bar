<?php
/*
Plugin Name: OCWS Admin Bar
Plugin URI: http://oldcastleweb.com/pws/plugins
Description: This plugin adds extra functionality to the admin bar, to enable special links to the <a href="http://www.oldcastleweb.com">Old Castle Web Solutions</a> site.
Version: 0.7
Author: Paul Taylor
Author URI: http://oldcastleweb.com/pws/about
License: GPL2
GitHub Plugin URI: https://github.com/pftaylor61/ocws-admin-bar
GitHub Branch:     master
*/
/*  Copyright 2012  Paul Taylor  (email : info@oldcastleweb.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
	require_once( 'classes/OCWS_admin_bar_extend.class.php' );
	
	global $OCWS_abe;
	

if(class_exists("OCWS_admin_bar_extend")){
	$OCWS_abe = new OCWS_admin_bar_extend();
}


?>
