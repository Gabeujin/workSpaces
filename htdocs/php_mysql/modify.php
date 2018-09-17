<?php
require_once('lib/errorDP.php');
require_once('lib/dbConn.php');
//DB connection
//escape table name
$use_table  = mysqli_real_escape_string($conn, $tableName);
$select_sql = "SELECT id,title,description FROM {$use_table} LIMIT 10";
$result     = mysqli_query($conn, $select_sql);

//initialization
$page_css_class = "modify";
$list = '';
$modify_link = '';
$article = array(
  'title'       => 'Welcome!',
  'description' => 'Lorem ipsum dolor sit amet, laborum.'
);

//결과값이 있을 때
if($result != NULL){
  // 다중행 가져오기
  while($row = mysqli_fetch_array($result)){
    $esc_title  = htmlspecialchars($row['title']);
    $esc_id     = htmlspecialchars($row['id']);
    $list       = $list."<a class=\"modify\" href=\"index.php?id={$esc_id}\"><li>{$esc_title}</li></a>";
  }
}else{
  $list = 'EMPTY DATA!!';
};

//escaping
if(isset($_GET['id'])){
  $filtered = array(
    'id' => mysqli_real_escape_string($conn, $_GET['id']),
  );
  $sql    = "SELECT id,title,description FROM {$use_table} WHERE id={$filtered['id']}";
  $result = mysqli_query($conn, $sql);
  $row    = mysqli_fetch_array($result);
  $article['title']       = htmlspecialchars($row['title']);
  $article['description'] = htmlspecialchars($row['description']);
  $modify_link            = '<a class="bold_text" href="modify.php?id='.$filtered['id'].'">modify</a>';
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
    <a href="create.php">create</a>
    <?=$modify_link ?>
    <form action="process_modify.php" method="POST">
      <input type="hidden" name="id" value=<?=$filtered['id'] ?> />
      <p><input type="text" name="title" placeholder="타이틀" value=<?=$article['title'] ?> /></p>
      <p><textarea name="description" placeholder="내용"><?=$article['description'] ?></textarea></p>
      <p><input type="submit" value="MODIFY" /></p>
    </form>
  </body>
</html>
