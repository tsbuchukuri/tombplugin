<?php
/*
@package Tomb
*/
namespace Inc\Controllers;

class ajaxController{

	public  function getDelitemId(int $id){
		$this->delComment($id);
	}

	protected function delComment(int $id){
		global $wpdb;
   		$_tablename=$wpdb->prefix.'tomb_comments';
   		$wpdb->query($wpdb->prepare("DELETE FROM $_tablename WHERE id=%d", $values['id']));
	}
}
