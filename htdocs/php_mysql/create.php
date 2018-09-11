<?php
require_once('lib/errorDP.php');
require_once('lib/dbConn.php');

$sql = "SELECT id,title FROM {$tableName} LIMIT 10";
$result = mysqli_query($conn, $sql);
$list ='';

if(($result->num_rows) > 0){
  while($row = mysqli_fetch_array($result)){
    $list = $list."<a href=\"index.php?id={$row['id']}\"><li>{$row['title']}</li></a>";
  }
}else{
  $list ='EMPTY DATA!!';
}
?>
<!DOCTYPE html>
<html lang="ko">
  <head>
    <meta charset="utf-8">
    <title>WEB</title>
  </head>
  <body>
    <h1><a href='index.php'>WEB</a></h1>
    <ol>
      <?=$list?>
    </ol>
    <form action="process_create.php" method="POST">
      <p><input type="text" name="title" placeholder="타이틀"/></p>
      <p><textarea name="description" placeholder="내용"></textarea></p>
      <p><input type="submit" value="CREATE"/></p>
    </form>
  </body>
</html>
