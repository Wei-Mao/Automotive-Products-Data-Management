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
	background-color: #0FC;
}
</style>
</head>

<body class="linear">
<?php
if($_POST["but_prd_search"]){
	$prd_num=$_POST["prd_num"];
	$prd_style=$_POST["prd_style"];
	$prd_name=$_POST["prd_name"];
	$prd_manf=$_POST["prd_manf"];
	$prd_area=$_POST["prd_area"];
	$prd_minPrice=$_POST["prd_price1"];
	$prd_maxPrice=$_POST["prd_price2"];
	//用户输入价格是否为数字
	if(!(is_numeric($prd_minPrice)|| $prd_minPrice=="")||!(is_numeric($prd_maxPrice)|| $prd_maxPrice=="")){
	echo "<script language='javascript'>alert('价格必须为数字！');location.href='javascript:history.go(-1)';</script>";
	}
	//搜索信息不能为空
	if($prd_num==""&&$prd_minPrice==""&&$prd_maxPrice==""&&$prd_style==""&&$prd_name==""&&$prd_manf==""&&$prd_area==""){
	echo "<script language='javascript'>alert('搜索信息不能为空！');location.href='javascript:history.go(-1)';</script>";	
	
	}
	//查询条件的组装
	$sqlexp='';
	

	if(!$prd_minPrice==""){
	$sqlexp.=' and prd_price >='.$prd_minPrice;
	}
	if(!$prd_maxPrice==""){
	$sqlexp.=' and prd_price <='.$prd_maxPrice;
	}
	if(!$prd_num==""){
	$sqlexp.=" and instr(prd_num,'$prd_num')>0";
	//$sqlexp.=' and '.$prd_item.' like "%'.$prd_itemValue.'%"';
	} 
	if(!$prd_style==""){
	$sqlexp.=" and instr(prd_style,'$prd_style')>0";
	} 
	if(!$prd_name==""){
	$sqlexp.=" and instr(prd_name,'$prd_name')>0";
	} 
	if(!$prd_manf==""){
	$sqlexp.=" and instr(prd_manf,'$prd_manf')>0";
	} 
	if(!$prd_area==""){
	$sqlexp.=" and instr(prd_manf,'$prd_area')>0";
	} 
	
	//查询开始
	$result=mysql_query("select * from car_prod where 1".$sqlexp);
   
	//如果为空则弹框
	if(!@mysql_num_rows($result)){
	echo "<script language='javascript'>alert('没有符合条件的记录！');location.href='javascript:history.go(-1)';</script>";	
	}else
	 {
	?>
	
	<?php //显示?>
<table width="900" border="0" align="center" cellpadding="0" cellspacing="0" >
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
    <td width="50" height="50" align="center"><a href="prd_modify.php?prd_id=<?php echo $row[prd_id]; ?>&sql=<?php echo $sqlexp;?>">修改</a></td>
    <td width="50" height="50" align="center"><a href="prd_delete.php?prd_id=<?php echo $row[prd_id]; ?>&sql=<?php echo $sqlexp;?>" onclick="return confirm('确定将这些记录删除吗?')">删除</a></td>
  </tr>
   <?php }?>
  <?php }?>
</table>
<?php }?>

</body>
</html>