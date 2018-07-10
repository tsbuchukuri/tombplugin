<?php
/*
@package Tomb
*/

namespace Inc\Controllers;

class LoadController{
	public $_pluginpath;
	public $_pluginurl;
	public $_basename;
	public $_wpdbname;
	public $_setActive;
	
	public function __construct(){
		$this->_pluginpath=plugin_dir_path(dirname(__FILE__, 2));
		$this->_pluginurl=plugin_dir_url(dirname(__FILE__, 2));
		$this->_basename=plugin_basename(dirname(__FILE__, 3).'/tomb.php');
		$this->_wpdbname='tomb_comments';
	}


	public function setActive(int $val1, int $val2){
		if($val1==$val2){
			return $this->_setActive=" selected";
		}
		return $this->_setActive="";
	}

	public function updateNotice(string $value){ 
		printf('<div class="updated notice"><p>%s</p></div>', $value);
	}

	public function errorNotice(string $value){ 
		printf('<div class="error notice"><p>%s</p></div>', $value);
	}
}
