<?php
header("Content-type: text/html; charset=utf-8");
	print_r($_POST);
	$h = null;
	foreach ($_POST['item'] as $key => $value) {
		# code...
		echo $value;

		$h = $h.'<iframe src="../pdf_shi/district_'.$value.'.html"  frameborder="0" scroll="no"></iframe><div class="page"></div>';
	}
	  ob_start();
	$html = '<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8">
</head>
<style>
body{
	width: 100%;
}
iframe{
	border:0;
	width:1200px;
	margin:auto;
	min-height: 800px;
}
.page{
	page-break-inside:avoid;
}
img{
	width:100%;

}
</style>
<body style="padding:0;margin:0"><img src="../pdf_sheng/head.jpg"><img src="../pdf_sheng/shuoming.jpg"><img src="../pdf_sheng/ml1.jpg"><img src="../pdf_sheng/ml2.jpg"><img src="../pdf_sheng/shuoming.jpg">'.$h.'<img src="../pdf_sheng/fuzhu.jpg"><img src="../pdf_sheng/foot.jpg"></body></html>';
echo $html;
$filename = "test";

        //save the html page in tmp folder  保存的html临时文件位置 可以是相对路径也是可以是绝对路径 下面用相对路径
        file_put_contents("{$filename}.html", $html);

        //Clean the output buffer and turn off output buffering
        ob_end_clean();
	
        //convert HTML to PDF
shell_exec("wkhtmltopdf --javascript-delay 1000 --encoding utf-8 --page-height 211 http://127.0.0.1/bigdate/ad/action/test.html {$filename}.pdf");

        if(file_exists("{$filename}.pdf")){
            header("Content-type:application/pdf");
            header("Content-Disposition:attachment;filename={$filename}.pdf");
            echo file_get_contents("{$filename}.pdf");
            //echo "{$filename}.pdf";
        }else{
            exit;
		}
	
	
?>	