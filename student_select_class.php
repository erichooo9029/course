<?php
header("Content-Type: text/html; charset=utf-8");
session_start();
require_once("connMysql.php");
//查詢課程資料
// $sql = "SELECT class_Time FROM subject INNER JOIN studentselectclass WHERE class_Time='".$_GET["class_Time"]."'";
$sql = "SELECT class_Time  FROM subject INNER JOIN studentselectclass WHERE studentselectclass.suid='".$_SESSION['usr_id']."' And subject.subject_id=studentselectclass.cid And class_Time='".$_GET["class_Time"]."'";
  $record = mysqli_query($conn, $sql);
  echo mysqli_num_rows($record);
  if(mysqli_num_rows($record)>0) {
	  while ($row = mysqli_fetch_assoc($record)) {
		if($row["class_Time"] == $_GET["class_Time"]){
			header("Location: student_subject_center.php?registered=true&class_Time=".$_GET["class_Time"]);
		}
	}
    //header("Location: subject_insert_form.php?registered=true&new_class_Time=".$_POST["new_class_Time"]);
  } else {
      $sql = "INSERT INTO studentselectclass (suid,cid) VALUES (  
    '".$_SESSION['usr_id']."',
    '".$_GET["subject_id"]."')";
      mysqli_query($conn, $sql);
      
  }
  

  // if(mysqli_query($conn, $sql)){
  //   ?>
  <script language="javascript">
     alert("選課成功。");
     window.location.href = "student_subject_center.php";
   </script>
     <!-- <script language="javascript">
     alert("新科目加入成功。");
     window.location.href = "student_subject_center.php";
   </script> -->
    <?php
  // }
  // else{
  //   echo "a";
  // }

?>








