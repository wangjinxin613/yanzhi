<?php
header("Content-type: text/html; charset=utf-8");
require_once("config.php");
$arr = array();
$arr['city'] = $area;
$arr['year'] = $nowMonth_text;
$arr['summary'] = "（注：数据来源淘宝、淘宝企业、天猫）";
$sql->query("select area,order_num value from xz_area_month_data {$month_sql} {$area_sql} group by area order by value desc");
while($row = $sql->fetch_assoc()){
    $arr['datavalue'][][$row['area']] =wan($row['value']);
}
echo json_encode($arr);
/*
{
"city": "XX市",
"year": "2017年4月",
"summary": "（注：数据来源淘宝、淘宝企业、天猫）",
"datavalue": [
{ "AA县": "20216.85" },
{ "BB区": "4773.65" },
{ "CC区": "4759.10" },
{ "DD区": "2446.25" },
{ "EE市": "1971.20" },
{ "FF区": "1763.25" },
{ "GG区": "1480.07" },
{ "HH市": "1296.26" },
{ "II县": "1011.57" },
{ "JJ县": "902.24" },
{ "KK区": "587.53" }
]
}
*/
?>