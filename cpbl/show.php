<?php
$nickname = isset($_POST['nickname']) ? $_POST['nickname'] : '';
$gender   = isset($_POST['gender'])   ? $_POST['gender']   : '';
$blood    = isset($_POST['blood'])    ? $_POST['blood']    : '';
$birth_yy = isset($_POST['birth_yy']) ? $_POST['birth_yy'] : '';
$birth_mm = isset($_POST['birth_mm']) ? $_POST['birth_mm'] : '';
$birth_dd = isset($_POST['birth_dd']) ? $_POST['birth_dd'] : '';
$marriage = isset($_POST['marriage']) ? $_POST['marriage'] : '';
$hobby1   = isset($_POST['hobby1'])   ? $_POST['hobby1']   : '';
$hobby2   = isset($_POST['hobby2'])   ? $_POST['hobby2']   : '';
$hobby3   = isset($_POST['hobby3'])   ? $_POST['hobby3']   : '';
$hobby4   = isset($_POST['hobby4'])   ? $_POST['hobby4']   : '';
$intro    = isset($_POST['intro'])    ? $_POST['intro']    : '';
$constellation = '';

// 設定存檔的檔名
$filename = 'log/data_' . date('Ymd', time()) . '.txt';  // 每日存成不同的檔案

$today = date('Y-m-d H:i:s', time());

// 設定存檔的內容
$data = <<< HEREDOC
時間：{$today}
姓名：{$nickname}
密碼：{$password}
性別：{$gender}
血型：{$blood}
生日：{$birth_yy} 年 {$birth_mm} 月 {$birth_dd} 日
已婚：{$marriage}
-------------------------------------------------

HEREDOC;

// 設定存檔檔案若沒有，新建一個
if(!file_exists($filename))
{
   file_put_contents($filename, '');  
}
// 將最新的內容存在最上面
$old = file_get_contents($filename);
$new = $data . $old;
file_put_contents($filename, $new);

// 顯示網頁
$html = <<< HEREDOC
<!DOCTYPE html> 
<html> 
<head> 
<meta charset="UTF-8"> 
<title>Survey</title> 
</head> 
<body> 
<h2>{$nickname} 已收到你的資料如下</h2>
<p>姓名：{$nickname}</p>
<p>性別：{$gender}</p>
<p>血型：{$blood}</p>
<p>生日：{$birth_yy} 年 {$birth_mm} 月 {$birth_dd} 日 {$constellation}</p>
<p>已婚：{$marriage}</p>
<p>興趣：{$hobby1}, {$hobby2}, {$hobby3}, {$hobby4}</p>
<p>介紹：{$intro}</p>
</body> 
</html> 
HEREDOC;
echo $html; 
?>