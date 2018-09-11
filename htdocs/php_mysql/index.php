<?php
require_once('lib/errorDP.php');
require_once('lib/dbConn.php');
//DB connection
$select_sql = "SELECT id,title,description FROM {$tableName} LIMIT 10";
$result     = mysqli_query($conn, $select_sql);
//initialization
$list = '';
$modify_link = '';
$article = array(
  'title'       => 'Welcome!',
  'description' => 'Lorem ipsum dolor sit amet, laborum.'
);
if($result != NULL){
  // 다중행 가져오기
  while($row = mysqli_fetch_array($result)){
    $esc_title  = htmlspecialchars($row['title']);
    $list       = $list."<a href=\"index.php?id={$row['id']}\"><li>{$esc_title}</li></a>";
  }
}else{
  $list = 'EMPTY DATA!!';
};

//escaping
if(isset($_GET['id'])){
  $filtered = array(
    'id' => mysqli_real_escape_string($conn,$_GET['id'])
  );
  $sql    = "SELECT id,title,description FROM {$tableName} WHERE id={$filtered['id']}";
  $result = mysqli_query($conn, $sql);
  $row    = mysqli_fetch_array($result);
  $article['title']       = htmlspecialchars($row['title']);
  $article['description'] = htmlspecialchars($row['description']);
  $modify_link            = '<a href="modify.php?id='.$filtered['id'].'">modify</a>';
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
    <?=$modify_link ?>
    <h2><?=$article['title']?></h2>
    <?=$article['description']?>
  </body>
</html>
