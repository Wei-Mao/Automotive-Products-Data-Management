<?php include("conn.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="css/main.css" rel="stylesheet" type="text/css"/>
<link href="css/bom.css" rel="stylesheet" type="text/css"/>
<script src="js/jquery-3.1.1.min.js"></script>
<script src="js/bom.js"></script>

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
if($_SESSION[name]!=""){
?>
<?php 
//查找所有产品
$sql='select * from car_prod';
$result= @mysql_query($sql);

?>
<body class="linearleft">
<table width="900" border="0" cellspacing="0" cellpadding="0">
  <tr>
  <td width="200"></td>
    <td align="left">
<ul>
  <li class="main0" > <span class="first">+</span> <a  style="font-family:'楷体'; font-weight:bolder">车型及其零件</a>   
    <ul>
        <?php while($row=@mysql_fetch_array($result)){?>
        <li class="main">
        <span class="second">+</span>  <a href="sg_prod.php?prd_id=<?php echo $row[prd_id];?>">    <?php echo $row[prd_name];?></a>
             <?php 
            $sql1='select * from car_part where car_prod_prd_id='.$row[prd_id];
            $result1=@mysql_query($sql1);
             ?>
             <ul class="part">
                <?php while($row1=@mysql_fetch_array($result1)){?>
                <li><a href="sg_part.php?prt_id=<?php echo $row1[prt_id];?>"><?php echo $row1[prt_name];?></a> </li>
                <?php }?>
             
             </ul>
        </li>
        <?php }?>
    </ul>
</li> 
</ul>    
    
    
    
    
    
    
    
    
    </td>
  </tr>
</table>  
    
<?php } else {
	
echo "<script language='javascript'>alert('请登录！');location.href='javascript:history.go(-1)';</script>";	
}
	?>
</body>
</html>