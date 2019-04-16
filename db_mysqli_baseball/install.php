<?php
include 'config.php';

$table_name = 'batter'; // 指定資料表名稱

$sqlstr_install_table = '
CREATE TABLE batter (
  uid int NOT NULL auto_increment,
  usercode varchar(255) NULL,
  username varchar(255) NULL,
  birthday date NULL,
  team varchar(255) NULL,
  PA  int default NULL,
  AB  int default NULL,
  RBI int default NULL,
  R   int default NULL,
  H   int default NULL,
  2B  int default NULL,
  3B  int default NULL,
  HR  int default NULL,
  TB  int default NULL,
  AVG float default NULL,
  BB  int default NULL,
  SA  int default NULL,
  OBP float default NULL,
  SLG float default NULL,
  OPS float default NULL,
  remark   varchar(255) NULL,
  PRIMARY KEY  (uid)
  )
';


$op = isset($_GET['op']) ? $_GET['op'] : 'HOME';

$msg = '';
switch($op)
{
   case 'CREATE_TABLE' :
        $link = db_open();

        $sqlstr = $sqlstr_install_table;
        $result = mysqli_query($link, $sqlstr);   
        $msg .= '資料表『' . $table_name . '』';
        $msg .= $result ? '建立完成！' : '無法建立！<br/>'.mysqli_error($link);
        break;


   case 'DROP_TABLE' :
        $link = db_open();

        $sqlstr = 'DROP TABLE ' . $table_name;
        $result = mysqli_query($link, $sqlstr);   
        $msg .= '資料表『' . $table_name . '』';
        $msg .= $result ? '刪除完成！' : '無法刪除！<br/>'.mysqli_error($link);
        break;

 
   case 'CREATE_DATABASE' :
        // $link = mysqli_connect(DB_SERVERIP, DB_USERNAME, DB_PASSWORD, DB_DATABASE) or die(ERROR_CONNECT);
        $link = mysqli_connect(DB_SERVERIP, DB_USERNAME, DB_PASSWORD, '') or die(ERROR_CONNECT);
        if(defined('SET_CHARACTER')) mysqli_query($link, SET_CHARACTER) or die(ERROR_CHARACTER);

        $sqlstr = 'CREATE DATABASE ' . DB_DATABASE . ' DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci';
        $result = mysqli_query($link, $sqlstr);   
        $msg .= '資料庫『' . DB_DATABASE . '』';
        $msg .= $result ? '建立完成！' : '無法建立！<br/>'.mysqli_error($link);
        break;


  default:
      $msg = '';
}



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
<h2>資料庫安裝程式</h2>
<ul>
   <li><a href="install.php?op=CREATE_TABLE">安裝資料表 (batter)</a></li>
   <li><a href="install.php?op=DROP_TABLE">移除資料表 (batter)</a></li>
   <li><a href="install.php?op=CREATE_DATABASE">安裝資料庫 (class)</a></li>
</ul>
<hr />
{$msg}

</body>
</html>
HEREDOC;

echo $html;
?>
