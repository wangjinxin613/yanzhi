<?php
      header("Content-type: text/html; charset=utf-8");
      require_once("config.php");
      $arr = array();
      $arr['city'] = $area;
      $arr['year'] = $nowMonth_text;
      $arr['summary'] = "（注：数据来源淘宝、淘宝企业、天猫）";
      $sql->query("select sum(b2c_shop_num) b2c, sum(c2c_shop_num) c2c from xz_city_month_data {$month_sql} {$area_sql}");
      $row = $sql->fetch_assoc();
      $arr['datavalue1'][]['B2C'] = $row['b2c'];
      $arr['datavalue1'][]['C2C'] = $row['c2c'];
         #循环最近的七个月
    for($i=7;$i>= 1;$i--){
        $day[] = date("Ym",strtotime("-$i months"));    
      }
      foreach ($day as $key => $value){
        $sql->query("select sum(b2c_shop_num) value from xz_city_month_data {$area_sql1} and stat_month = '$value'");
        $row = $sql->fetch_assoc();
        $arr['datavalue2'][][substr($value,4,2)."月"] = $row['value'];
      }
      echo json_encode($arr);
      /*
      {
        "city": "XX市",
        "year": "2017年4月",
        "summary": "（注：数据来源淘宝、淘宝企业、天猫,发货地维度）",
        "datavalue1": [
            { "B2C": "11.1" },
            { "C2C": "88.9" }
        ],
        "datavalue2": [
            { "一月": "5106" },
            { "二月": "4848" },
            { "三月": "5433" },
            { "四月": "5671" }
    
        ]
    }
    */
?>
