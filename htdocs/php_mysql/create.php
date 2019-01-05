<?php
// require_once('lib/errorDP.php');
require_once('lib/dbConn.php');
require_once('lib/nowPage.php');
//escape table name
$use_table  = mysqli_real_escape_string($conn, $tableName);
$join_table = mysqli_real_escape_string($conn, $joinTable);
$select_sql = " SELECT id,title,description FROM ".$use_table." LIMIT 10";
$result     = mysqli_query($conn, $select_sql);

$list         = '';
$modify_link  = '';
$bold_text    = '';

//결과값이 있을 때
if($result != NULL){
  $bold_text = 'class="bold_text"';
  // 다중행 가져오기
  while($row = mysqli_fetch_array($result)){
    $esc_title  = htmlspecialchars($row['title']);
    $esc_id     = htmlspecialchars($row['id']);
    $list       = $list."<a href=\"index.php?id={$esc_id}\"><li>{$esc_title}</li></a>";
  }
}else{
  $list = 'EMPTY DATA!!';
};

//저자 리스트 출력
$select_sql   = " SELECT id,name FROM ".$join_table." LIMIT 10";
$result       = mysqli_query($conn,$select_sql);
$select_form  = '<select name="author_id">';
while($row = mysqli_fetch_array($result)){
  $esc_name       = htmlspecialchars($row['name']);
  $esc_author_id  = htmlspecialchars($row['id']);

  $select_form .= '<option value="'.$esc_author_id.'">'.$esc_name.'</option>';
}
$select_form .= '</select>';
?>
<!DOCTYPE html>
<html lang="ko">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <title>WEB</title>
  </head>
  <body>
    <h1><a href="index.php">WEB</a><span><?=$nowTopic?></span></h1>
    <p><a href="author.php">author</a></p>
    <ol>
      <?=$list?>
    </ol>
    <a <?=$bold_text ?> href="create.php">create</a>
    <form action="process_create.php" method="POST">
      <p><input type="text" name="title" placeholder="타이틀"/></p>
      <p><textarea name="description" placeholder="내용" rows="5"></textarea></p>
      <p><?=$select_form ?></p>
      <p><input type="submit" value="CREATE"/></p>
    </form>
  </body>
</html>
