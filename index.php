<?php
//檢查session是否存在，若不存在則轉回登入首頁
session_start();

if(!isset($_SESSION['usr_id'])) {
	header("Location: login.html");
	exit;
}

?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>課程管理系統 - 首頁</title> 

</head>
<body>
<table width="250" border="1" align="center">
  <tr valign="top">
    <td align="center">
      <p>選課管理系統</p>
 <div align="center">
   <p align="center">
    <a href="subject_center.php">科目管理</a><br>
	<a href="student_data.php">帳號管理</a><br>
  <a href="logout.php">登出</a><br>
  </p>
</div>
 
    </td>
  </tr>
</table>
</body>
</html>
