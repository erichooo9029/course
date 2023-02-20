<?php 
  header("Content-Type: text/html; charset=utf-8");
  require_once("connMysql.php");
  //確認課程名稱是否已被輸入
  $sql = "SELECT subject_name FROM subject WHERE subject_name='".$_POST["new_subject_name"]."'";
  $record = mysqli_query($conn, $sql);
  if(mysqli_num_rows($record)>0) {
    header("Location: subject_insert_form.php?registered=true&new_subject_name=".$_POST["new_subject_name"]);
  } else {
  //若此課程尚未輸入，則執行新增的動作
  // $sql = "INSERT INTO subject (subject_id,subject_name, subject_credit,student_limit,teacher_id,teacher_Name,class_Day,class_Time,class_place) VALUES (
  //'".$_POST["new_subject_id"]."',
	//'".$_POST["new_subject_name"]."',
  // '".$_POST["new_subject_credit"]."',
	//'".$_POST["new_student_limit"]."',
	//'".$_POST["new_teacher_id"]."',
	//'".$_POST["new_teacher_Name"]."',
	//'".$_POST["new_class_Day"]."',
	//'".$_POST["new_class_Time"]."',
	//'".$_POST["new_class_place"]."')";
   /// mysqli_query($conn, $sql);
   $sql = "SELECT class_Time FROM subject WHERE class_place='".$_POST["new_class_place"]."'";
  $record = mysqli_query($conn, $sql);
  // echo mysqli_num_rows($record);
  if(mysqli_num_rows($record)>0) {
	  while ($row = mysqli_fetch_assoc($record)) {
      if($row["class_Time"] == $_POST["new_class_Time"]){
        header("Location: subject_insert_form.php?registered1=true&new_class_Time=".$_POST["new_class_Time"]);
      }
	  }
    //header("Location: subject_insert_form.php?registered=true&new_class_Time=".$_POST["new_class_Time"]);
  } else {
    //若此課程尚未輸入，則執行新增的動作
    $sql = "INSERT INTO subject (subject_id,subject_name, subject_credit,student_limit,teacher_id,teacher_Name,class_place,class_Time) VALUES (
  '".$_POST["new_subject_id"]."',
	'".$_POST["new_subject_name"]."',
  '".$_POST["new_subject_credit"]."',
	'".$_POST["new_student_limit"]."',
	'".$_POST["new_teacher_id"]."',
	'".$_POST["new_teacher_Name"]."',
	'".$_POST["new_class_place"]."',
	'".$_POST["new_class_Time"]."')";
    if(mysqli_query($conn, $sql)){
      ?>
      <script language="javascript">
      alert("新科目加入成功。");
      window.location.href = "subject_center.php";
    </script>
      <?php
    }
    else{
      ?>
      <script language="javascript">
      alert("課程編號重複!!!");
      window.location.href = "subject_insert_form.php";
    </script>
     <?php   
    }
  }
  }
  
?>

