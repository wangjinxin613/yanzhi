<?php
        header("Content-type: text/html; charset=utf-8");
        require_once("config.php");
        # 农产品类目销售额总数
        $sql->query("select sum(b2c_".$zhibiao1.")+sum(c2c_".$zhibiao1.") value from xz_city_category_month_data a,industry_category b where a.category_id = b.rear_cat_id and a.data_type = '3'");
        $all = $sql->fetch_assoc();

        $arr = array();
        $arr['city'] = $area;
        $arr['year'] = $nowMonth_text;
        $arr['title1'] = "农产品及加工品2月B2C网络零售额：".round($all['value'],2)."元";
        $arr['summary'] = "（注：数据来源淘宝、淘宝企业、天猫）";
        $sql->query("select sum(b2c_".$zhibiao1.")+sum(c2c_".$zhibiao1.") value,level2_name name from xz_city_category_month_data a,industry_category b where a.category_id = b.rear_cat_id and a.data_type = '3' group by category_id order by value desc limit 0,10");
        while($row = $sql->fetch_assoc()){
            $arr['datavalue'][][$row['name']] = $row['value'];
        }
        
        echo json_encode($arr);

        /*
            {
    "city": "XX市",
    "year": "2017年4月",
    "title1": "农产品及加工品2月B2C网络零售额：32721552元",
    "summary": "（注：数据来源淘宝、淘宝企业、天猫）",
    "datavalue": [
        { "水产肉类/新鲜蔬果/熟食": 31.82 },
        { "零食/坚果/特产": 29.65 },
        { "粮油米面/南北干货/调味品": 16.19 },
        { "茶/咖啡/冲饮": 11.67 },
        { "传统滋补营养品": 8.27 },
        { "酒类": 2.41 }
    ]
}
        */
?>
