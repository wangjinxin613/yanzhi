<?php
      header("Content-type: text/html; charset=utf-8");
      require_once("config.php");
      $arr = array();
      $arr['city'] = $area;
      $arr['year'] = $nowMonth_text;
      $arr['summary'] = "（注：数据来源淘宝、淘宝企业、天猫）";
      $zhibiao = "sales_money";
      $sql->query("select sum(b2c_".$zhibiao.") b2c, sum(c2c_".$zhibiao.") c2c from xz_city_month_data {$month_sql} {$area_sql}");
      $row = $sql->fetch_assoc();
      $arr['datavalue'][]['B2C'] = $row['b2c'];
      $arr['datavalue'][]['C2C'] = $row['c2c'];
      echo json_encode($arr);
?>
