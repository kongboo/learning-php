<?php

$a_batter = array( 
   array("no"=>"B001", "name"=>"Alan" , "AB"=>99,"H"=>33, "BB"=>13 ),
   array("no"=>"B002", "name"=>"Bruce", "AB"=>50, "H"=>17, "BB"=>2 ),
   array("no"=>"B003", "name"=>"Candy", "AB"=>74, "H"=>25, "BB"=>3 ),
   array("no"=>"B004", "name"=>"David", "AB"=>67, "H"=>23, "BB"=>7 ),
   array("no"=>"B005", "name"=>"Eric" , "AB"=>83, "H"=>17, "BB"=>8 ),
   array("no"=>"B006", "name"=>"Ford" , "AB"=>34, "H"=>13, "BB"=>6 ) );                    

$count = count($a_batter);

$sum_AB = 0;  // 總打數
$sum_H = 0;  // 總安打
$sum_BB = 0;  // 總保送

$str = '';
foreach($a_batter as $row)
{
   // 計算個人的成績
   $AVG = round($row["H"]/$row["AB"], 3);
   $OBP = round(($row["H"] + $row["BB"])/($row["AB"]+ $row["BB"]), 3);
      
   $str .= '<tr>';
   $str .= '<td bgcolor="#FFEEDD">' . $row["no"] . '</td>';
   $str .= '<td bgcolor="#FFEEDD">' . $row["name"] . '</td>';
   $str .= '<td bgcolor="#FFEEDD">' . $row["AB"] . '</td>';
   $str .= '<td bgcolor="#FFEEDD">' . $row["H"] . '</td>';
   $str .= '<td bgcolor="#FFEEDD">' . $row["BB"] . '</td>';
   $str .= '<td bgcolor="#FFCCDD">' . $AVG . '</td>';
   $str .= '<td bgcolor="#FFCCDD">' . $OBP . '</td>';
   $str .= '</tr>';
   
   // 計算全班的總分
   $sum_AB += $row["AB"];
   $sum_H += $row["H"];
   $sum_BB += $row["BB"];
}

$AVG_AB = round($sum_AB / $count);
$AVG_H = round($sum_H / $count);
$AVG_BB = round($sum_BB / $count);

// 顯示最後一排 (全班的統計)
$str .= '<tr>';
$str .= '<th colspan="2">◇全班平均◇</th>';
$str .= '<td bgcolor="#FFCCDD">' . $AVG_AB . '</td>';
$str .= '<td bgcolor="#FFCCDD">' . $AVG_H . '</td>';
$str .= '<td bgcolor="#FFCCDD">' . $AVG_BB . '</td>';
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