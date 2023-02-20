<?php 
  header("Content-Type: text/html; charset=utf-8");
  session_start();
  //檢查是否已登入
if(!isset($_SESSION['usr_id'])) {
	header("Location: login.html");
	exit;
}
 require_once("connMysql.php");
?>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>科目管理子系統</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">
</head>
<body>
<table width="800" border="0" align="center" cellpadding="4" cellspacing="0">
  <tr valign="top">
    <td>
      <p><font size="6" color="#FF0000">選課系統</font></p>
      <hr size="1" />
    	<p>歡迎光臨選課系統</p>
    </td></tr>
    <tr><td><a href="index1.php">回管理系統</a></td></tr>
</table>
<table width="800" border="1" class="striped" align="center" cellpadding="0" cellspacing="0">      <?php 
          require_once("connMysql.php");
          //查詢登入者帳號資料
          $sql = "SELECT * FROM login WHERE id = ".$_SESSION['usr_id']."";
          $record = mysqli_query($conn,$sql);
         //輸出資料庫查詢內容
          echo "<tr><td>帳號名稱</td><td>email</td><td>密碼</td></tr>";
          while( $row = mysqli_fetch_assoc($record)){
            echo "<tr>";
            echo "<td>". $row['name']."</td>";
            echo "<td>". $row['email']."</td>";
            echo "<td>". $row['password']. "</td>";
            echo "</tr>";
           }


       ?>
   
</table>
</body>
</html>
