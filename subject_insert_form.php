<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>科目管理子系統</title>
  <script language="javascript">
  //檢查表單輸入格式
  function check_form() {
	  var acct1 = document.form1.new_class_Time.value;
	  var acct = document.form1.new_subject_name.value;
	  if(acct=="") {		
		  alert("請填寫科目!");
		  return false;
	  } 
		if(acct.length<2 || acct.length>20){
			alert( "科目名稱長度只能2至20個字元!");
			return false;
		}
	  var pw1 = document.form1.new_subject_credit.value;
	  if(pw1=="") {S
		  alert("學分數不可以空白!");
		  return false;
	  }
	  return confirm("確定送出？");
  }
  </script>
  
</head>
<body>
<table width="800" border="0" align="center" cellpadding="4" cellspacing="0">
  <tr valign="top">
    <td width="600">
    	<form name="form1" method="post" action="subject_insert.php" onSubmit="return check_form();">
        <p><font size="6" color="#FF0000">加入科目</font></p>
		<?php if(isset($_GET["registered"])){?>
          <div style="color:red;"> <?php echo @$_GET["new_subject_name"];echo "已經有此科目！";?> </div>
        <?php }?>
		
		<?php if(isset($_GET["registered1"])){?>
          <div style="color:red;"> <?php echo $_GET["new_class_Time"];echo "節次已經有課了！";?> </div>
        <?php }?>
		<div>
          <hr size="1" />
		  <p><strong>課程編號</strong>：
          	<input type="text" name="new_subject_id">
          	<font color="#FF0000">*</font>
          </p>
          <p><strong>科目名稱</strong>：
          	<input type="text" name="new_subject_name">
          	<font color="#FF0000">*</font>
          </p>
          <p><strong>學分數</strong>：
            <input type="text" name="new_subject_credit">
            <font color="#FF0000">*</font>
          </p>
		  <p><strong>修課人數上限</strong>：
            <input type="text" name="new_student_limit">
            <font color="#FF0000">*</font>
          </p>
		  <p><strong>授課老師代號</strong>：
            <input type="text" name="new_teacher_id">
            <font color="#FF0000">*</font>
          </p>
		  <p><strong>授課老師姓名</strong>：
            <input type="text" name="new_teacher_Name">
            <font color="#FF0000">*</font>
          </p>   
		       
		  <p><strong>星期幾哪幾節</strong>：
            <input type="text" name="new_class_Time">
            <font color="#FF0000">*</font>
          </p>
		  <p><strong>教室</strong>：
            <input type="text" name="new_class_place">
            <font color="#FF0000">*</font>
          </p>
          <p><font color="#FF0000">*</font> 表示為必填的欄位</p>
        </div>
        <hr size="1" />
        <p align="center">
          <input type="submit" name="join" value="加入新科目">
          <input type="reset" name="reset" value="重設資料">
        </p>
      </form>
    </td>
  </tr>
</table>
</body>
</html>