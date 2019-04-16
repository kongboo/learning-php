<?php
include 'config.php';

$uid = isset($_GET['uid']) ? $_GET['uid'] : 0;


// 連接資料庫
$link = db_open();

$sqlstr = "SELECT * FROM batter WHERE uid=" . $uid;
$result = mysqli_query($link, $sqlstr);

if($row=mysqli_fetch_array($result))
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
   <form action="edit_save.php" method="post">
   <p>球員代碼：<input type="text" name="usercode" value="{$usercode}"></p>
   <p>球員姓名：<input type="text" name="username" value="{$username}"></p>
   <p>球員生日：<input type="text" name="birthday" value="{$birthday}"></p>
   <p>球隊：<input type="text" name="team" value="{$team}"></p>
   <p>打席：<input type="text" name="PA" value="{$PA}"></p>
   <p>打數：<input type="text" name="AB" value="{$AB}"></p>
   <p>打點：<input type="text" name="RBI" value="{$RBI}"></p>
   <p>得分：<input type="text" name="R" value="{$R}"></p>
   <p>安打：<input type="text" name="H" value="{$H}"></p>
   <p>二安：<input type="text" name="2B" value="{$H2B}"></p>
   <p>三安：<input type="text" name="3B" value="{$H3B}"></p>
   <p>全壘打：<input type="text" name="HR" value="{$HR}"></p>
   <p>四壞球：<input type="text" name="BB" value="{$BB}"></p>
   <p>犧身打：<input type="text" name="SA" value="{$SA}"></p>
   <p>備註：<input type="text" name="remark" value="{$remark}"></p> 
      <input type="hidden" name="uid" value="{$uid}">
      <input type="submit" value="送出">
   </form>
HEREDOC;
}
else
{
   $data = '找不到資料';
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

<h2 align="center">修改資料</h2>

{$data}

</body>
</html>
HEREDOC;

echo $html;
?>
