<?php
header("Content-type: text/html; charset=utf-8");
require_once("config.php");
$arr = array();
$arr['city'] = $area;
$arr['year'] = $nowMonth_text;
$arr['summary'] = "（注：数据来源淘宝、淘宝企业、天猫）";
$zhibiao = "sales_money";
$sql->query("select max(b2c_".$zhibiao."+c2c_".$zhibiao.") value from xz_city_shop_month_data where stat_month = '$nowMonth' {$area_sql}");
$row = $sql->fetch_assoc();
$max = round($row['value']/10000)+1; 

$sql->query("select avg(b2c_".$zhibiao."+c2c_".$zhibiao.") value from xz_city_shop_month_data where stat_month = '$nowMonth' {$area_sql}");
$row = $sql->fetch_assoc();

$avg = round($row['value']/10000)+1;


$sin = round(($max - $avg)/5);

$arr['max'] = $max;

for ($s=1; $s<=5; $s++) {
    if($s == 1){
        $t = "<".($avg+$sin)*$s;
    }else{
       $t = ($avg+$sin)*($s-1)."-".($avg+$sin)*$s;
    }
    $sq = "select count(1) count from (select b2c_".$zhibiao."+c2c_".$zhibiao." value from xz_city_shop_month_data where stat_month = '$nowMonth' {$area_sql} and b2c_".$zhibiao."+c2c_".$zhibiao." >= ".$avg*$s."  and b2c_".$zhibiao."+c2c_".$zhibiao." <= ".($avg+$sin)*$s." order by value asc ) t";

    $sql->query($sq);
    $cc = $sql->fetch_assoc();
    
    $arr['datavalue'][][$t] = $cc['count'];
}
 echo json_encode($arr);
/*
{
    "city": "XX市",
    "year": "2017年4月",
    "summary": "（注：数据来源淘宝、淘宝企业、天猫）",
    "datavalue": [
        { "0~50000": 1509 },
        { "50000~100000": 242 },
        { "100000~150000": 139 },
        { "150000~": 432 }
    ]
}
*/
?>
