<?php
/*
@package Tomb
*/

namespace Inc\WPBase;

class TombActivate{
	public static function activate(){
		flush_rewrite_rules();	
	}
}