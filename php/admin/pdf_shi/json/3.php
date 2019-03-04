<?php
      header("Content-type: text/html; charset=utf-8");
      require_once("config.php");
      $arr = array();
      $arr['city'] = $area;
      $arr['year'] = $nowMonth_text;
      $arr['summary'] = "（注：数据来源淘宝、淘宝企业、天猫）";

    $sql->query("select b.industry_name name,sum(b2c_".$zhibiao1.")+sum(c2c_".$zhibiao1.") value from xz_city_category_month_data a,industry_category b where a.category_id = b.industry_id and a.data_type = '1' group by b.industry_id");
    while($row = $sql->fetch_assoc()){
            $arr['datavalue'][][$row['name']] = round($row['value']);
    }
    echo json_encode($arr);
?>
