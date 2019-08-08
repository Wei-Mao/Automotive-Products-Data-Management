<?php include("conn.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/main.css" rel="stylesheet" type="text/css" />
<title>显示附属零件信息</title>
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
$prd_id=$_GET["prd_id"];
$sql='select * from car_part where car_prod_prd_id='.$prd_id;
$result=@mysql_query($sql);
if(!mysql_num_rows($result)){
	echo "<script language='javascript'>alert('该产品暂未添加附属零件！');location.href='javascript:history.go(-2)';</script>";	
	}else{
?>
<body class="linear">
<table width="900" border="0" align="center" cellpadding="0" cellspacing="0" >
  <tr style="font-size:20px; font-family:'楷体'; font-weight:bold;">
    <td height="40" align="center">零件编号</td>
    <td height="40" align="center">所属产品型号</td>
    <td height="40" align="center">零件名称</td>
    <td height="40" align="center">制造商</td>
    <td height="40" align="center">产地</td>
    <td height="40" align="center">价格</td>
    <td height="40" align="center">&nbsp;</td>
    <td height="40" align="center">&nbsp;</td>
  </tr>
  <?php 
  while($row1=mysql_fetch_array($result)){
	//搜索零件对应的产品型号
  $sql2='select prd_style from car_prod where prd_id='.$row1[car_prod_prd_id];
  $result2=mysql_query($sql2);
  $row2=mysql_fetch_array($result2);
  ?>
  <tr>
    <td width="100" height="50" align="center"><?php echo $row1[prt_num]?></td>
    <td height="50" align="center"><?php echo $row2[prd_style]?></td>
    <td height="50" align="center"><?php echo $row1[prt_name]?></td>
    <td height="50" align="center"><?php echo $row1[prt_manf]?></td>
    <td height="50" align="center"><?php echo $row1[prt_manfAdr]?></td>
    <td height="50" align="center"><?php echo $row1[prt_price]?></td>
     <td width="50" height="50" align="center"><a href="part_modify.php?prt_id=<?php echo $row1[prt_id];?>">修改</a></td>
     <td width="50" height="50" align="center"><a href="part_delete.php?prt_id=<?php echo $row1[prt_id];?>" onclick="return confirm('确定将这些记录删除吗?')">删除</a></td>
  </tr>
   <?php }?>
   <?php }?>
</table>
<p>&nbsp;</p>
</body>
</html>