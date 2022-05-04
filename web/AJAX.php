<?php
$host = "localhost";
$username = "root";
$passwd = "";
$database = "野村專題一";
//建立資料庫物件
$kt_conn = new mysqli($host, $username, $passwd, $database);
if ($kt_conn -> connect_error){
  echo "連結mysql資料庫失敗";
}
else{
  $kt_conn->query("SET NAMES 'utf8'");
  //連結mysql資料庫成功，語系設為utf8
}

//接收從前端傳來的內容，撈取資料後透過ajax丟回前端
if($_GET['txt'] != "") {
  @$n = $_GET['txt'];
  /*從score資料表，撈取所有欄位(用*米字號)，當所傳來的值是字首、中、尾有符合(LIKE)資料name欄位的名字，
    就會呼叫出來，並且透過id欄位來設定為降序(ASC是升序(小跑到大)、DESC是降序(大跑到小))*/
  $sql = "SELECT * FROM dog WHERE title LIKE '%$n%' ORDER BY dex ASC";
  $score_result = $kt_conn->query($sql);
}

echo "<table border='1'>
      <tr>
        <th>dex</th>
        <th>日期</th>
        <th>標題</th>
        <th>讚數</th>
      </tr>";

  if(!@$score_result) {
    echo "親愛的棧友們~請輸入名字";
  }
  else{
    while($row = @$score_result->fetch_assoc() )
    {
        echo "<tr>";
          echo "<td>" . $row['dex'] . "</td>";
          echo "<td>" . $row['day'] . "</td>";
          echo "<td>" . $row['title'] . "</td>";
          echo "<td>" . $row['good'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
  }

//關閉資料庫
$kt_conn->close();
?>