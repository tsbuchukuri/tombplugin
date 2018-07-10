<?php
/*
@package Tomb
*/

namespace Inc\WPBase;

class TombDeactivate{
	public static function deactivate(){
		flush_rewrite_rules();	
	}
}