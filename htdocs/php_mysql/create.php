<?php
require_once('lib/errorDP.php');
require_once('lib/dbConn.php');
//DB connection
//escape table name
$use_table  = mysqli_real_escape_string($conn, $tableName);
$select_sql = "SELECT id,title,description FROM {$use_table} LIMIT 10";
$result     = mysqli_query($conn, $select_sql);

//initialization

$list = '';
$modify_link = '';
$article = array(
  'title'       => 'Welcome!',
  'description' => 'Lorem ipsum dolor sit amet, laborum.'
);

//결과값이 있을 때
if($result != NULL){
  $bold_text = "class=\"bold_text\"";
  // 다중행 가져오기
  while($row = mysqli_fetch_array($result)){
    $esc_title  = htmlspecialchars($row['title']);
    $esc_id     = htmlspecialchars($row['id']);
    $now_page = '';
    if(isset($_GET['id']))$now_page = $esc_id === $_GET['id'] ? 'class="bold_text"' : '';
    $list       = $list."<a href=\"index.php?id={$esc_id}\"><li>{$esc_title}</li></a>";
  }
}else{
  $list = 'EMPTY DATA!!';
};
?>
<!DOCTYPE html>
<html lang="ko">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <title>WEB</title>
  </head>
  <body>
    <h1><a href="index.php">WEB</a></h1>
    <ol>
      <?=$list?>
    </ol>
    <a <?=$bold_text ?> href="create.php">create</a>
    <form action="process_create.php" method="POST">
      <p><input type="text" name="title" placeholder="타이틀"/></p>
      <p><textarea name="description" placeholder="내용"></textarea></p>
      <p><input type="submit" value="CREATE"/></p>
    </form>
  </body>
</html>
