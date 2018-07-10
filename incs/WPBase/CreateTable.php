<?php
/*
@package Tomb
*/
namespace Inc\WPBase;
use Inc\Controllers\LoadController;

class CreateTable extends LoadController{
	private $_tablename;

	public static function create_db(){
   		global $wpdb;
   		$_tablename=$wpdb->prefix.'tomb_comments';

		$q="CREATE TABLE IF NOT EXISTS ".$_tablename." (
		  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
		  `firstname` varchar(50) NOT NULL,
		  `email` varchar(100) NOT NULL,	
		  `message` text NOT NULL,
		  `date` DATE NOT NULL,
		  `status` int(10) unsigned NOT NULL DEFAULT '0',
		  PRIMARY KEY (`id`)
		) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1";

    require_once(ABSPATH.'wp-admin/includes/upgrade.php');
		dbDelta($q);
	}
}