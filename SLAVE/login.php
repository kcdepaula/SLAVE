<?php
include_once 'config/config.php';
include_once 'classes/class.user.php';

$user = new User();
if($user->get_session()){
	header("location: index.php");
}
if(isset($_REQUEST['submit'])){
	extract($_REQUEST);
	$login = $user->check_login($useremail,md5($password));
	if($login){
		header("location: index.php");
	}else{
		?>
        <div id='error_notif'>Not Registered</div>
        <?php
	}
	
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>SLAVE APPAREL</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/custom.css?<?php echo time();?>">
</head>
<body style="background-image: url(css/bg-image.jpg)">
<div id="brand-block">
    <h2>SLAVE</h2>
</div>
<div id="login-block">
	<h3>Log In</h3>
	<form method="POST" action="" name="login">
	<div>
		<input type="email" class="input" required name="useremail" placeholder="Valid E-mail"/>
	</div>
	<div>
		<input type="password" class="input" required name="password" placeholder="Password"/>
	</div>
	<div>
		<input type="submit" name="submit" value="Submit"/>
	</div>
	</form>
</div>
</body>
</html>