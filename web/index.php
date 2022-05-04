<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>AJAX-jquery站內搜尋</title>


<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" >
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
</head>
<body align="center">
<section class="section-1">
  <div class="container alert ">
    <div class="row box1">
      <div class="col-md-5 panel1">
          <div class="panel1_sblock">
              <h4>AJAX-站內搜尋</h4>
              <input class="search" name="username" id="username" >
              <p>請輸入您要查詢的名字</p>
          </div>
      </div>
      <div class="col-md-7 panel2">
        <div class="text-center">
          <!-- loading icon旋轉小圖示 -->
          <div id="load"></div>
          <!-- 呼叫的後端資料 -->
          <div id="result">
            <img src="https://4.bp.blogspot.com/-jdGreROMIPs/XEKoh9IsHUI/AAAAAAAAHwU/z-85iqyPyfkxud0Uov1tsFI1fK9zuHVSQCK4BGAYYCw/s1600/%25E8%25B3%25BD%25E4%25BA%259E%25E4%25BA%25BA%25E5%2598%259F%25E5%2598%25B4.jpg">
            <br>
            <b>查詢結果會秀出在這邊呦~~棧友們</b>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script>
$(document).ready(function() { //文件準備
  $("input.search").keydown(function(){ //填上標籤選擇器後的search，事件為鍵盤按下
    $("input.search").css("background-color", "#d3f9fc"); //鍵盤按下，欄位就變色
    $("#load").html('<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i>'); //填上id選擇器，呼叫loading icon
  });
      $("input.search").keyup(function() {
        $("input.search").css("background-color", "#ffffff"); //鍵盤彈開，欄位就變白色
        $("#load").html(''); //清除 loading icon
          //使用ajax將傳給後端來做回應
          $.ajax({
            type : "GET",
            url : "AJAX.php",
            data : {
              txt : $("#username").val(), //將id存入txt參數，傳給後端做接收
            },
            dataType : 'html' //設定該網頁回應的會是 html 格式
          }).done(function(data) {
            //成功會秀出
            if(data == ""){
              $('#result').hide();
            }else{
              $('#result').html(data).show();
            }
            console.log(data);
          }).fail(function(jqXHR, textStatus, errorThrown) {
            //失敗會秀出
            alert("有錯誤，請至 console log查看原因");
            console.log(jqXHR.responseText);
          });
      });
});
</script>
</body>
</html>