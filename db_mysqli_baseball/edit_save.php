<?php
include 'config.php';

$uid      = isset($_POST['uid'])      ? $_POST['uid']      : '';

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

$sqlstr  = "UPDATE batter SET ";
$sqlstr .= "usercode='$usercode', ";
$sqlstr .= "username='$username', ";
$sqlstr .= "birthday ='$birthday' , ";
$sqlstr .= "team='$team', ";
$sqlstr .= "PA='$PA', ";
$sqlstr .= "AB='$AB', ";
$sqlstr .= "RBI='$RBI', ";
$sqlstr .= "R='$R', ";
$sqlstr .= "H='$H', ";
$sqlstr .= "2B='$H2B', ";
$sqlstr .= "3B='$H3B', ";
$sqlstr .= "HR='$HR', ";
$sqlstr .= "TB='$TB', ";
$sqlstr .= "AVG='$AVG', ";
$sqlstr .= "BB='$BB', ";
$sqlstr .= "SA='$SA', ";
$sqlstr .= "OBP='$OBP', ";
$sqlstr .= "SLG='$SLG', ";
$sqlstr .= "OPS='$OPS', ";
$sqlstr .= "remark  ='$remark' ";  // 注意最後欄位沒有逗號
$sqlstr .= "WHERE uid=" . $uid;


if(mysqli_query($link, $sqlstr))
{
   $msg = '資料已修改完畢!!!!!!!!';
   $msg .= '<br><a href="display.php?uid=' . $uid . '">詳細</a>';
}
else
{
   $msg = '資料無法修改!!!!!!!';
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
</body>
</html>
HEREDOC;

echo $html;
?>
