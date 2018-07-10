<?php
/*
@package Tomb
*/
/*
Plugin Name: Tomb
Plugin URI: http://tomb.realtyna.info/
Description: This is my test plugin. Task1
Version: 1.0.0
Author: Tom b.
Author URI: http://tomb.realtyna.info/
License: GPLv3
Text Domain: tomb
*/

/*
This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <https://www.gnu.org/licenses/>.
*/

defined('ABSPATH') or die('you can\t access this page');

if(file_exists(__FILE__).'/vendor/autoload.php'){
	require_once dirname(__FILE__).'/vendor/autoload.php';
}


function Activate_Tomb_Plugin(){
	Inc\WPBase\TombActivate::activate();
}
register_activation_hook(__FILE__, 'Activate_Tomb_Plugin');

function db_create(){
	Inc\WPBase\CreateTable::create_db();
}
register_activation_hook(__FILE__, 'db_create');


function Deactivate_Tomb_Plugin(){
	Inc\WPBase\TombDeactivate::deactivate();
}
register_deactivation_hook(__FILE__, 'Deactivate_Tomb_Plugin');

if(class_exists('Inc\\Init')){ 
	Inc\Init::register_services();
}


