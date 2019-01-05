<?php
// require_once('lib/errorDP.php');
require_once('lib/dbConn.php');
require_once('lib/nowPage.php');
//escape table name
$use_table    = mysqli_real_escape_string($conn, $tableName);
$join_table   = mysqli_real_escape_string($conn, $joinTable);
$select_sql   = "SELECT id,title,description FROM ".$use_table." LIMIT 10";
$result       = mysqli_query($conn, $select_sql);

$list         = '';
$modify_link  = '';
$delete_link  = '';
$article      = array(
  'title'       => 'Welcome!',
  'description' => 'Lorem ipsum dolor sit amet, laborum.',
  'name'        => '???',
  'profile'     => '???'
);
$author       = '';

if($result != NULL){
  // 다중행 가져오기
  while($row = mysqli_fetch_array($result)){
    $esc_title  = htmlspecialchars($row['title']);
    $esc_id     = htmlspecialchars($row['id']);
    $now_page = '';
    if(isset($_GET['id']))$now_page = $esc_id === $_GET['id'] ? 'class="bold_text"' : '';
    $list       = $list."<a ".$now_page." href=\"index.php?id=".$esc_id."\"><li>".$esc_title."</li></a>";
  }
}else{
  $list = 'EMPTY DATA!!';
};

if(isset($_GET['id'])){
  $filtered = array(
    'id' => mysqli_real_escape_string($conn, $_GET['id'])
  );
  $sql    = " SELECT ".$use_table.".id,title,description,".$join_table.".name,".$join_table.".profile
              FROM ".$use_table."
                LEFT JOIN ".$join_table."
                  ON ".$use_table.".author_id = ".$join_table.".id
              WHERE ".$use_table.".id=".$filtered['id'];
  $result = mysqli_query($conn, $sql);
  $row    = mysqli_fetch_array($result);

  $article['title']       = htmlspecialchars($row['title']);
  $article['description'] = htmlspecialchars($row['description']);
  $article['name']        = htmlspecialchars($row['name']);
  $article['profile']     = htmlspecialchars($row['profile']);

  $modify_link            = '<a href="modify.php?id='.$filtered['id'].'">modify</a>';
  $delete_link            = '
  <form action="process_delete.php" method="post">
      <input type="hidden" name="id" value='.$filtered['id'].'" />
      <input class="red_point" type="submit" value="delete" />
  </from>
  ';

  $author = '<p>by <i>'.$article['name'].'</i>, '.$article['profile'].'</p>';
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
    <h2><?=$article['title']?></h2>
    <?=$article['description']?>
    <?=$author?>
  </body>
</html>
