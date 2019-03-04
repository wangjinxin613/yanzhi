<?php
header("Content-type: text/html; charset=utf-8");
require_once("config.php");
$arr = array();
$arr['city'] = $area;
$arr['year'] = $nowMonth_text;
$arr['summary'] = "（注：数据来源淘宝、淘宝企业、天猫）";
$sql->query("select area,sales_money value from xz_area_month_data {$month_sql} {$area_sql} group by area order by value desc");
while($row = $sql->fetch_assoc()){
    $arr['datavalue'][][$row['area']] =wan($row['value']);
}
echo json_encode($arr)
/*
{
    "city": "XX市",
    "year": "2017年4月",
    "summary": "（注：数据来源淘宝、淘宝企业、天猫）",
    "datavalue": [
        { "AA区": "461557" },
        { "BB县": "201967" },
        { "CC县": "158058" },
        { "DD区": "157455" },
        { "EE区": "156549" },
        { "FF区": "138769" },
        { "GG市": "122289" },
        { "HH县": "120299" },
        { "II区": "109519" },
        { "JJ区": "103075" },
        { "KK市": "75525" }
    ]
}
*/
?>
