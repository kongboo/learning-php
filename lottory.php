<?php
$min=1;
$max=38;
$spc=8;
$count=6; //球顆數
$a_box= array();
$str='';
$str1='';
$str2='';


for($i=1; $i<=$count; $i++)
{  do{
   $num=mt_rand($min,$max);
   $str .= $num . ', ';
   }while(in_array($num,$a_box));
   $a_box[]=$num; 
}

$num2=mt_rand($min,$spc);
$num3= '<img src="images/' . $num2 . '.jpg">';
/*
echo "<pre>";
print_r($a_box);
print_r($str);
echo "</pre>";
*/


foreach($a_box as $one)
{
    $str1 .= '<img src="images/' . $one . '.jpg">';    
}

sort($a_box); //排序小到大
// rsort($a_box); //排序大到小

foreach($a_box as $one)
{
    $str2 .= '<img src="images/' . $one . '.jpg">';
}
$html = <<< HEREDOC
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>威力彩隨機產生器</title>
</head>
<body>
<h2>幸運樂透數字<h2>
<p>{$str2}特別號{$num3}</p>
<h2>開獎順序<h2>
<p>{$str1}特別號{$num3}</p>
</body>
</html>
HEREDOC;
echo $html;
?>
