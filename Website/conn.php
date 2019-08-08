<?php
session_start();  //开启SESSION 变量
$conn=@mysql_connect("localhost","root","root") or die('链接失败!');
@mysql_select_db("cardb",$conn) or die('数据库打开失败！'); //注意数据库名词的变化
mysql_query("set names 'utf8'");
if($_GET[act]=="logout"){
//session_destroy();//消除所有session变量
$_SESSION[name] = "";
$_SESSION[pass] = "";
echo "<script language='javascript'>
	alert('退出成功');location.href='top.php';
	</script>";

}
?>