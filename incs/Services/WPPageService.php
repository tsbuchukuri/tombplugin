<?php
/*
@package Tomb
*/

namespace Inc\Services;

class WPPageService{
	
	public $_adminPages=array();
	public $_adminSubPages=array();
	
	public function register(){
		if(!empty($this->_adminPages)){
			add_action('admin_menu', array($this, 'addAdminMenu'));
		}
	}
	
	public function addPages(array $pages){
		$this->_adminPages=$pages;
		return $this;
	}
	
	/*
	FsubPages - first sub page like parnet page" 
	*/
	public function FsubPages(string $title=null){
		if(empty($this->_adminPages)){
			return $this;
		}
		
		$adminPage=$this->_adminPages[0];
		
		$FsubPageArr=[
			[
				'parent_slug' => $adminPage['menu_slug'],	
				'page_title' => $adminPage['page_title'],	
				'menu_title' => ($title) ? $title : $adminPage['menu_title'],	
				'capability' => $adminPage['capability'],	
				'menu_slug' => $adminPage['menu_slug'],	
				'callback' => $adminPage['callback'],	
			]
		];
		
		$this->_adminSubPages=$FsubPageArr;
		
		return $this;
	}
	
	/*
	Add subpages
	*/
	public function addSubPages(array $subPages){
		$this->_adminSubPages=array_merge($this->_adminSubPages, $subPages);
		return $this;
	}
	
	/*
	Add pages to admin menu
	*/
	public function addAdminMenu(){
		foreach($this->_adminPages as $pages){
			add_menu_page($pages['page_title'], $pages['menu_title'], $pages['capability'], $pages['menu_slug'], $pages['callback'], $pages['icon_url'], $pages['position']);
		}	
		
		foreach($this->_adminSubPages as $subPage){
			add_submenu_page($subPage['parent_slug'], $subPage['page_title'],  $subPage['menu_title'],  $subPage['capability'], $subPage['menu_slug'], $subPage['callback']);
			
		}
	}
}