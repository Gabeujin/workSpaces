<?php
require_once('lib/errorDP.php');
require_once('lib/dbConn.php');

$sql = "SELECT id,title,description FROM {$tableName} LIMIT 10";
$result = mysqli_query($conn, $sql);
$list ='';
$filtered = array(
  'id'          => '',
  'title'       => '',
  'description' => ''
);

if(($result->num_rows) > 0){
  while($row = mysqli_fetch_array($result)){
    $filtered['id']           = htmlspecialchars($row['id']);
    $filtered['title']        = htmlspecialchars($row['title']);
    $filtered['description']  = htmlspecialchars($row['description']);

    $list = $list."<a href=\"index.php?id={$filtered['id']}\"><li>{$filtered['title']}</li></a>";
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
    <form action="process_modify.php" method="POST">
      <p><input type="text" name="title" placeholder="타이틀" value=<?=$filtered['title'] ?> /></p>
      <p><textarea name="description" placeholder="내용"><?=$filtered['description'] ?></textarea></p>
      <p><input type="submit" value="MODIFY"/></p>
    </form>
  </body>
</html>
