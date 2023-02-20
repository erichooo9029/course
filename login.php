<?php
session_start();
if(isset($_SESSION['usr_id'])!="") {
	header("Location: index.php");
}
include_once 'connMysql.php';//引用connMysql.php
//檢查輸入表單及設定session
if (isset($_POST['login'])) {
	$name = $_POST['name'];//接收輸入帳號
	$password = $_POST['password'];//接收輸入密碼
	$result = mysqli_query($conn, "SELECT * FROM login WHERE name = '" . $name. "' and password = '" . md5($password) . "'" );//查詢資料庫中login的帳號密碼,md5加密
	if ($row = mysqli_fetch_array($result)) {//比對帳號密碼
		$_SESSION['usr_id'] = $row['id'];
		$_SESSION['usr_name'] = $row['name'];
		$_SESSION['usr_admin'] = $row['admin'];
		if($_SESSION['usr_admin']=="1"){     //檢查登入帳號權限
		header("Location: index.php");
		}else {
			header("Location: index1.php");
		}
	} else {
		$errormsg = "帳號或密碼不正確";
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>登入</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport" >
	<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">
</head>
<body>
<div>
	<div class="row">
		<div class="col-md-4 col-md-offset-4 well">
			<form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="loginform">
				<fieldset>
					<legend>登入</legend>
					
					<div class="form-group">
						<label for="name">帳號</label>
						<input type="text" name="name" placeholder="請輸入帳號" required class="form-control" />
					</div>
			

					<div class="form-group">
						<label for="name">密碼</label>
						<input type="password" name="password" placeholder="請輸入密碼" required class="form-control" />
					</div>

					<div class="form-group">
						<input type="submit" name="login" value="登入" class="btn btn-primary" />
					</div>
				</fieldset>
			</form>
			<span class="text-danger"><?php if (isset($errormsg)) { echo $errormsg; } ?></span>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4 col-md-offset-4 text-center">	
		您是新的使用者嗎? <a href="register.php">註冊</a>
		<a href="login.html">回首頁</a>
		</div>
	</div>
</div>

<script src="js/jquery-1.10.2.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
