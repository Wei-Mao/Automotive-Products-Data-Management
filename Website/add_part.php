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
	$prt_num=$_POST["prt_num"];
	$prt_name=$_POST["prt_name"];
	$prt_manf=$_POST["prt_manf"];
	$prt_manfAdr=$_POST["prt_manfAdr"];
	$prt_price=$_POST["prt_price"];
	$car_prod_prt_id=$_POST["car_prod_prd_id"];
	//信息不能为空
	if($prt_num==""||$prt_name==""||$prt_manf==""||$prt_manfAdr==""||$prt_price==""){
	echo "<script language='javascript'>alert('零件属性值不能为空！');location.href='javascript:history.go(-1)';</script>";
	}else if(!is_numeric($prt_price)){
	//价输入格式判断
	  echo "<script language='javascript'>alert('价格必须为数字！');location.href='javascript:history.go(-1)';</script>";
    }else {
	 //添加零部件
	 $sqlAdd = 'insert into car_part(prt_num,prt_name,prt_manf,prt_manfAdr,prt_price,car_prod_prd_id) values ("'.$prt_num.'","'.$prt_name.'","'.$prt_manf.'","'.$prt_manfAdr.'",'.$prt_price.','.$car_prod_prd_id.')';
	 @mysql_query($sqlAdd);
	echo "<script language='javascript'>alert('零部件添加成功！');location.href='add_part.php';</script>";	  
	}
	
}

?>
<body class="linearleft">
<form id="form1" name="form1" method="post" action="add_part.php" target="mainFrame">
  <table width="800" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td height="50" colspan="2" align="center" bgcolor="#3399FF" style="font-family:'楷体'; font-size:20px">零部件添加</td>
    </tr>
    <tr>
      <td width="50%" height="50" align="right">零部件编号:</td>
      <td height="50" align="center"><label for="prt_num"></label>
      <input name="prt_num" type="text" id="prt_num" size="30" /></td>
    </tr>
    <tr>
      <td width="50%" height="50" align="right">零部件名称:</td>
      <td height="50" align="center"><input name="prt_name" type="text" id="prt_name" size="30"/></td>
    </tr>
    <tr>
      <td width="50%" height="50" align="right">零部件制造商:</td>
      <td height="50" align="center"><input name="prt_manf" type="text" id="prt_manf" size="30" /></td>
    </tr>
    <tr>
      <td width="50%" height="50" align="right">零部件产地:</td>
      <td height="50" align="center"><input name="prt_manfAdr" type="text" id="prt_area" size="30"/></td>
    </tr>
    <tr>
      <td width="50%" height="50" align="right">零部件价格:</td>
      <td height="50" align="center"><input name="prt_price" type="text" id="prt_price" size="30" /></td>
    </tr>
    <tr>
      <td width="50%" height="50" align="right">零部件所属产品型号:</td>
      <td height="50" align="center"><label for=""></label>
        <select name="car_prod_prd_id" id="car_prod_prd_id" style="width:auto;">
        <?php 
		$sql='select * from car_prod';
		$resultQur=@mysql_query($sql);
		while($row=mysql_fetch_array($resultQur)){
		?>
        <option value=<?php echo $row[prd_id];?>><?php echo $row[prd_style];?></option>
        <?php }?>
      </select></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="but_add" id="but_add" value="添加" />
        &nbsp;&nbsp;<input type="reset" name="button" id="button" value="重置" />
        </td>
    </tr>
  </table>
</form>
<?php } else {
	
echo "<script language='javascript'>alert('请登录！');location.href='javascript:history.go(-1)';</script>";	
}
	?>
</body>
</html>