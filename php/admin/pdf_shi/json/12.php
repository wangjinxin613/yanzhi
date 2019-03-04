<?php
header("Content-type: text/html; charset=utf-8");
require_once("config.php");
$arr = array();
$arr['city'] = $area;
$arr['year'] = $nowMonth_text;
$arr['summary'] = "（注：数据来源淘宝、淘宝企业、天猫）";
$sql->query("select sum(b2c_shop_num) value,industry_name from xz_city_category_month_data a,industry_category b where a.category_id = b.industry_id and a.stat_month = '$nowMonth' {$area_sql} and a.data_type = '1' group by category_id order by value desc");
while($row = $sql->fetch_assoc()){

    $arr['datavalue'][][$row['industry_name']] = $row['value'];
}

echo json_encode($arr);
/*
{
    "city": "XX市",
    "year": "2017年4月",
    "summary": "（注：数据来源淘宝、淘宝企业、天猫）",
    "datavalue": [
        { "家居建材": 43.84 },
        { "百货食品": 18.71 },
        { "服装鞋包": 9.54 },
        { "生活服务": 5.91 },
        { "母婴用品": 5.11 },
        { "运动户外": 3.76 },
        { "美妆饰品": 3.61 },
        { "文化玩乐": 3.41 },
        { "家用电器": 2.67 },
        { "手机数码": 2.50 },
        { "其他行业": 0.86 },
        { "游戏话费": 0.07 }
    ]
}
*/
?>
