<?php
if(isset($_POST['send'])){
	$fname=filter_var($_POST['fname'], FILTER_SANITIZE_STRING);
	$email=filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
	$message=filter_var($_POST['message'], FILTER_SANITIZE_STRING);

	$insertData=['fname'=> $fname, 'email'=> $email, 'message'=> $message];
	Inc\Shortcodes\AddComment::getValues($insertData);
}
?>
<form action="#" method="post" class="tomb">
	<input type="text" class="form-control" name="fname" placeholder="First Name" required />
	<input type="email" class="form-control" name="email" placeholder="E-mail" required />
	<textarea class="form-control" name="message" placeholder="Message" required></textarea>
	<button type="submit" class="btn btn-success" name="send">Send</button>
</form>