<?php
/*
*@package tomb
*/
if(defined(WP_UNISTALL_PLUGIN)){
	die;
}

global $wpdb;

$wpdb->query("DELETE * FROM somwhere WHERE id=2");