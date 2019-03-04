<?php
header("Content-type: text/html; charset=utf-8");
require_once("config.php");
$arr = array();
$arr['city'] = $area;
$arr['year'] = $nowMonth_text;
$arr['summary'] = "（注：数据来源淘宝、淘宝企业、天猫）";
$sql->query("select sum(sales_money) value,industry_id,industry_name from xz_area_category_month_data a,industry_category b where a.category_id = b.industry_id and a.stat_month = '$nowMonth' {$area_sql} and a.data_type = '1'  ");
$row = $sql->fetch_assoc();
    $all_sales = $row['value'];

$sql->query("select sales_money value,industry_id,industry_name from xz_area_category_month_data a,industry_category b where a.category_id = b.industry_id and a.stat_month = '$nowMonth' {$area_sql} and a.data_type = '1' group by category_id order by category_id desc");
while($row = $sql->fetch_assoc()){
    $arr['items'][] = $row['industry_name'];
}
$area = array();
$sql->query("select area,sum(sales_money) value,industry_id,industry_name from xz_area_category_month_data a,industry_category b where a.category_id = b.industry_id and a.stat_month = '$nowMonth' {$area_sql} and a.data_type = '1' group by area order by value desc");
while($row = $sql->fetch_assoc()){
    $area[] = $row['area'];
    $all[] = round($row['value']);
}
foreach ($area as $key => $value) {
    $sql->query("select sum(sales_money) value,industry_id,industry_name from xz_area_category_month_data a,industry_category b where a.category_id = b.industry_id and a.stat_month = '$nowMonth' {$area_sql} and a.data_type = '1' and area = '$value' group by category_id order by category_id desc");
    $arr['datavalue'][$key]['place'] = $value;
    $alls = $all[$key];
    while($row = $sql->fetch_assoc()){
    $arr['datavalue'][$key][$row['industry_name']] = round(round($row['value'])/$alls,5)*100;
  
    }
    $arr['datavalue'][$key]['pn'] = round($alls/$all_sales,5)*100;
}

echo json_encode($arr);
/*
{
    "city": "XX市",
    "year": "2017年4月",
    "summary": "（注：数据来源淘宝、淘宝企业、天猫）",
    "items": ["运动户外", "文化玩乐", "手机数码", "生活服务", "其他行业", "母婴用品", "美妆饰品", "家用电器", "家居建材", "服装鞋包", "百货食品"],
    "datavalue": [{
            "place": "AA区",
            "运动户外": 8.15,
            "文化玩乐": 8.42,
            "手机数码": 6.98,
            "生活服务": 2.92,
            "其他行业": 0.43,
            "母婴用品": 13.30,
            "美妆饰品": 8.45,
            "家用电器": 2.10,
            "家居建材": 10.39,
            "服装鞋包": 22.90,
            "百货食品": 15.96,
            "pn": "52.16"
        },
        {
            "place": "BB区",
            "运动户外": 1.12,
            "文化玩乐": 10.85,
            "手机数码": 3.59,
            "生活服务": 18.47,
            "其他行业": 0.08,
            "母婴用品": 6.38,
            "美妆饰品": 3.29,
            "家用电器": 2.69,
            "家居建材": 17.19,
            "服装鞋包": 16.05,
            "百货食品": 20.30,
            "pn": "55.96"
        },
        {
            "place": "CC区",
            "运动户外": 2.30,
            "文化玩乐": 1.21,
            "手机数码": 0.01,
            "生活服务": 0.09,
            "其他行业": 0.00,
            "母婴用品": 1.13,
            "美妆饰品": 0.00,
            "家用电器": 0.00,
            "家居建材": 88.53,
            "服装鞋包": 0.43,
            "百货食品": 6.30,
            "pn": "97.13"
        },
        {
            "place": "DD区",
            "运动户外": 0.99,
            "文化玩乐": 7.69,
            "手机数码": 0.06,
            "生活服务": 3.00,
            "其他行业": 0.37,
            "母婴用品": 0.33,
            "美妆饰品": 1.88,
            "家用电器": 0.14,
            "家居建材": 55.74,
            "服装鞋包": 3.17,
            "百货食品": 26.63,
            "pn": "90.06"
        },
        {
            "place": "EE区",
            "运动户外": 6.24,
            "文化玩乐": 12.98,
            "手机数码": 2.42,
            "生活服务": 35.88,
            "其他行业": 1.04,
            "母婴用品": 4.66,
            "美妆饰品": 2.37,
            "家用电器": 3.68,
            "家居建材": 12.00,
            "服装鞋包": 3.37,
            "百货食品": 15.06,
            "pn": "63.92%"
        },
        {
            "place": "FF市",
            "运动户外": 31.92,
            "文化玩乐": 0.00,
            "手机数码": 0.14,
            "生活服务": 2.77,
            "其他行业": 0.00,
            "母婴用品": 3.79,
            "美妆饰品": 0.34,
            "家用电器": 0.00,
            "家居建材": 35.46,
            "服装鞋包": 18.23,
            "百货食品": 7.35,
            "pn": "85.61"
        },
        {
            "place": "GG市",
            "运动户外": 42.81,
            "文化玩乐": 3.27,
            "手机数码": 3.06,
            "生活服务": 2.28,
            "其他行业": 2.29,
            "母婴用品": 7.90,
            "美妆饰品": 0.37,
            "家用电器": 0.29,
            "家居建材": 3.00,
            "服装鞋包": 28.14,
            "百货食品": 6.59,
            "pn": "78.85"
        },
        {
            "place": "HH县",
            "运动户外": 0.00,
            "文化玩乐": 0.01,
            "手机数码": 0.06,
            "生活服务": 3.64,
            "其他行业": 0.00,
            "母婴用品": 3.72,
            "美妆饰品": 0.19,
            "家用电器": 0.00,
            "家居建材": 8.22,
            "服装鞋包": 0.00,
            "百货食品": 84.16,
            "pn": "96.10"
        },
        {
            "place": "II县",
            "运动户外": 3.59,
            "文化玩乐": 3.69,
            "手机数码": 0.01,
            "生活服务": 28.45,
            "其他行业": 0.00,
            "母婴用品": 28.06,
            "美妆饰品": 0.09,
            "家用电器": 1.50,
            "家居建材": 0.78,
            "服装鞋包": 7.70,
            "百货食品": 26.13,
            "pn": "82.65"
        },
        {
            "place": "JJ县",
            "运动户外": 0.03,
            "文化玩乐": 0.19,
            "手机数码": 0.40,
            "生活服务": 0.78,
            "其他行业": 0.00,
            "母婴用品": 0.41,
            "美妆饰品": 0.09,
            "家用电器": 0.02,
            "家居建材": 96.13,
            "服装鞋包": 0.48,
            "百货食品": 1.46,
            "pn": "98.38"
        },
        {
            "place": "KK区",
            "运动户外": 0.67,
            "文化玩乐": 4.14,
            "手机数码": 13.28,
            "生活服务": 6.27,
            "其他行业": 6.68,
            "母婴用品": 2.98,
            "美妆饰品": 0.07,
            "家用电器": 8.67,
            "家居建材": 22.78,
            "服装鞋包": 28.12,
            "百货食品": 6.35,
            "pn": "64.18"
        }
    ]
}
*/
?>

