<?php include("conn.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/main.css" rel="stylesheet" type="text/css" />
<title>删除产品</title>
<style type="text/css">
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-color: #0FC;
}
</style>
<style type="text/css">
td{border:1px solid #999; }
table{border-collapse:collapse;}
</style>
</head>
<body class="linear">
<?php 
	$prd_id=$_GET["prd_id"];//获取删除产品的ID
	$sqlexp=$_GET["sql"];   //获取用户筛选条件
	$sql_del='delete from car_prod where prd_id="'.$prd_id.'"';
	//echo $sql_del;
	@mysql_query($sql_del);
	echo "<script language='javascript'>alert('删除成功！');</script>";
	//显示删除后的结果
	$result=mysql_query("select * from car_prod where 1".$sqlexp);
	//如果为空则弹框
	if(!@mysql_num_rows($result)){
	echo "<script language='javascript'>alert('删除后无符合条件的记录！');location.href='inf_search.php';</script>";	
	}else{
?>
<table width="900" border="0" align="center" cellpadding="0" cellspacing="0" >
  <tr style="font-size:30px; font-family:'楷体'; font-weight:bold;" >
  <td colspan="9" align="center">删除后的产品记录查询结果</td>
  </tr>
  
  <tr style="font-size:20px; font-family:'楷体'; font-weight:bold;">
    <td height="40" align="center">产品编号</td>
    <td height="40" align="center">产品型号</td>
    <td height="40" align="center">产品名称</td>
    <td height="40" align="center">制造商</td>
    <td height="40" align="center">产地</td>
    <td height="40" align="center">价格</td>
    <td height="40" align="center">&nbsp;</td>
    <td height="40" align="center">&nbsp;</td>
    <td height="40" align="center">&nbsp;</td>
  </tr>
   <?php 
  while($row=mysql_fetch_array($result)){
  ?>
  <tr>
    <td width="100" height="50" align="center"><?php echo $row[prd_num]?></td>
    <td height="50" align="center"><?php echo $row[prd_style]?></td>
    <td height="50" align="center"><?php echo $row[prd_name]?></td>
    <td height="50" align="center"><?php echo $row[prd_manf]?></td>
    <td height="50" align="center"><?php echo $row[prd_area]?></td>
    <td height="50" align="center"><?php echo $row[prd_price]?></td>
    <td width="100" height="50" align="center"><a href="inf_part.php?prd_id=<?php echo $row[prd_id]; ?>">零件信息</a></td>
    <td width="50" height="50" align="center"><a href="prd_modify.php?prd_id=<?php echo $row[prd_id]; ?>">修改</a></td>
    <td width="50" height="50" align="center"><a href="prd_delete.php?prd_id=<?php echo $row[prd_id]; ?>&sql=<?php echo $sqlexp;?>" onclick="return confirm('确定将这些记录删除吗?')">删除</a></td>
  </tr>
   <?php }?>
   <?php }?>
</body>
</html>