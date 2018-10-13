<?php
require_once('lib/errorDP.php');
require_once('lib/dbConn.php');

$create_sql = " SELECT title,description
                FROM {$tableName}
                LIMIT 10";

// 1 row(단일 행)
$result = mysqli_query($conn, $create_sql);
$row = mysqli_fetch_array($result);
print_r("<h1>".$row['title']."</h1>");
print_r("<p>".$row['description']."</p>");
print_r("<hr/>");

// ALL row(다중 행)
$create_sql = " SELECT title,description
                FROM {$tableName}
                LIMIT 10";
$result = mysqli_query($conn, $create_sql);

//PHP 에서 NULL과 FALSE는 같다
while(($row = mysqli_fetch_array($result)) != FALSE){
  print_r("<h1>".$row['title']."</h1>");
  print_r("<p>".$row['description']."</p>");
};

//null ( 결국 row를 추출할때는 한개의 행씩 추출되어지고 마지막엔 null값이 넘어온다)
var_dump($row = mysqli_fetch_array($result));
 ?>
