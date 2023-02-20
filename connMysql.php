<?php 
  //資料庫連線設定
  $db_host = "localhost";  //主機名稱
  $db_dbname = "courses";  //資料庫名稱
  $db_username = "root";   //資料庫使用者
  $db_password = "alice1145"; //資料庫使用者密碼 
 
  $conn=mysqli_connect($db_host, $db_username, $db_password,$db_dbname); //資料庫連線
  
  //如連線失敗顯示無法連線
  if (empty($conn)){
  print mysqli_error($conn);
  die ("無法連結資料庫");
  exit;
}
  //設定連線編碼
  mysqli_query($conn,"SET NAMES 'utf8'");
?>
