<?php
// require_once('lib/errorDP.php');
require_once('lib/dbConn.php');

//타입지정
settype($_POST['id'],'integer');
//escaping
$use_table = mysqli_real_escape_string($conn, $tableName);
$filtered = array(
  'id'          => mysqli_real_escape_string($conn,$_POST['id']),
  'title'       => mysqli_real_escape_string($conn,$_POST['title']),
  'description' => mysqli_real_escape_string($conn,$_POST['description'])
);

$update_sql = "UPDATE {$use_table}
                SET
                  title       = '{$filtered['title']}',
                  description = '{$filtered['description']}'
                WHERE
                  id          = '{$filtered['id']}'
                ";

$result = mysqli_query($conn, $update_sql);
if($result != true) {
    // error_log(mysqli_error($conn));
    print("UPDATE 중 오류가 발생했습니다. 관리자에게 문의해주세요.");
  }else{
    header('Location:index.php?id='.$filtered['id']);
    // echo "<h3>성공했습니다.</h3><a href='index.php'>홈으로</a>";
  }
 ?>
