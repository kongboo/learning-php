<?php
include 'config.php';

$usercode = isset($_POST['usercode']) ? $_POST['usercode'] : '';
$username = isset($_POST['username']) ? $_POST['username'] : '';
$birthday  = isset($_POST['birthday'])  ? $_POST['birthday']  : '';
$team  = isset($_POST['team'])  ? $_POST['team']  : '';

$PA   = isset($_POST['PA'])   ? $_POST['PA']   : '0';
$AB   = isset($_POST['AB'])   ? $_POST['AB']   : '0';
$RBI  = isset($_POST['RBI'])  ? $_POST['RBI']  : '0';
$R    = isset($_POST['R'])    ? $_POST['R']    : '0';
$H    = isset($_POST['H'])    ? $_POST['H']    : '0';
$H2B  = isset($_POST['2B'])  ? $_POST['2B']  : '0';
$H3B  = isset($_POST['3B'])  ? $_POST['3B']  : '0';
$HR   = isset($_POST['HR'])   ? $_POST['HR']   : '0';
$BB   = isset($_POST['BB'])   ? $_POST['BB']   : '0';
$SA   = isset($_POST['SA'])   ? $_POST['SA']   : '0';
$remark   = isset($_POST['remark'])   ? $_POST['remark']   : '';

$TB   = $H + $H2B + (2 * $H3B) + (3 * $HR);
$AVG  = round($H / $AB, 3);
$OBP  = round(($H +$BB)/($AB +$BB+$SA), 3);
$SLG  = round($TB / $AB, 3);
$OPS  = round($OBP +$SLG, 3);

// 連接資料庫
$link = db_open();

// 寫出 SQL 語法
$sqlstr = "INSERT INTO batter(usercode, username, birthday, team, PA, AB, RBI, R, H, 2B, 3B, HR, TB, AVG, BB, SA, OBP, SLG, OPS, remark) 
           VALUES ('$usercode', '$username', '$birthday', '$team', '$PA', '$AB', '$RBI', '$R', '$H', '$H2B', '$H3B', '$HR', '$TB', '$AVG', '$BB', '$SA', '$OBP', '$SLG', '$OPS', '$remark') ";

// 執行 SQL
if(mysqli_query($link, $sqlstr))
{
   $new_uid = mysqli_insert_id($link);    // 傳回剛才新增記錄的 auto_increment 的欄位值
   
   $msg = '資料已新增!!!!!!!!<br/>';
   $msg .= '<a href="display.php?uid=' . $new_uid . '">詳細</a>';
}
else
{
   $msg = '資料無法新增!!!!!!!!';
   $msg .= '<hr>' . $sqlstr . '<hr>' . mysqli_error($link);
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

{$msg}
<p><a href="add.php">新增資料</a></p>
</body>
</html>
HEREDOC;

echo $html;
?>
