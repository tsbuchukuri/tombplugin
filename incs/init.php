<?php
/*
@package Tomb
*/

namespace Inc;

final class Init{
	
	/*
	store all the classes inside an array
	*/
	public static function get_services(){
		return [
			WPBase\Enqueue::class,
			WPBase\SettingsLinks::class,
			Controllers\WPPageController::class,
			Shortcodes\AddComment::class
		];
	}
	
	/*
	Loop through the classes
	*/
	public static function register_services(){
		foreach(self::get_services() as $clases){
			$service=self::instantiate($clases);
			if(method_exists($service, 'register')){
				$service->register();
			}
		}
	}
	
	/*
	Initialize the Class
	*/
	private static function instantiate($class){
		$service= new $class();
		return $service;
	}
}
