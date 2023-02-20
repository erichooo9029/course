<?php 
  header("Content-Type: text/html; charset=utf-8");
  require_once("connMysql.php");
  session_start();
 
  //查詢科目資料
  $sql = "SELECT * FROM subject WHERE subject_id='".$_GET["subject_id"]."'";
  $record = mysqli_query($conn, $sql);	
  $row = mysqli_fetch_array($record); 
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>科目管理子系統</title>
<script language="javascript">
//檢查欄位是否有填
function check_form() {
  if(document.form1.new_subject_name.value=="") {
    alert("請填寫科目!");
    return false;
  }
  if(document.form1.new_subject_credit.value=="") {
    alert("請填寫學分數!");
    return false;
  }
  return confirm('確定送出嗎？');
}
</script>

</head>
<body>
<table width="800" border="0"   align="center" cellpadding="4" cellspacing="0">
  <tr valign="top">
    <td width="600">
      <form action="subject_update.php" method="POST" name="form1" onSubmit="return check_form();">
        <p><font size="6" color="#FF0000">修改科目資料</font></p>
        <div>
          <hr size="1" />
		  <p><strong>課程編號</strong>：
            <input name="new_subject_id" type="text" value="<?php echo $row["subject_id"];?>">
            <font color="#FF0000">*</font>
          </p>
          <p><strong>科目名稱</strong>：
            <input name="new_subject_name" type="text" value="<?php echo $row["subject_name"];?>">
            <font color="#FF0000">*</font>
          </p>
          <p><strong>學分數</strong>：
            <input name="new_subject_credit" type="text" value="<?php echo $row["subject_credit"];?>">
            <font color="#FF0000">*</font>
          </p>
          <p><strong>修課人數上限</strong>：
            <input type="text" name="new_student_limit" value="<?php echo $row["student_limit"];?>">
            <font color="#FF0000">*</font>
          </p>
		  <p><strong>授課老師代號</strong>：
            <input type="text" name="new_teacher_id" value="<?php echo $row["teacher_id"];?>">
            <font color="#FF0000">*</font>
          </p>
		  <p><strong>授課老師姓名</strong>：
            <input type="text" name="new_teacher_Name" value="<?php echo $row["teacher_Name"];?>">
            <font color="#FF0000">*</font>
          </p>   		       
		  <p><strong>星期幾哪幾節</strong>：
            <input type="text" name="new_class_Time" value="<?php echo $row["class_Time"];?>">
            <font color="#FF0000">*</font>
          </p>
		  <p><strong>教室</strong>：
            <input type="text" name="new_class_place" value="<?php echo $row["class_place"];?>">
            <font color="#FF0000">*</font>
          </p>
          <p><font color="#FF0000">*</font> 表示為必填的欄位</p>
        </div>
        <hr size="1" />
        <p align="center">
          <input name="id" type="hidden" value="<?php echo $row["subject_id"];?>">
          <input type="submit" name="update" value="修改資料">
          <input type="reset" name="reset" value="重設資料">
        </p>
      </form>
    </td>
   
  </tr>
</table>
</body>
</html>
