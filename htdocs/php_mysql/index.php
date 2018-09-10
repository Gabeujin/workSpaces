<?php
require_once('lib/errorDP.php');
require_once('lib/dbConn.php');
//DB connection
$select_sql = "SELECT id,title,description FROM {$tableName} LIMIT 10";
$result     = mysqli_query($conn, $select_sql);
//initialization
$list = '';
$article = array(
  'title'       => 'Welcome!',
  'description' => 'Lorem ipsum dolor sit amet, laborum.'
);
if($result != NULL){
  // 다중행 가져오기
  while($row = mysqli_fetch_array($result)){
    $list = $list."<a href=\"index.php?id={$row['id']}\"><li>{$row['title']}</li></a>";
  }
}else{
  $list = 'EMPTY DATA!!';
};

if(isset($_GET['id'])){
  $sql    = "SELECT id,title,description FROM topic WHERE id={$_GET['id']}";
  $result = mysqli_query($conn, $sql);
  $row    = mysqli_fetch_array($result);
  $article['title']       = $row['title'];
  $article['description'] = $row['description'];
};
?>
<!DOCTYPE html>
<html lang="ko">
  <head>
    <meta charset="utf-8">
    <title>WEB</title>
  </head>
  <body>
    <h1><a href="index.php">WEB</a></h1>
    <ol>
      <?=$list?>
    </ol>
    <a href="create.php">create</a>
    <h2><?=$article['title']?></h2>
    <?=$article['description']?>
  </body>
</html>
