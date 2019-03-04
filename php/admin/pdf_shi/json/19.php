<?php
    header("Content-type: text/html; charset=utf-8");
    require_once("config.php");
    $arr = array();
    $arr['city'] = $area;
    $arr['year'] = $nowMonth_text;
    $arr['summary'] = "（注：数据来源淘宝、淘宝企业、天猫）";
   $sql->query("select campany,campany_id,sales_money value,area from xz_area_campany_month_data where stat_month = '$nowMonth' {$area_sql} order by value desc limit 0,20");
   $i = -1;
   while($row = $sql->fetch_assoc()){
    $i++;
    $arr['datavalue'][$i]['shop'] = $row['campany'];
    $arr['datavalue'][$i]['sale_money'] = round($row['value'],2);
    $arr['datavalue'][$i]['place'] = $row['area'];
   }
   echo json_encode($arr);
?>
<?
/**
{
    "city": "徐州市",
    "year": "2017年8月",
    "summary": "（注：数据来源淘宝、淘宝企业、天猫）",
    "datavalue": [{
            "shop": "徐州新潮床垫有限公司",
            "sale_money": "1203.68 ",
            "place": "贾汪区"
        },
        {
            "shop": "徐州市布迪汽车用品销售有限公司",
            "sale_money": "978.83 ",
            "place": "泉山区"
        }, {
            "shop": "睢宁瑞旮家具有限公司",
            "sale_money": "900.51 ",
            "place": "睢宁县"
        }, {
            "shop": "睢宁梦瑶家具有限公司",
            "sale_money": "826.51 ",
            "place": "睢宁县"
        }, {
            "shop": "徐州绮绣家纺有限公司",
            "sale_money": "797.74 ",
            "place": "铜山区"
        }, {
            "shop": "徐州辰南家具有限公司",
            "sale_money": "492.69 ",
            "place": "睢宁县"
        }, {
            "shop": "徐州段氏家具有限公司",
            "sale_money": "394.88 ",
            "place": "睢宁县"
        }, {
            "shop": "睢宁百亨家具有限公司",
            "sale_money": "422.21 ",
            "place": "睢宁县"
        }, {
            "shop": "徐州莉云居家具有限公司",
            "sale_money": "394.10 ",
            "place": "睢宁县"
        }, {
            "shop": "徐州童梦乐儿童家具有限公司",
            "sale_money": "382.12 ",
            "place": "睢宁县"
        }, {
            "shop": "徐州市织天下针织品有限公司",
            "sale_money": "374.76 ",
            "place": "云龙区"
        }, {
            "shop": "睢宁百年和合家具有限公司",
            "sale_money": "361.87 ",
            "place": "睢宁县"
        }, {
            "shop": "睢宁欧雅家具有限公司",
            "sale_money": "336.05 ",
            "place": "睢宁县"
        }, {
            "shop": "徐州怡美达家具有限公司",
            "sale_money": "327.00 ",
            "place": "睢宁县"
        }, {
            "shop": "徐州伟志通达家具有限公司",
            "sale_money": "297.75 ",
            "place": "睢宁县"
        }, {
            "shop": "睢宁好百年家具有限公司",
            "sale_money": "285.45 ",
            "place": "睢宁县"
        }, {
            "shop": "徐州市鼎华商贸有限公司",
            "sale_money": "282.52 ",
            "place": "贾汪区"
        }, {
            "shop": "徐州皇家枫情家具有限公司",
            "sale_money": "265.80 ",
            "place": "睢宁县"
        }, {
            "shop": "徐州露莱丝商贸有限公司",
            "sale_money": "262.01 ",
            "place": "云龙区"
        }, {
            "shop": "江苏康力源健身器材有限公司",
            "sale_money": "253.44 ",
            "place": "邳州市"
        }
    ]
}
*/?>