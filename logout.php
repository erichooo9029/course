<?php
//session開始，此程式碼要放在最上方
session_start();
//檢查session是否存在
if(isset($_SESSION['usr_id'])) {
	//刪除登入session
	session_destroy();
	unset($_SESSION['usr_id']);
	unset($_SESSION['usr_name']);
	header("Location: login.html");
} else {
	//轉向回到首頁
	header("Location: login.html");
}
?>