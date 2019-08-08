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
</head>

<body class="linear">
<?php 
if($_SESSION[name]!=""){
?>
<form id="form1" name="form1" method="post" action="inf_search_show.php" target="mainFrame">
  <table width="1000" border="0" align="center" cellpadding="0" cellspacing="0">
   
    
    <tr>
      <td height="100" colspan="4" align="center" valign="middle" style="font-family:'楷体'; font-size:30px;font-weight:bold;">简单查询模式</td>
    </tr>
    <tr>
      <td width="20%" height="100" align="right" valign="middle" >产品查询</td>
      <td width="25%" height="100" align="center" valign="middle"><label for="prd_select"></label>
        <select name="prd_select" id="prd_select" style="width:40%;">
          <option value="prd_num" selected>产品编号</option>
          <option value="prd_style">产品型号</option>
          <option value="prd_name">产品名称</option>
          <option value="prd_manf">产品制造商</option>
          <option value="prd_area">产地</option>
      </select> &nbsp;
      <label for="prd_selvalue"></label>
      <input name="prd_selvalue" type="text" id="prd_selvalue" size="15" />
      
      </td>
      <td width="30%" height="100" align="center" valign="middle">价格：
        <label for="prd_price1"></label>
      <input name="prd_price1" type="text" id="prd_price1" size="10" />
      ~
      <input name="prd_price2" type="text" id="prd_price2" size="10" />
      元</td>
      <td width="22%" height="100" align="left" valign="middle"><input type="submit" name="but_prd_search" id="but_prd_search" value="搜索" /></td>
     
    </tr>
    
  </table>
</form>
<p>
<form id="form2" name="form2" method="post" action="in_seashow_part.php" target="mainFrame">
 <table width="1000" border="0" align="center" cellpadding="0" cellspacing="0">
   <tr>
      <td width="20%" height="100" align="right" valign="middle">零件查询</td>
      <td width="25%" height="100" align="center" valign="middle"><select name="prt_select" id="prt_select" style="width:40%;">
       <option value="prt_num" selected>零件编号</option>
          <option value="prt_name">零件名称</option>
          <option value="prt_manf">零件制造商</option>
             <option value="prt_manfAdr">产地</option>
      </select>
      &nbsp;
      <input name="prt_selvalue" type="text" id="prt_selvalue" size="15" /></td>

      <td width="30%" height="100" align="center" valign="middle">价格：
        <label for="prt_price1"></label>
        <input name="prt_price1" type="text" id="prt_price1" size="10" />
~
<input name="prt_price2" type="text" id="prt_price2" size="10" />
元</td>
      <td width="22%" height="100" align="left" valign="middle"><input type="submit" name="but_part_search" id="but_part_search" value="搜索" /></td>
    </tr>
 </table>
</form>
</p>
<p style="font-size:24px; font-weight:bold; font-family:'楷体'" align="center"><a href="inf_search_detail.php">进入高级查询模式</a></p>
<?php } else {
	
echo "<script language='javascript'>alert('请登录！');location.href='javascript:history.go(-1)';</script>";	
}
	?>

</body>
</html>