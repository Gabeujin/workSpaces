<?php
require_once('lib/errorDP.php');
require_once('lib/dbConn.php');

//escaping
$filtered = array(
  'title'       => mysqli_real_escape_string($conn,$_POST['title']),
  'description' => mysqli_real_escape_string($conn,$_POST['description']),
  'author_id'   => mysqli_real_escape_string($conn,$_POST['author_id'])
);

$create_sql = "INSERT INTO {$tableName}
                (title, description, created, author_id)
                VALUES(
                  '{$filtered['title']}',
                  '{$filtered['description']}',
                  NOW(),
                  '{$filtered['author_id']}'
                )";

$result = mysqli_query($conn, $create_sql);
if($result != true) {
    echo "CREATE 중 오류가 발생했습니다. 관리자에게 문의해주세요.";
    echo "<script>console.log(`".mysqli_error($conn)."`)</script>";
  }else{
    echo "<h3>성공했습니다.</h3><a href='index.php'>홈으로</a>";
  }
 ?>
