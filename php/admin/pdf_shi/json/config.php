<?php
    require_once("../../../class/mysql_class.php");
    $area_sql = "and prov = '江苏省' and city = '徐州市'";
    $area_sql1 = "where prov = '江苏省' and city = '徐州市'";
    $area = "徐州市";

    	#获取上一月份
	$nowMonth = date("Ym",strtotime("-1 month"));
    $nowMonth_1 = date("Ym",strtotime("-2 month"));
    $nowMonth_text = date("Y年m月",strtotime("-1 month"));
    $month_sql = "where stat_month = '$nowMonth'";
    $month_sql1 = "and stat_month = '$nowMonth'";

    //将数组转化为万单位
    function wan($money){
         return round(sprintf("%.2f", $money/10000),2);
    }
    $zhibiao1 = "sales_money";
    $zhibiao2 = "sales_num";
    $zhibiao3 = "order_num";
?>