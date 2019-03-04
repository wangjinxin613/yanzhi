<?php
        header("Content-type: text/html; charset=utf-8");
        require_once("config.php");
        $arr = array();
        $arr['city'] = $area;
        $arr['year'] = $nowMonth_text;
        $arr['summary'] = "（注：数据来源淘宝、淘宝企业、天猫）";
        #总数
        $sql->query("select sum(b2c_shop_num) value from xz_area_month_data {$month_sql} {$area_sql}");
        $all = $sql->fetch_assoc();
        $sql->query("select area,b2c_shop_num value from xz_area_month_data {$month_sql} {$area_sql} group by area order by value desc");
        while($row = $sql->fetch_assoc()){
            $arr['datavalue'][][$row['area']] = round($row['value']/$all['value']*100,2);
        }
        echo json_encode($arr);
        /*
{
    "city": "XX市",
    "year": "2017年4月",
    "summary": "（注：数据来源淘宝、淘宝企业、天猫）",
    "datavalue": [
        { "睢宁县": 39.72 },
        { "泉山区": 13.65 },
        { "云龙区": 12.06 },
        { "新沂市": 10.36 },
        { "铜山区": 6.39 },
        { "邳州市": 4.21 },
        { "鼓楼区": 3.73 },
        { "沛县": 2.98 },
        { "丰县": 2.54 },
        { "开发区": 2.26 },
        { "贾汪区": 2.10 }
    ]
}
        */
?>
