<?php
$conn = mysqli_connect('localhost','','','');
$select_sql = "SELECT id,title,description FROM *** LIMIT 10";
$result = mysqli_query($conn, $select_sql);
if($result != NULL){
  while($row = mysqli_fetch_array($result)){
    $list = $list."<a href=\"index.php?id={$row['id']}\"><li>{$row['title']}</li></a>";
  }
}else{
  $list = '';
  $list = "EMPTY DATA!!";
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>WEB</title>
  </head>
  <body>
    <h1>WEB</h1>
    <ol>
      <?=$list?>
    </ol>
    <a href="create.php">create</a>
    <h2>welcome!</h2>
    Lorem ipsum dolor sit amet, consectetur.
  </body>
</html>
