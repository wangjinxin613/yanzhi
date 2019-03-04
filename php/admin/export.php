<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

  <script src="media/js/jquery-1.10.1.min.js" type="text/javascript"></script>
  <link rel="stylesheet" href="css/common.css">
  <link rel="stylesheet" href="css/myCenter.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>霍兰德职业测试</title>
</head>
<body>
<!--startprint-->
<div class="right5"> 
        <div class="right_top"  style="background-image:url(images/right-di.png);">
            <h3>霍兰德测试报告</h3>
        </div>
        <div class="print">
            <input type="button" value="下载报告"  id="down" class="print_btn">
        </div> 
        <div class="Hollander">
                <h6>MBTI测试结果：ESTJ</h6>
                <div id="chart"></div>
                <p>约翰·霍兰德（John Holland）是美国约翰·霍普金斯大学心理学教授，美国著名的职业指导专家。霍兰德以职业兴趣理论为基础，先后编制了职业偏好量表(VocatIonaI Preference lnventory)和自我导向搜寻表(Self-directed Search)两种职业兴趣量表，霍兰德力求为每种职业兴趣找出两种相匹配的职业能力。兴趣测试和能力测试的结合在职业指导和职业咨询的实际操作中起到了促进作用。</p>
        </div>   
        <table class="tbl1">
         <tbody>
            <tr node-type="toolBar">
                <td class="tbl11">领导模式:</td>
                <td class="tbl12">
                    <p>①直接领导，快速管理 ②运用过去经验解决问题 ③直接、明确地识别问题的核心 ④决策和执行决策非常迅速 ⑤传统型领导，尊重组织内部的等级和组织获得的成就</p>
                </td>
              </td>
            </tr>
            <tr node-type="toolBar">
                <td class="tbl11">领导模式:</td>
                <td class="tbl12">
                    <p>①直接领导，快速管理 ②运用过去经验解决问题 ③直接、明确地识别问题的核心 ④决策和执行决策非常迅速 ⑤传统型领导，尊重组织内部的等级和组织获得的成就</p>
                </td>
              </td>
            </tr>
            <tr node-type="toolBar">
                <td class="tbl11">领导模式:</td>
                <td class="tbl12">
                    <p>①直接领导，快速管理 ②运用过去经验解决问题 ③直接、明确地识别问题的核心 ④决策和执行决策非常迅速 ⑤传统型领导，尊重组织内部的等级和组织获得的成就</p>
                </td>
              </td>
            </tr>
            <tr node-type="toolBar">
                <td class="tbl11">领导模式:</td>
                <td class="tbl12">
                    <p>①直接领导，快速管理 ②运用过去经验解决问题 ③直接、明确地识别问题的核心 ④决策和执行决策非常迅速 ⑤传统型领导，尊重组织内部的等级和组织获得的成就</p>
                </td>
              </td>
            </tr>
            <tr node-type="toolBar">
                <td class="tbl11">适合报考专业:</td>
                <td class="tbl12">
                    <a><span>专业定位卡介绍>></span></a>
                </td>
              </td>
          </tr>
       </tbody>
     </table>    
</div>
<!--endprint-->
    <form action="action/export.php" method="post" name="hld_res" id="hideform">
      <input type="hidden" id="hide_content" name="html"/>
    </form>  
</body>
  <script>
    $(function () {
      //获取需要传递的Html代码 通过<!--startprint--><!--endprint-->截取
      bdhtml=window.document.body.innerHTML; 
      sprnstr="<!--startprint-->"; 
      eprnstr="<!--endprint-->"; 
      prnhtml=bdhtml.substr(bdhtml.indexOf(sprnstr)+17); 
      prnhtml=prnhtml.substring(0,prnhtml.indexOf(eprnstr)); 
      //将获取的html代码添加到隐藏域中传给php文件处理
      $("#hide_content").val(""+prnhtml+"");
    } );   

    $("#down").click(function(){
      $("#hideform").submit();
    }); 

  </script>
</html>