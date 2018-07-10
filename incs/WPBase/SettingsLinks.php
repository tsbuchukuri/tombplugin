<?php
/*
@package Tomb
*/

namespace Inc\WPBase;
use \Inc\Controllers\LoadController;

class SettingsLinks extends LoadController{
	
	public function register(){
		add_filter("plugin_action_links_$this->_basename", array($this, 'settings_link'));
	}

	public function settings_link($links){
		$settings_link='<a href="admin.php?page=tomb_plugin">Settings</a>';
		array_push($links, $settings_link);
		return $links;		
	}
}