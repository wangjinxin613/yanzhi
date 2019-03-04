// JavaScript Document
$(document).ready(function(e){
  //向div里面仍三个下拉
   var str = "<select id='sheng'></select><select id='shi'></select><select id='qu'></select>";
  $("#sanjiliandong").html(str);//三个下拉显示
        
    
  //当省选中的话市也会跟着变去也会变。市和区都会加载一遍
  FillSheng();//省
  FillShi();//市
  FillQu();//区
  //给省加点击事件
  $("#sheng").change(function(){
      FillShi();//市
      FillQu();//区
    })
  //给市加点击事件
  $("#shi").change(function(){
      FillQu();//区
    })
});
//做三个方法分别为省市区
//填充省的方法，如何在表里查询 出省的代号例如：北京0001、天津0001,中国下面所有省都是0001开头的
function FillSheng()
{
  var pcode = "0001";
  $.ajax({
    async:false,
    url:"chuli.php",
    data:{pcode:pcode},
    type:"POST",
    dataType:"TEXT",
    success: function(data){
      //返回数据,根据行于行之间的分隔符来拆,拆完之后会返回一数组/行的数组
      var hang = data.split("|");
       
      var str = "<option value='' >请选择地区</option>";
      //把行的数组遍历下用for循环...length长度
      for(var i=0;i<hang.length;i++)
      {
        //把行的索引i在拆下.列与列的分隔符再拆
        var lie = hang[i].split("^");//这是列的数组
        str += "<option value='"+lie[0]+"'>"+lie[1]+"</option>";
         
        $("#sheng").html(str);
      }
    }
  });
}
//填充市的方法
function FillShi()
{
  var pcode = $("#sheng").val();
  $.ajax({
    async:false,//****
    url:"chuli.php",
    data:{pcode:pcode},
    type:"POST",
    dataType:"TEXT",
    success: function(data){
      //返回数据,根据行于行之间的分隔符来拆,拆完之后会返回一数组/行的数组
      var hang = data.split("|");
       
      var str = "<option value='' >请选择城市</option>";
      //把行的数组遍历下用for循环...length长度
      for(var i=0;i<hang.length;i++)
      {
        //把行的索引i在拆下.列与列的分隔符再拆
        var lie = hang[i].split("^");//这是列的数组
        str += "<option value='"+lie[0]+"'>"+lie[1]+"</option>";
      }
      $("#shi").html(str);
    }
  });
}
//填充区的方法
function FillQu()
{
  var pcode = $("#shi").val();
  $.ajax({
    async:false,
    url:"chuli.php",
    data:{pcode:pcode},
    type:"POST",
    dataType:"TEXT",
    success: function(data){
      //返回数据,根据行于行之间的分隔符来拆,拆完之后会返回一数组/行的数组
      var hang = data.split("|");
       
      var str = "<option value='' >请选择乡县</option>";
      //把行的数组遍历下用for循环...length长度
      for(var i=0;i<hang.length;i++)
      {
        //把行的索引i在拆下.列与列的分隔符再拆
        var lie = hang[i].split("^");//这是列的数组
        str += "<option value='"+lie[0]+"'>"+lie[1]+"</option>";
         
        $("#qu").html(str);
      }
    }
  });
}