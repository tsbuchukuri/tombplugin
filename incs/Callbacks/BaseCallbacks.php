<?php
/*
@package Tomb
*/

namespace Inc\Callbacks;
use \Inc\Controllers\LoadController;

class BaseCallbacks extends LoadController{
	
	public function callBackPages(string $thisPage){
		return  require_once("$this->_pluginpath/views/$thisPage.php");
	}


}