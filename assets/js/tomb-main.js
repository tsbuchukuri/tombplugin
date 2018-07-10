jQuery(document).ready(function($){
}); 

function delitem(id){
	var conf=confirm('Are you sure you want to delete this comment?');
	if(conf){
		jQuery.ajax({
			type:'POST',
			url: ajaxurl+'incs/callbacks/ajaxCallbacks.php',
			data: {id:id},
			dataType: 'JSON',
			success: function(data){ 
				jQuery("#itm"+id).remove();
			}
		});
	}//end confirm

}