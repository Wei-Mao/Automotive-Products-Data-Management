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
   $prt_id=$_GET["prt_id"];
   $prt_num = $_POST["prt_num"];
   $prt_name = $_POST["prt_name"];
   $prt_manf = $_POST["prt_manf"];
   $prt_manfAdr = $_POST["prt_manfAdr"];
   $prt_price = $_POST["prt_price"];
   $car_prod_prd_id = $_POST["car_prod_prd_id"];
   //信息不能为空
	if($prt_num==""||$prt_name==""||$prt_manf==""||$prt_manfAdr==""){
	echo "<script language='javascript'>alert('零件属性不能为空！');location.href='javascript:history.go(-1)';</script>";
		}
   //判断用户价格是否为数字
  if(!is_numeric($prt_price)){
	  echo "<script language='javascript'>alert('价格必须为数字！');location.href='javascript:history.go(-1)';</script>";
  }else {
   //更新零件信息
   $sql1="update car_part set prt_num='".$prt_num."',prt_manf='".$prt_manf."',prt_manfAdr='".$prt_manfAdr."',prt_price='".$prt_price."',prt_name='".$prt_name."',car_prod_prd_id=".$car_prod_prd_id." where prt_id=".$prt_id."";
   mysql_query($sql1);
   echo "<script language='javascript'>alert('零件修改成功！');</script>";
	}
  }
	//查找要修改的零件
	$prt_id=$_GET["prt_id"];
	$sql='select * from car_part where prt_id="'.$prt_id.'"';
	$result=mysql_query($sql);
	$row=mysql_fetch_array($result);

?>

<form id="form1" name="form1" method="post" action="part_modify.php?prt_id=<?php echo $row[prt_id];?>" target="mainFrame">
  <table width="800" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td height="50" colspan="2" align="center" bgcolor="#00CCFF"  style="font-family:'楷体'; font-size:20px">零部件信息修改</td>
    </tr>
    <tr>
      <td width="50%" height="60" align="right" >零部件编号:</td>
      <td height="60" align="center" ><label for="prt_num"></label>
      <input name="prt_num" type="text" id="prt_num" size="30" value="<?php echo $row[prt_num];?>" /></td>
    </tr>
    <tr>
      <td width="50%" height="60" align="right" >零部件名称:</td>
      <td height="60" align="center" ><input name="prt_name" type="text" id="prt_name" size="30" value="<?php echo $row[prt_name];?>"/></td>
    </tr>
    <tr>
      <td width="50%" height="60" align="right" >零部件制造商:</td>
      <td height="60" align="center" ><input name="prt_manf" type="text" id="prt_manf" size="30" value="<?php echo $row[prt_manf];?>" /></td>
    </tr>
    <tr>
      <td width="50%" height="60" align="right" >零部件产地:</td>
      <td height="60" align="center" ><input name="prt_manfAdr" type="text" id="prt_manfAdr" size="30" value="<?php echo $row[prt_manfAdr];?>"/></td>
    </tr>
    <tr>
      <td width="50%" height="60" align="right" >零部件价格:</td>
      <td height="60" align="center" ><input name="prt_price" type="text" id="prt_price" size="30" value="<?php echo $row[prt_price];?>" /></td>
    </tr>
  <tr>
      <td width="50%" height="60" align="right" >零部件所属产品:</td>
      <td height="60" align="center" >
      
        <label for="car_prod_prd_id"></label>
        <select name="car_prod_prd_id" id="car_prod_prd_id" style="width:auto;">
        <?php 
		//查找零件所属产品
		$sqlPrd='select * from car_prod where prd_id='.$row[car_prod_prd_id];
		$resultPrd=@mysql_query($sqlPrd);
		$rowPrd=@mysql_fetch_array($resultPrd);
		?>
          <option value=<?php echo $rowPrd[prd_id];?>> <?php echo $rowPrd[prd_style] ;?></option>
         <?php 
		 //显示其余产品类型
		 $sqlPrd1='select * from car_prod where prd_id<>'.$row[car_prod_prd_id];
		 $resultPrd1=@mysql_query($sqlPrd1);
		 while($rowPrd1=@mysql_fetch_array($resultPrd1)){
		 ?>
          <option value=<?php echo $rowPrd1[prd_id];?>> <?php echo $rowPrd1[prd_style] ;?></option>
          <?php }?>
        </select></td>
    </tr>
    <tr>
      <td colspan="2" align="center" > <input type="submit" name="but_modify" id="but_modify" value="提交" onclick="return confirm('确定要修改这些记录吗?')"/>       </td>
    </tr>
  </table>
</form>
</body>
</html>