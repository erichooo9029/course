<?php 
  header("Content-Type: text/html; charset=utf-8");
  require_once("connMysql.php");
  session_start();
  
  //刪除科目資料
  $sql = "DELETE  FROM studentselectclass WHERE cid=".$_GET["subject_id"]."";
  mysqli_query($conn, $sql);
  //刪除後，回到科目管理
?>
<script language="javascript">
  alert("科目刪除成功。");
  window.location.href = "student_subject_center.php";
</script>