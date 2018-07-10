<?php 

if(file_exists(dirname(__FILE__, 3)).'/vendor/autoload.php'){
	require_once dirname(__FILE__, 3).'/vendor/autoload.php';
}
use Inc\Controllers\ajaxController; 

if($_SERVER['REQUEST_METHOD']=='POST'){ 
	
	$id=filter_var($_REQUEST['id'], FILTER_SANITIZE_STRING);	
	$ac=new ajaxController();
	$ac->getDelitemId($id);
}
