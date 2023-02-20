<?php 
  header("Content-Type: text/html; charset=utf-8");
  require_once("connMysql.php");
  session_start();
  
  //刪除科目資料
  $sql = "DELETE FROM subject WHERE subject_id=".$_GET["subject_id"]."";
  mysqli_query($conn, $sql);
  //刪除後，回到科目管理
  
 
  header("Location: subject_center.php");
?>
