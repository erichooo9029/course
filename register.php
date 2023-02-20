<?php
session_start();
//檢查session是否存在
if(isset($_SESSION['usr_id'])) {
	header("Location: index.php");
}
//連接資料庫
include_once 'connMysql.php';

//預設錯誤信息為false
$error = false;

//檢查送出表單的值是否存在
if (isset($_POST['signup'])) {
	$name = $_POST['name'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$cpassword = $_POST['cpassword'];
	
	//檢查表單輸入格式
	if (!preg_match("/^[a-zA-Z0-9]+$/",$name)) {
		$error = true;
		$name_error = "只接受英文字母與數字";
	}	
	if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
		$error = true;
		$email_error = "請輸入有效的電子郵件信箱";
	}
	if(strlen($password) < 6) {
		$error = true;
		$password_error = "密碼至少需要6個字";
	}
	if($password != $cpassword) {
		$error = true;
		$cpassword_error = "請輸入相同的密碼";
	}
	if (!$error) {
		if(mysqli_query($conn, "INSERT INTO login(name,email,password) VALUES('" . $name . "', '" . $email . "', '" . md5($password) . "')")) {
			$successmsg = "註冊成功!! <a href='login.php'>請點此轉至登入頁面</a>";
		} else {
			$errormsg = "註冊失敗，請重新註冊一次!";
		}//md5加密
	}
}
?>

<!DOCTYPE html> 
<html>
<head> 
	<title>使用者註冊</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport" >
	<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">
</head>
<body>
<div>
	<div class="row">
		<div class="col-md-4 col-md-offset-4 well">
			<form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="signupform">
				<fieldset>
					<legend>註冊</legend>

					<div class="form-group">
						<label for="name">註冊帳號</label>
						<input type="text" name="name" placeholder="請輸入帳號" required value="<?php if($error) echo $name; ?>" class="form-control" />
						<span class="text-danger"><?php if (isset($name_error)) echo $name_error; ?></span>
					</div>
					
					<div class="form-group">
						<label for="name">電子郵件信箱</label>
						<input type="text" name="email" placeholder="請輸入Email" required value="<?php if($error) echo $email; ?>" class="form-control" />
						<span class="text-danger"><?php if (isset($email_error)) echo $email_error; ?></span>
					</div>

					<div class="form-group">
						<label for="name">輸入密碼</label>
						<input type="password" name="password" placeholder="請輸入密碼" required class="form-control" />
						<span class="text-danger"><?php if (isset($password_error)) echo $password_error; ?></span>
					</div>

					<div class="form-group">
						<label for="name">密碼確認</label>
						<input type="password" name="cpassword" placeholder="再輸入一次密碼" required class="form-control" />
						<span class="text-danger"><?php if (isset($cpassword_error)) echo $cpassword_error; ?></span>
					</div>

					<div class="form-group">
						<input type="submit" name="signup" value="註冊" class="btn btn-primary" />
					</div>
				</fieldset>
			</form>
			<span class="text-success"><?php if (isset($successmsg)) { echo $successmsg; } ?></span>
			<span class="text-danger"><?php if (isset($errormsg)) { echo $errormsg; } ?></span>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4 col-md-offset-4 text-center">	
		您已經註冊了嗎? <a href="login.php">登入</a>
		<a href="login.html">回首頁</a>
		</div>
	</div>
</div>
<script src="js/jquery-1.10.2.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>



