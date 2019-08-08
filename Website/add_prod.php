<?php include("conn.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/main.css" rel="stylesheet" type="text/css" />
<title>无标题文档</title>
<style type="text/css">
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
</style>
<style type="text/css">
td{border:1px solid #999; }
table{border-collapse:collapse;}
</style>
</head>
<?php 
if($_SESSION[name]!=""){
?>
<?php 
if($_POST["but_add"]){
	$prd_num=$_POST["prd_num"];
	$prd_style=$_POST["prd_style"];
	$prd_name=$_POST["prd_name"];
	$prd_manf=$_POST["prd_manf"];
	$prd_area=$_POST["prd_area"];
	$prd_price=$_POST["prd_price"];
	//信息不能为空
	if($prd_num==""||$prd_style==""||$prd_name==""||$prd_manf==""||$prd_area==""||$prd_price==""){
	echo "<script language='javascript'>alert('产品属性值不能为空！');location.href='javascript:history.go(-1)';</script>";
	}else if(!is_numeric($prd_price)){
	//价输入格式判断
	  echo "<script language='javascript'>alert('价格必须为数字！');location.href='javascript:history.go(-1)';</script>";
    }else {
	 //添加产品
	 $sqlAdd = 'insert into car_prod(prd_num,prd_style,prd_name,prd_manf,prd_area,prd_price) values ("'.$prd_num.'","'.$prd_style.'","'.$prd_name.'","'.$prd_manf.'","'.$prd_area.'",'.$prd_price.')';
	 @mysql_query($sqlAdd);
	 echo "<script language='javascript'>alert('产品添加成功！');location.href='add_prod.php';</script>";	 
	}
}

?>
<body class="linearleft">
<form id="form1" name="form1" method="post" action="add_prod.php" target="mainFrame">
  <table width="800" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td height="50" colspan="2" align="center" bgcolor="#3399FF" style="font-family:'楷体'; font-size:20px">产品添加</td>
    </tr>
    <tr>
      <td width="50%" height="60" align="right">产品编号:</td>
      <td height="60" align="center"><label for="prd_num"></label>
        <input name="prd_num" type="text" id="prd_num" size="30" /></td>
    </tr>
    <tr>
      <td width="50%" height="60" align="right">产品型号:</td>
      <td height="60" align="center"><input name="prd_style" type="text" id="prd_style" size="30" /></td>
    </tr>
    <tr>
      <td width="50%" height="60" align="right">产品名称:</td>
      <td height="60" align="center"><input name="prd_name" type="text" id="prd_name" size="30"/></td>
    </tr>
    <tr>
      <td width="50%" height="60" align="right">产品制造商:</td>
      <td height="60" align="center"><input name="prd_manf" type="text" id="prd_manf" size="30" /></td>
    </tr>
    <tr>
      <td width="50%" height="60" align="right">产品产地:</td>
      <td height="60" align="center"><input name="prd_area" type="text" id="prd_area" size="30"/></td>
    </tr>
    <tr>
      <td width="50%" height="60" align="right">产品价格:</td>
      <td height="60" align="center"><input name="prd_price" type="text" id="prd_price" size="30" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="but_add" id="but_add" value="添加" />
        &nbsp;
        <input type="reset" name="but_reset" id="but_reset" value="重置" /></td>
    </tr>
  </table>
</form>
<?php } else {
	
echo "<script language='javascript'>alert('请登录！');location.href='javascript:history.go(-1)';</script>";	
}
	?>
</body>
</html>