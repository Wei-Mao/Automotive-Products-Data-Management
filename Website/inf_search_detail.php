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
<form id="form1" name="form1" method="post" action="inf_seashow_prd1.php" target="mainFrame">
  <table width="50%" border="0" align="center" cellpadding="0" cellspacing="0" style="font-size:20px; font-family:'楷体'; font-weight:bold;">
     <tr>
      <td colspan="2" align="center" style="font-size:24px; font-family:'楷体'; color:#F00">产品信息查询</td>
    
    </tr>
    <tr>
      <td width="40%" align="right">产品编号</td>
      <td align="left"><label for="prd_num"></label>
      <input type="text" name="prd_num" id="prd_num" /></td>
    </tr>
    <tr>
      <td width="40%" align="right">产品型号</td>
      <td align="left"><input type="text" name="prd_style" id="prd_style" /></td>
    </tr>
    <tr>
      <td width="40%" align="right">产品名称</td>
      <td align="left"><input type="text" name="prd_name" id="prd_name" /></td>
    </tr>
    <tr>
      <td width="40%" align="right">制造商</td>
      <td align="left"><input type="text" name="prd_manf" id="prd_manf" /></td>
    </tr>
    <tr>
      <td width="40%" align="right">产地</td>
      <td align="left"><input type="text" name="prd_area" id="prd_area" /></td>
    </tr>
    <tr>
      <td width="40%" align="right">价格（￥）</td>
      <td align="left"><input name="prd_price1" type="text" id="prd_price1" size="10" />
        ~
        <input name="prd_price2" type="text" id="prd_price2" size="10" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><p>
        <input name="but_prd_search" type="submit" id="but_prd_search" value="产品搜索" />
      </p></td>
    </tr>
  </table>
  <p>&nbsp;</p>
</form>
<form id="form2" name="form2" method="post" action="inf_seashow_prt1.php" target="mainFrame">
  <table width="50%" border="0" align="center" cellpadding="0" cellspacing="0" style="font-size:20px; font-family:'楷体'; font-weight:bold;">
    <tr>
      <td colspan="2" align="center"><span style="font-size:24px; font-family:'楷体'; color:#F00; font-weight:bold;" >零件信息查询</span></td>
    </tr>
    <tr>
      <td width="40%" align="right">零件编号</td>
      <td align="left"><input type="text" name="prt_num" id="prt_num" /></td>
    </tr>
    <tr>
      <td width="40%" align="right">零件名称</td>
      <td align="left"><input type="text" name="prt_name" id="prt_name" /></td>
    </tr>
    <tr>
      <td width="40%" align="right">零件制造商</td>
      <td align="left"><input type="text" name="prt_manf" id="prt_manf" /></td>
    </tr>
    <tr>
      <td width="40%" align="right">产地</td>
      <td align="left"><input type="text" name="prt_manfAdr" id="prt_manfAdr" /></td>
    </tr>
    <tr>
      <td width="40%" align="right">价格（￥）</td>
      <td align="left"><input name="prt_price1" type="text" id="prt_price1" size="10" />
        ~
        <input name="prt_price2" type="text" id="prd_price4" size="10" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><p>
        <input type="submit" name="but_part_search" id="but_part_search" value="零件搜索" />
      </p></td>
    </tr>
  </table>
</form>
</body>
</html>