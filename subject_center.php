<?php 
  header("Content-Type: text/html; charset=utf-8");
  session_start();
  //檢查是否已登入

if(!isset($_SESSION['usr_id'])) {
	header("Location: index.php");
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
      <p><font size="6" color="#FF0000">選課管理系統</font></p>
      <hr size="1" />
    	<p>歡迎光臨科目管理子系統</p>
    </td></tr>
    <tr><td><a href="subject_insert_form.php">新增科目</a> 
			<a href="index.php">回管理系統</a></td></tr>
</table>
<table width="800" border="1"class="highlight" align="center" cellpadding="0" cellspacing="0">      <?php 
          require_once("connMysql.php");
          //查詢課程資料
          $sql = "SELECT * FROM subject";
          $record = mysqli_query($conn,$sql);
         //輸出查詢課程資料與查詢修改功能
          echo "<tr><td>課程編號</td><td>科目名稱</td><td>學分數</td><td>人數上限</td><td>老師代號</td><td>老師姓名</td><td>星期幾/節次</td><td>教室</td><td>功能</td></tr>";
          while( $row = mysqli_fetch_array($record)){
            echo "<tr>";
            echo "<td>". $row['subject_id']."</td>";
            echo "<td>". $row['subject_name']."</td>";
            echo "<td>". $row['subject_credit']. "</td>";
            echo "<td>". $row['student_limit']. "</td>";
            echo "<td>". $row['teacher_id']. "</td>";
            echo "<td>". $row['teacher_Name']. "</td>";           
            echo "<td>". $row['class_Time']. "</td>";
            echo "<td>". $row['class_place']. "</td>";
            echo "<td width='100'>
            <a href=subject_update_form.php?subject_id=";
            echo $row['subject_id'] ;
            echo ">修改</a>  ";
            echo "<a href=subject_delete.php?subject_id=";
            echo $row['subject_id'] ;
            echo ">刪除</a></td>";
            echo "</tr>";
           }


       ?>
   
</table>
</body>
</html>
