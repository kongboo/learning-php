<?php

$min=1;
$max=49;
$total=6;

$a_full = range($min,$max);
shuffle($a_full);
$a_box = array_slice($a_full, 0, $total);

echo "<pre>";
print_r($a_box);
echo "</pre>";

sort($a_box);

$str = '';
foreach($a_box as $one)
{
    $str .= '<img src="images/' . ($one) . '.jpg">';
}


$html = <<< HEREDOC
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Lotto6</title>
</head>
<body>
<p>幸運樂透數字</p>
<p>{$str}</p>
</body>
</html>
HEREDOC;
echo $html;
?>