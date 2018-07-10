<?php
/*
@package Tomb
*/

namespace Inc\WPBase;
use \Inc\Controllers\LoadController;

class Enqueue extends LoadController{
	
	public function register(){
		add_action('admin_enqueue_scripts', array($this, "adminEnqueue"));
		add_action('wp_enqueue_scripts', array($this, "wpEnqueue"));
	}
	
	function adminEnqueue(){
		wp_enqueue_style('tombstyle', $this->_pluginurl.'assets/css/tomb-style.css');
		wp_enqueue_style('bootstrap', $this->_pluginurl.'assets/css/bootstrap.min.css');
		wp_enqueue_script('tomjs', $this->_pluginurl.'assets/js/tomb-main.js');
	}
	
	function wpEnqueue(){
		wp_enqueue_style('tombStyle', $this->_pluginurl.'assets/css/tomb-wpstyle.css');
		wp_enqueue_script('tomwpjs', $this->_pluginurl.'assets/js/tomb-wpmain.js');
	}
}