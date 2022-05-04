<!DOCTYPE html>
<html lang="zh-TW">
<head>
	<meta charset="utf-8">
	<title>web</title>
	<link rel="stylesheet" href="css/styles.css">
</head>
<body>
	<div class="header col-12 col-s-12 col-m-12">
		<div class="headsplit col-7">
			<span class="title">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;WEB TITLE</span>
		</div>
		<div class="headsplit col-5">
			<div class="set1 col-3">
			</div>		
			<div class="set1 col-3">
				<a href="" class="a full">
					<span class="headfont">總表</span>
				</a>
			</div>
			<div class="set1 col-3">
				<a href="" class="a">
					<span class="headfont">首頁</span>
				</a>
			</div>	
			<div class="set1 col-3">
				<a href="" class="a">
					<span class="headfont">回頂部</span>
				</a>	
			</div>

		</div>
	</div>
	<div class="search_bar col-12 col-s-12 col-m-12">
		<div class="col-1">&nbsp;</div>
		<div class="col-10">
			<section class="section-1">
				    <div class="panel1_sblock">
				        <h4>AJAX-站內搜尋</h4>
				        <input class="search" name="username" id="username" >
				        <p>請輸入您要查詢的名字</p>
				    </div>
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
				</section>
		</div>	
		<div class="col-1">&nbsp;</div>
	</div>



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
	<div class='footer col-12 col-s-12 col-m-12'>
		<div class="col-1">&nbsp;</div>
		<div class="logo_part col-2"><span class="logo">WEB TITLE</span></div>
		<div class="col-1">&nbsp;</div>
		<div class="team col-6">
			<span class="word">野村投信專題一</span>
			<br>
			<span class="word">台灣大學 : </span>
			<span class="word">財金四 | 莊子揚&nbsp;&nbsp;&nbsp;&nbsp;財金四 | 簡辰芳&nbsp;&nbsp;&nbsp;&nbsp;財金碩一 | 簡君哲&nbsp;&nbsp;&nbsp;&nbsp;會研碩二 | 鄭羽倢</span>
			<br>
			<span class="word">東吳大學 : </span>
			<span class="word">巨資二 | 謝天青</span>
		</div>
		<div class="col-2">&nbsp;</div>
	</div>
</body>
</html>