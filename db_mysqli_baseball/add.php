<?php

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
<h2 align="center">新增資料</h2>

<form action="add_save.php" method="post">
  <p>球員代碼：<input type="text" name="usercode"></p>
  <p>球員姓名：<input type="text" name="username"></p>
  <p>生日：<input type="text" name="birthday"></p>
  <p>球隊：<input type="text" name="team"></p>
  <p>打席：<input type="text" name="PA"></p>
  <p>打數：<input type="text" name="AB"></p>
  <p>打點：<input type="text" name="RBI"></p>
  <p>得分：<input type="text" name="R"></p>
  <p>安打：<input type="text" name="H"></p>
  <p>二安：<input type="text" name="2B"></p>
  <p>三安：<input type="text" name="3B"></p>
  <p>全壘打：<input type="text" name="HR"></p>
  <p>四壞球：<input type="text" name="BB"></p>
  <p>犧身打：<input type="text" name="SA"></p>
  <p>備註：<input type="text" name="remark"></p>
  <input type="submit" value="新增">
</form>
 
</body>
</html>
HEREDOC;

echo $html;
?>
