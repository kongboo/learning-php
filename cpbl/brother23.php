<?php

$a_batter = array( 
   array("YEAR"=>"Y2001", "name"=>"01-恰恰", "PA"=>169, "AB"=>136, "H"=>43, "2B"=>5, "3B"=>1, "HR"=>5, "BB"=>25 ),
   array("YEAR"=>"Y2002", "name"=>"02-恰恰", "PA"=>358, "AB"=>277, "H"=>86, "2B"=>17, "3B"=>3, "HR"=>18, "BB"=>62 ),
   array("YEAR"=>"Y2003", "name"=>"03-恰恰", "PA"=>443, "AB"=>369, "H"=>131, "2B"=>25, "3B"=>3, "HR"=>18, "BB"=>54 ),
   array("YEAR"=>"Y2004", "name"=>"04-恰恰", "PA"=>425, "AB"=>338, "H"=>127, "2B"=>14, "3B"=>3, "HR"=>18, "BB"=>69 ),
   array("YEAR"=>"Y2005", "name"=>"05-恰恰", "PA"=>331, "AB"=>274, "H"=>93, "2B"=>8, "3B"=>3, "HR"=>14, "BB"=>47 ),
   array("YEAR"=>"Y2006", "name"=>"06-恰恰", "PA"=>190, "AB"=>154, "H"=>54, "2B"=>10, "3B"=>0, "HR"=>6, "BB"=>25 ) );                    

$count = count($a_batter);

$sum_AB = 0;  // 總打數
$sum_H = 0;  // 總安打
$sum_2B = 0;  // 總二安
$sum_3B = 0;  // 總三安
$sum_HR = 0;  // 總全壘打
$sum_TB = 0;  // 總壘打數
$sum_BB = 0;  // 總保送
$sum_AVG = 0;
$sum_OBP = 0;  
$sum_OPS = 0;  

$str = '';
foreach($a_batter as $row)
{
   // 計算個人的成績
   $TB = $row["H"] + $row["2B"] + ($row["3B"] * 2) + ($row["HR"] * 3); 
   $AVG = round($row["H"] / $row["AB"], 3);
   $OBP = round(($row["H"] + $row["BB"]) / ($row["AB"] + $row["BB"]), 3);
      
   $str .= '<tr>';
   $str .= '<td bgcolor="#FFEEDD">' . $row["YEAR"] . '</td>';
   $str .= '<td bgcolor="#FFEEDD">' . $row["name"] . '</td>';
   $str .= '<td bgcolor="#FFEEDD">' . $row["AB"] . '</td>';
   $str .= '<td bgcolor="#FFEEDD">' . $row["H"] . '</td>';
   $str .= '<td bgcolor="#FFEEDD">' . $row["2B"] . '</td>';
   $str .= '<td bgcolor="#FFEEDD">' . $row["3B"] . '</td>';
   $str .= '<td bgcolor="#FFEEDD">' . $row["HR"] . '</td>';
   $str .= '<td bgcolor="#FFEEDD">' . $TB . '</td>';   
   $str .= '<td bgcolor="#FFEEDD">' . $row["BB"] . '</td>';
   $str .= '<td bgcolor="#FFCCDD">' . $AVG . '</td>';
   $str .= '<td bgcolor="#FFCCDD">' . $OBP . '</td>';
   $str .= '</tr>';
   
   // 總計
   $sum_AB += $row["AB"];
   $sum_H += $row["H"];
   $sum_2B += $row["2B"];
   $sum_3B += $row["3B"];
   $sum_HR += $row["HR"];
   $sum_TB += $TB; 
   $sum_BB += $row["BB"];
   $sum_AVG += $AVG;
   $sum_OBP += $OBP;     
}

$avg_AVG = round($sum_AVG / $count, 3);
$avg_OBP = round($sum_OBP / $count, 3);
$avg_BB = round($sum_BB / $count, 3);


// 顯示最後一排 (全班的統計)
$str .= '<tr>';
$str .= '<th colspan="2">◇生涯成績◇</th>';
$str .= '<td bgcolor="#FFCCDD">' . $sum_AB . '</td>';
$str .= '<td bgcolor="#FFCCDD">' . $sum_H . '</td>';
$str .= '<td bgcolor="#FFCCDD">' . $sum_2B . '</td>';
$str .= '<td bgcolor="#FFCCDD">' . $sum_3B . '</td>';
$str .= '<td bgcolor="#FFCCDD">' . $sum_HR . '</td>';
$str .= '<td bgcolor="#FFCCDD">' . $sum_TB . '</td>';
$str .= '<td bgcolor="#FFCCDD">' . $sum_BB . '</td>';
$str .= '<td bgcolor="#FFCCDD">' . $avg_AVG . '</td>';
$str .= '<td bgcolor="#FFCCDD">' . $avg_OBP . '</td>';
$str .= '</tr>';


$html = <<< HEREDOC
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>成績統計計算</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<h1>打擊成績一覽表</h1>
<table border="1" cellspacing="0" cellpadding="3" bgcolor="#CCEEFF">
   <tr bgcolor="#CCEEFF">
      <th>編號</th>
      <th>姓名</th>
      <th>打數</th>
      <th>安打</th>
      <th>二安</th>
      <th>三安</th>
      <th>全壘打</th>
      <th>壘打數</th> 
      <th>保送</th>
      <th>打擊率</th>
      <th>上壘率</th>
   </tr>
   {$str}
</table>
</body>
</html>
HEREDOC;

echo $html;
?>