<?php
header("Content-type: text/html; charset=utf-8");
require_once("config.php");
$arr = array();
$arr['city'] = $area;
$arr['year'] = $nowMonth_text;

$sql->query("select a.*,b.company,b.industry,b.distirct from company_shop_month_report a,company_info b where a.id = b.com_id and b.prov = '江苏省' and b.city = '徐州市' order by total_amount desc limit 0,25");
$k = -1;
while($row = $sql->fetch_assoc()){
    $k++;
    $arr['datavalue'][$k]['company'] = $row['company'];
    $arr['datavalue'][$k]['shop_name'] = $row['shop_name'];
    $arr['datavalue'][$k]['platform'] = "天猫";
    $arr['datavalue'][$k]['a_sales'] = wan($row['total_amount']);
    $arr['datavalue'][$k]['major_business'] = $row['industry'];
    $arr['datavalue'][$k]['place'] = $row['distirct'];
}

echo json_encode($arr);
/*
{
    "city": "XX市",
    "year": "2017年4月",
    "summary": "（注：数据来源淘宝、淘宝企业、天猫）",
    "datavalue": [{
            "company": "徐州新潮床垫有限公司",
            "shop_name": "香世源家居旗舰店",
            "platform": "天猫",
            "a_sales": "1003.68 ",
            "major_business": "家居建材",
            "place": "贾汪区"
        },
        {
            "company": "睢宁瑞旮家具有限公司",
            "shop_name": "瑞旮旗舰店",
            "platform": "天猫",
            "a_sales": "876.32 ",
            "major_business": "床上用品",
            "place": "睢宁县"
        },
        {
            "company": "徐州绮绣家纺有限公司",
            "shop_name": "伊丝绮旗舰店",
            "platform": "天猫",
            "a_sales": "592.82 ",
            "major_business": "家纺",
            "place": "铜山区"
        },
        {
            "company": "徐州辰南家具有限公司",
            "shop_name": "辰南家具旗靓店",
            "platform": "淘宝企业",
            "a_sales": "542.69 ",
            "major_business": "家居建材",
            "place": "睢宁县"
        },
        {
            "company": "睢宁梦瑶家具有限公司",
            "shop_name": "彬飞家居旗舰店",
            "platform": "天猫",
            "a_sales": "510.97 ",
            "major_business": "家居建材",
            "place": "睢宁县"
        },
        {
            "company": "睢宁百亨家具有限公司",
            "shop_name": "广佳家居旗舰店",
            "platform": "天猫",
            "a_sales": "422.21 ",
            "major_business": "家居建材",
            "place": "睢宁县"
        },
        {
            "company": "徐州童梦乐儿童家具有限公司",
            "shop_name": "童梦乐儿童家具",
            "platform": "淘宝企业",
            "a_sales": "382.12 ",
            "major_business": "家居建材",
            "place": "睢宁县"
        },
        {
            "company": "徐州莉云居家具有限公司",
            "shop_name": "莉云居家居旗舰店",
            "platform": "天猫",
            "a_sales": "362.84 ",
            "major_business": "家居建材",
            "place": "睢宁县"
        },
        {
            "company": "睢宁百年和合家具有限公司",
            "shop_name": "万源合旗舰店",
            "platform": "天猫",
            "a_sales": "361.87 ",
            "major_business": "家居建材",
            "place": "睢宁县"
        },
        {
            "company": "睢宁欧雅家具有限公司",
            "shop_name": "好逑旗舰店",
            "platform": "天猫",
            "a_sales": "331.96 ",
            "major_business": "家居建材",
            "place": "睢宁县"
        },
        {
            "company": "徐州怡美达家具有限公司",
            "shop_name": "怡美达旗舰店",
            "platform": "天猫",
            "a_sales": "327.00 ",
            "major_business": "家居建材",
            "place": "睢宁县"
        },
        {
            "company": "睢宁梦瑶家具有限公司",
            "shop_name": "悠佳家居用品旗舰店",
            "platform": "天猫",
            "a_sales": "325.12 ",
            "major_business": "家居建材",
            "place": "睢宁县"
        },
        {
            "company": "徐州段氏家具有限公司",
            "shop_name": "段氏木业旗舰店",
            "platform": "天猫",
            "a_sales": "316.55 ",
            "major_business": "家居建材",
            "place": "睢宁县"
        },
        {
            "company": "徐州伟志通达家具有限公司",
            "shop_name": "祥童儿旗舰店",
            "platform": "天猫",
            "a_sales": "292.83 ",
            "major_business": "家居建材",
            "place": "睢宁县"
        },
        {
            "company": "睢宁好百年家具有限公司",
            "shop_name": "金多喜家居旗舰店",
            "platform": "天猫",
            "a_sales": "285.45 ",
            "major_business": "家居建材",
            "place": "睢宁县"
        }
    ]
}
*/
?>