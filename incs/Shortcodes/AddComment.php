<?php
/*
@package Tomb
*/

namespace Inc\Shortcodes;
use Inc\Controllers\LoadController;

class AddComment extends LoadController{
	
	public function register(){
 		add_shortcode( 'tomb', array($this, 'runShortcode'));
	}
	
	public static function runShortcode(){
		return  require_once("$this->_pluginpath/views/FrontComment.php");
	}

	public function getValues($values){
		 $this->insertDB($values);
	}
	
	protected function insertDB($values){
   		global $wpdb;
   		$_tablename=$wpdb->prefix.$this->_wpdbname;
   		$wpdb->query($wpdb->prepare("INSERT INTO $_tablename (firstname, email, message, date) VALUES (%s, %s, %s, %s)", 
   			$values['fname'], $values['email'], $values['message'], date("Y-m-d")
   		));
	}
}