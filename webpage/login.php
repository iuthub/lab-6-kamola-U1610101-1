<?php
		session_start();
		if(isset($_POST['logout'])){
			$_SESSION['flag']=false;
			$_SESSION['error']=false;
		}else{
			if(!empty($_POST['login']) && !empty($_POST['password'])){
				$data = file_get_contents("data.txt");
				$name = null;
				$password = null;
				$input_name = $_POST['login'];
				$input_password = $_POST['password'];
			
				$data = explode(";", $data);
				$name = $data[0];
				$password = $data[1];
				if($name==$input_name && $password==$input_password){
					$_SESSION['flag']=true;
					$_SESSION['error']=false;
				}else{
					$error=true;
					$flag = false;
				}
			}else{
				$flag=false;
				$error=true;
			}
		}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>

	<style type="text/css">
			body{
				padding: 0;
				margin: 0;
				box-sizing: border-box;
			}
			.image{
				text-align: center;
				width: 100vw;
				height: 50%;
			}
			.image>img{
				width: 50%;
			}
			form{
				text-align: center;
				width: 50%;
				margin: 25px auto;
			}
			.error{
				width: 100%;
				background-color: red;
				color: white;
				text-align: center;
			}
	</style>
</head>
<body>
		<?php if($error){ ?>
			<div class="error">
				<h3>Error Occured!</h3>
			</div>
		<?php } ?>

		<?php if($flag){ ?>
	
		<div class="image">
			<img src="secret.jpg">	
		</div>

		<form action="login.php" method="post">
			<input type="hidden" name="logout" value="true">
			<button type="submit">Log out</button>
		</form>

		<?php }else{ ?>
			<form action="login.php" method='post'>
				<fieldset>
					<legend>Login</legend>
					<input type="text" name="login">
				</fieldset>

				<fieldset>
					<legend>Password</legend>
					<input type="password" name="password">
				</fieldset>			
				<br>
				<button type="submit">Log in</button>
			</form>
		<?php } ?>
</body>
</html>
