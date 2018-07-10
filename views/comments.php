<?php use Inc\Controllers\CommentsController; 
$ComController=new CommentsController(); ?>
<script type="text/javascript">
    var ajaxurl = "<?php echo plugin_dir_url(dirname(__FILE__, 1)); ?>";
</script>

<section class="tomb">
	<div class="container">
		<?php if(!isset($_GET['comid'])){ ?>
	<h1 class="titleHeader">tomb comments</h1>
		<div class="table-responsive">
			<table class="table">
				<thead>
					<tr>
						<td width="5%">#</td>
						<td width="50%">Fisrt Name</td>
						<td width="25%">Date</td>
						<td width="20%">Settings</td>
					</tr>
				</thead>
				<tbody>
					<?php 
					$getComments=$ComController->getComments();
					$num=1;	
					foreach ($getComments as $getComment){ ?>
					<tr id="itm<?php echo $getComment->id; ?>">
						<td><?php echo $num; ?></td>
						<td><?php echo $getComment->firstname; ?></td>
						<td><?php echo $getComment->date; ?></td>
						<td>
							<a href="admin.php?page=tomb_comments&comid=<?php echo $getComment->id; ?>" class="btn btn-warning">Edit</a>
							<a class="btn btn-danger" onClick="delitem('<?php echo $getComment->id; ?>');">Delete</a>
						</td>
					</tr>
					<?php $num++; } ?>
				</tbody>
			</table>
		</div>
		<?php }else{
			$comid=filter_var($_GET['comid'], FILTER_VALIDATE_INT);
			if(isset($_POST['send'])){
				$fname=filter_var($_POST['fname'], FILTER_SANITIZE_STRING);
				$email=filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
				$message=filter_var($_POST['message'], FILTER_SANITIZE_STRING);
				$status=filter_var($_POST['status'], FILTER_VALIDATE_INT);

				$updatetData=['id'=> $comid, 'fname'=> $fname, 'email'=> $email, 'message'=> $message, 'status'=> $status];
				$ComController->getValues($updatetData);
			}
			$editComments=$ComController->editComments($comid);
			?>
			<h1 class="titleHeader">view/edit comments</h1>
			<a class="back" href="admin.php?page=tomb_comments">< back</a>
				<?php foreach ($editComments as $editComment){ ?>
				<form action="admin.php?page=tomb_comments&comid=<?php echo $comid; ?>" method="post" class="comentsForm">
					<label>first name</label>
					<input type="text" class="form-control" name="fname" placeholder="First Name" value="<?php echo $editComment->firstname; ?>" required />
					<label>email</label>
					<input type="email" class="form-control" name="email" placeholder="E-mail" value="<?php echo $editComment->email; ?>"  required />
					<label>status</label>
					<select class="form-control" name="status" required>
						<option value="0"<?php echo $ComController->setActive(0, $editComment->status); ?>>inactive</option>
						<option value="1"<?php echo $ComController->setActive(1, $editComment->status); ?>>active</option>
					</select>
					<label>message</label>
					<textarea class="form-control" name="message" placeholder="Message" required><?php echo $editComment->message; ?></textarea>
					<button type="submit" class="btn btn-success" name="send">Send</button>
				</form>
				<?php } ?>
		<?php } ?>
	</div>
</section>



