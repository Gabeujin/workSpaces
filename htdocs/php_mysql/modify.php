<?php
// require_once('lib/errorDP.php');
require_once('lib/dbConn.php');
require_once('lib/nowPage.php');
//escape table name
$use_table  = mysqli_real_escape_string($conn, $tableName);
$select_sql = " SELECT id,title,description
                FROM {$use_table}
                LIMIT 10";
$result     = mysqli_query($conn, $select_sql);

//initialization
$list = '';
$modify_link = '';
$delete_link = '';
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
    $now_page = '';
    if(isset($_GET['id']))$now_page = $esc_id === $_GET['id'] ? 'class="bold_text"' : '';
    $list       = $list."<a {$now_page} href=\"index.php?id={$esc_id}\"><li>{$esc_title}</li></a>";
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
  $delete_link            = '
  <form action="process_delete.php" method="post">
      <input type="hidden" name="id" value='.$filtered['id'].'" />
      <input class="red_point" type="submit" value="delete" />
  </form>
  ';
};
?>
<!DOCTYPE html>
<html lang="ko">
  <head>
    <meta charset="utf-8">
    <title>WEB</title>
    <link rel="stylesheet" type="text/css" href="css/main.css">
  </head>
  <body>
    <h1><a href="index.php">WEB</a><span><?=$nowTopic?></span></h1>
    <p><a href="author.php">author</a></p>
    <ol>
      <?=$list?>
    </ol>
    <a href="create.php">create</a>
    <?=$modify_link ?>
    <?=$delete_link ?>
    <form action="process_modify.php" method="POST">
      <input type="hidden" name="id" value=<?=$filtered['id'] ?> />
      <p><input type="text" name="title" placeholder="타이틀" value=<?=$article['title'] ?> /></p>
      <p><textarea name="description" placeholder="내용" rows="5"><?=$article['description'] ?></textarea></p>
      <p><input type="submit" value="MODIFY" /></p>
    </form>
  </body>
</html>
