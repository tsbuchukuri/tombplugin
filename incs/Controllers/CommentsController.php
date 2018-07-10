<?php
/*
@package Tomb
*/

namespace Inc\Controllers;
use Inc\Controllers\LoadController;

class CommentsController extends LoadController{
	public $_getcomments;
	public $_editcomments;
    private $_notices;

	public function getComments(){
		global $wpdb;
	   	$_tablename=$wpdb->prefix.$this->_wpdbname;
		$this->_getcomments=$wpdb->get_results("SELECT * FROM $_tablename");
		return $this->_getcomments;
	}

	public function editComments(int $comid){
		global $wpdb;
	   	$_tablename=$wpdb->prefix.$this->_wpdbname;
		$this->_editcomments=$wpdb->get_results( "SELECT * FROM $_tablename WHERE id=$comid" );
		return $this->_editcomments;
	}

	public  function getValues($values){
		 $this->updateComment($values);
	}
	
	protected function updateComment($values){
   		global $wpdb;
   		$_tablename=$wpdb->prefix.$this->_wpdbname;
   		$wpdb->query($wpdb->prepare("UPDATE $_tablename SET firstname=%s, email=%s, message=%s, status=%d WHERE id=%d", 
   			$values['fname'], $values['email'], $values['message'], $values['status'], $values['id']
   		));

   		if($wpdb->last_error!==''){
   			$this->_notices='Comment can not update';
   			$this->errorNotice($this->_notices);
   			// $wpdb->print_error();
   		}else{
   			$this->_notices='Comment updated';
   			$this->updateNotice($this->_notices);
   		}
	}
}