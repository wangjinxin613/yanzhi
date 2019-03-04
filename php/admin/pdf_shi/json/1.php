<?php
    header("Content-type: text/html; charset=utf-8");
    require_once("config.php");
    $zhibiao = "sales_money";
    $sql->query("select sum(b2c_".$zhibiao.") + sum(c2c_".$zhibiao.") value from xz_city_month_data {$month_sql} {$area_sql}");
    $row = $sql->fetch_assoc();

    $arr = array();
 
    $arr['city'] = $area;
    $arr['year'] = $nowMonth_text;
    $arr['title1'] = $nowMonth_text."月淘宝、天猫网络零售额：".$row['value']."元";
    $arr['title2'] = $nowMonth_text."月全网网络零售额：".$row['value']."元";
    $arr['summary'] = "（注：数据来源淘宝、淘宝企业、天猫）";
    #循环最近的七个月
    for($i=7;$i>= 1;$i--){
      $day[] = date("Ym",strtotime("-$i months"));    
    }
    $sql->query("select sum(b2c_".$zhibiao.") + sum(c2c_".$zhibiao.") value from xz_city_month_data {$area_sql1}");
    $all = $sql->fetch_assoc();

    foreach ($day as $key => $value){
        $sql->query("select sum(b2c_".$zhibiao.") + sum(c2c_".$zhibiao.") value from xz_city_month_data {$area_sql1} and stat_month = '$value'");
        $row = $sql->fetch_assoc();
        $val = substr($value+1,4,2);
        $values = substr($value,4,2)."月-".$val."月";
        //round($row['value']/$all['value'],2)*100;
        $arr['datavalue'][][$values] = round($row['value']/$all['value'],2);
    }


 
    echo json_encode($arr);
?>
