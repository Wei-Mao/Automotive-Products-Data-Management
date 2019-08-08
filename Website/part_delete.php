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
	$prt_id=$_GET["prt_id"];//获取删除产品的ID
	$sql_del='delete from car_part where prt_id="'.$prt_id.'"';
	@mysql_query($sql_del);
	echo "<script language='javascript'>alert('删除成功！');location.href='inf_search.php';</script>";
?>

</body>
</html>