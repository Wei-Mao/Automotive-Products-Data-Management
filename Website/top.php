<?php include("conn.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="css/main.css" rel="stylesheet" type="text/css" />

<style type="text/css">
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;	
}
</style>

</head>
<?php
if($_POST["f_log"]){ //点击后就不为空 
$uname=$_POST["f_name"];
$upass=$_POST["f_pass"];


	if($uname==""){
	echo "<script language='javascript'>
	alert('用户名不能为空');location.href='javascript:history.go(-1)';
	</script>";
	} else if($upass==""){
	echo "<script language='javascript'>
	alert('密码不能为空');location.href='javascript:history.go(-1)';
	</script>";
    } else{
    $sql="select * from reg where r_name='".$uname."' and r_pass='".md5($upass)."'";
	$query=mysql_query($sql);
	$num=mysql_num_rows($query);
    if ($num == 0){
		 echo "<script language='javascript'> alert('用户名或者密码错');location.href='top.php';    </script>";
	}else{
    $_SESSION[name] = $uname;
	$_SESSION[pass] = $upass;
    }
	}
	
}
?>


<body class="linear">
<table width="998" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="200" height="71"><img src="images/header_logo_cdhk.png" width="148" height="71" /></td>
    <td width="39%" height="71" align="center"><span style="font-family:'楷体'; font-size:30px; font-weight:bold;">上海同济汽车产品数据管理系统</span></td>
    <td width="200" height="71" align="right"><img src="images/header_logo_tongji.png" width="160" height="71" /></td>
  </tr>
  <tr height="20">
    <td colspan="3"></td>
  </tr>
  <tr>
     <td colspan="3"> 
     <form id="form1" name="form1" method="post" action="top.php">
  <table width="1002" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
    <?php if ($_SESSION[name]==""){?>
      <td width="25%">用户名：
        <label for="f_name"></label>
      <input name="f_name" type="text" id="f_name" size="20" /></td>
      <td width="25%">密码：
        <label for="f_pass"></label>
      <input name="f_pass" type="password" id="f_pass" /></td>
      <td width="10%" align="center" valign="middle"><input type="submit" name="f_log" id="f_log" value="登陆" align="middle"/></td>
      <?php }else {
      echo '<td align="center" width="40%"> 登陆成功</td>';
	 
  }
      ?>
      <?php if($_SESSION[name]!=""){?>
      <td width="10%" align="center" valign="middle" ><a href="top.php?act=logout" target="topFrame">退出</a></td>
      <?php }?>
      <td width="10%" align="center" valign="middle"><a href="reg.php" target="mainFrame">注册</a></td>
      <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
      <td ><?php echo date('Y-m-d').'    星期'.cnWeek(date('Y-M-d'));
	  function cnWeek($date){
  $arr = array('天','一','二','三','四','五','六');
  return $arr[date('w',strtotime($date))];}
    ?></td>
    </tr>
  </table>
</form>
     
     
     
     </td>
  </tr>
</table>



<p>&nbsp;</p>

</body>
</html>
