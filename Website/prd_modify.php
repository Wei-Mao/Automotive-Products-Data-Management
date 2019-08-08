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
td{border:1px solid #999;}
table{border-collapse:collapse;}
</style>
</head>

<body class="linear">
<?php 
//修改产品信息
if($_POST[but_modify]){
   $prd_id=$_GET["prd_id"];
   $prd_num = $_POST["prd_num"];
   $prd_style = $_POST["prd_style"];
   $prd_name = $_POST["prd_name"];
   $prd_manf = $_POST["prd_manf"];
   $prd_area = $_POST["prd_area"];
   $prd_price = $_POST["prd_price"];
   //信息不能为空
	if($prd_num==""||$prd_style==""||$prd_name==""||$prd_manf==""||$prd_area==""){
	echo "<script language='javascript'>alert('价格必须为数字！');location.href='javascript:history.go(-1)';</script>";
		}
   //判断用户价格是否为数字
  if(!is_numeric($prd_price)){
	  echo "<script language='javascript'>alert('价格必须为数字！');location.href='javascript:history.go(-1)';</script>";
  }else {
   //更新产品信息
   $sql1="update car_prod set prd_num='".$prd_num."',prd_style='".$prd_style."',prd_manf='".$prd_manf."',prd_area='".$prd_area."',prd_price='".$prd_price."',prd_name='".$prd_name."'where prd_id='".$prd_id."'";
   mysql_query($sql1);
   echo "<script language='javascript'>alert('产品修改成功！');</script>";
	}
  }
	//查找要修改的产品
	$prd_id=$_GET["prd_id"];
	$sql='select * from car_prod where prd_id="'.$prd_id.'"';
	$result=mysql_query($sql);
	$row=mysql_fetch_array($result);

?>

<form id="form1" name="form1" method="post" action="prd_modify.php?prd_id=<?php echo $row[prd_id];?>" target="mainFrame">
  <table width="800" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td height="50" colspan="2" align="center" bgcolor="#3399FF" style="font-family:'楷体'; font-size:20px">产品信息修改</td>
    </tr>
    <tr>
      <td width="50%" height="60" align="right">产品编号:</td>
      <td height="60" align="center"><label for="prd_num"></label>
      <input name="prd_num" type="text" id="prd_num" size="30" value="<?php echo $row[prd_num];?>" /></td>
    </tr>
    <tr>
      <td width="50%" height="60" align="right">产品型号:</td>
      <td height="60" align="center"><input name="prd_style" type="text" id="prd_style" size="30" value="<?php echo $row[prd_style];?>" /></td>
    </tr>
    <tr>
      <td width="50%" height="60" align="right">产品名称:</td>
      <td height="60" align="center"><input name="prd_name" type="text" id="prd_name" size="30" value="<?php echo $row[prd_name];?>"/></td>
    </tr>
    <tr>
      <td width="50%" height="60" align="right">制造商:</td>
      <td height="60" align="center"><input name="prd_manf" type="text" id="prd_manf" size="30" value="<?php echo $row[prd_manf];?>" /></td>
    </tr>
    <tr>
      <td width="50%" height="60" align="right">产地:</td>
      <td height="60" align="center"><input name="prd_area" type="text" id="prd_area" size="30" value="<?php echo $row[prd_area];?>"/></td>
    </tr>
    <tr>
      <td width="50%" height="60" align="right">价格:</td>
      <td height="60" align="center"><input name="prd_price" type="text" id="prd_price" size="30" value="<?php echo $row[prd_price];?>" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"> <input type="submit" name="but_modify" id="but_modify" value="提交"  onclick="return confirm('确定要修改这些记录吗?')" />       </td>
    </tr>
  </table>
</form>
</body>
</html>