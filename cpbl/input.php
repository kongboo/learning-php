<?php

$html= <<< HEREDOC

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Survey</title>
</head>

<body>
<h1>問卷調查</h1>
<p>請輸入你的個人基本資料</p>

<form method="post" action="show.php">

  <p>姓名：<input type="text" name="nickname"></p>

  <p>性別：  
    <input type="radio" name="gender" value="M">男
    <input type="radio" name="gender" value="F">女
  </p>

  <p>血型：
    <input type="radio" name="blood" value="A">A
    <input type="radio" name="blood" value="B">B
    <input type="radio" name="blood" value="O">O
    <input type="radio" name="blood" value="AB">AB
    <input type="radio" name="blood" value="N">未知
  </p>

  <p><input type="submit" value="送出"></p>

</form>
</body>
</html>

HEREDOC;

echo $html

?>

