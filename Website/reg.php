<?php include("conn.php");?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/main.css" rel="stylesheet" type="text/css" />
<title>用户注册</title>

<style type="text/css">
body{font-size:12px;}
td{border:1px solid #999;}
table{border-collapse:collapse;}
</style>
</head>

<body class="linear">

<?php
if($_POST["f_reg"]) //点击后就不为空
{
$uname=$_POST["f_name"];
$upass=$_POST["f_pass"];
$upass2=$_POST["f_pass2"];
if($uname=="")
{
echo "<script language='javascript'>
alert('用户名不能为空');location.href='javascript:history.go(-1)';
</script>";
} 
else
    if($upass==""||$upass2=="")
    {
	echo "<script language='javascript'>
	alert('密码不能为空');location.href='javascript:history.go(-1)';
	</script>";

    }
	else
	   if($upass!=$upass2)
	   {
		  echo "<script language='javascript'>alert('两次密码不相同');location.href='javascript:history.go(-1)';        </script>"; 
	   }
	   else
	   {
	//	$sql="insert into reg(r_name,r_pass,r_date) values('".$uname."','".$upass."','".date('Y-m-d H:i:s')."')";
	    $sql="insert into reg(r_name,r_pass,r_date) values('".$uname."','".md5($upass)."','".date('Y-m-d H:i:s')."')";
		@mysql_query($sql) or die("注册失败"); 
		echo "<script language='javascript'> alert('注册成功');location.href='javascript:history.go(-1)';</script>";
	   }
}

?>



<form id="form1" name="form1" method="post" action="reg.php" style="font-size:12px">
  <table width="300" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr >
      <td height="50" colspan="2" align="center" bgcolor="#3399FF" style="font-family:'楷体'; font-size:20px">用户注册</td>
    </tr>
    <tr>
      <td width="100" height="50" align="right">用户名：</td>
      <td height="50" align="center"><label for="f_name"></label>
      <input name="f_name" type="text" id="f_name" size="15" /></td>
    </tr>
    <tr >
      <td width="100" height="50" align="right">密码：</td>
      <td height="50" align="center"><label for="f_pass"></label>
      <input name="f_pass" type="password" id="f_pass" size="15" /></td>
    </tr>
    <tr>
      <td width="100" height="50" align="right">确认密码：</td>
      <td height="50" align="center"><label for="textfield2"></label>
      <input name="f_pass2" type="password" id="textfield2" size="15" /></td>
    </tr>
    <tr>
      <td height="50" colspan="2" align="center" valign="middle"><input type="submit" name="f_reg" id="f_reg" value="注册" />
      &nbsp; &nbsp;<input type="reset" name="f_but_reset" id="f_but_reset" value="重置" /></td>
    </tr>
  </table>
</form>

</body>
</html>