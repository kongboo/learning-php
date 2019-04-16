<?php
include 'config.php';

$uid = isset($_GET['uid']) ? $_GET['uid'] : 0;

// 連接資料庫
$link = db_open();

// 寫出 SQL 語法
$sqlstr = "SELECT * FROM batter WHERE uid=" . $uid;

// 執行 SQL
$result = mysqli_query($link, $sqlstr) or die(ERROR_QUERY);

if($row=mysqli_fetch_array($result, MYSQLI_ASSOC))
{
   $uid      = $row['uid'];
   $usercode = $row['usercode'];
   $username = $row['username'];
   $birthday  = $row['birthday'];
   $team  = $row['team'];
  
   $PA   = $row['PA'];
   $AB   = $row['AB'];
   $RBI  = $row['RBI'];
   $R    = $row['R'];
   $H    = $row['H'];
   $H2B  = $row['2B'];
   $H3B  = $row['3B'];
   $HR   = $row['HR'];
   $TB   = $row['TB'];
   $AVG  = $row['AVG'];
   $BB   = $row['BB'];
   $SA   = $row['SA'];
   $OBP  = $row['OBP'];
   $SLG  = $row['SLG'];
   $OPS  = $row['OPS'];
   $remark   = $row['remark'];

   $data = <<< HEREDOC
   <table border="1">
      <tr>
        <th>代碼</th>
        <td>{$usercode}</td>
      </tr>
      <tr>
        <th>姓名</th>
        <td>{$username}</td>
      </tr>
      <tr>
        <th>生日</th>
        <td>{$birthday}</td>
      </tr>
      <tr>
        <th>對手</th>
        <td>{$team}</td>
      </tr>
      <tr>
        <th>打席</th>
        <td>{$PA}</td>
      </tr>
      <tr>
        <th>打數</th>
        <td>{$AB}</td>
      </tr>
      <tr>
        <th>打點</th>
        <td>{$RBI}</td>
      </tr>
      <tr>
        <th>得分</th>
        <td>{$R}</td>
      </tr>
      <tr>
        <th>安打</th>
        <td>{$H}</td>
      </tr>  
      <tr>
        <th>二安</th>
        <td>{$H2B}</td>
      </tr>  
      <tr>
        <th>三安</th>
        <td>{$H3B}</td>
      </tr>  
      <tr>
        <th>全壘打</th>
        <td>{$HR}</td>
      </tr>  
      <tr>
        <th>四壞球</th>
        <td>{$BB}</td>
      </tr>  
      <tr>
        <th>犧身打</th>
        <td>{$SA}</td>
      </tr>  
      <tr>
        <th>備註</th>
        <td>{$remark}</td>
      </tr>
    </table>
HEREDOC;
}
else
{
  $data = '找不到資料！';
}

db_close($link);


$html = <<< HEREDOC
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>基本資料庫系統</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<p><a href="index.php">回首頁</a></p>

<h2>詳細資料</h2>

{$data}

</body>
</html>
HEREDOC;

echo $html;
?>
