<?php
/*
@package Tomb
*/

namespace Inc\Controllers;
use \Inc\Controllers\loadController;
use \Inc\Services\WPPageService;
use \Inc\Callbacks\BaseCallbacks;

class WPPageController extends loadController{
	public $_wppage;
	public $_callbacks;
	public $_wppagesArr=array();
	public $_wpsubPagesArr=array();

	public function register(){
		$this->_wppage=new WPPageService();
		$this->_callbacks=new BaseCallbacks();
		
		$this->setPages();
		$this->setSubPages();

		$this->_wppage->addPages($this->_wppagesArr)->FsubPages('Settings')->addSubPages($this->_wpsubPagesArr)->register();
	}	
	
	public function setPages(){
		$this->_wppagesArr=[
			[
				'page_title' => 'tomB',	
				'menu_title' => 'TomB Comments',	
				'capability' => 'manage_options',	
				'menu_slug' => 'tomb_plugin',	
				'callback' => function(){ $this->_callbacks->callBackPages('settings'); },	
				'icon_url' => 'dashicons-format-status',	
				'position' => 110
			]
		];
	}
	
	public function setSubPages(){
		$this->_wpsubPagesArr=[
			[
				'parent_slug' => 'tomb_plugin',	
				'page_title' => 'Comments',	
				'menu_title' => 'All Comment',	
				'capability' => 'manage_options',	
				'menu_slug' => 'tomb_comments',	
				'callback' => function(){ $this->_callbacks->callBackPages('comments'); }
			]
		];
	}

}