<?php
require_once('lib/errorDP.php');
require_once('lib/dbConn.php');

//타입지정
settype($_POST['id'],'integer');
//escaping
$filtered = array(
  'id'          => mysqli_real_escape_string($conn,$_POST['id'])
);

$delete_sql = "DELETE
                FROM {$tableName}
                WHERE
                  id = {$filtered['id']}
                ";

$result = mysqli_query($conn, $delete_sql);
if($result != true) {
    error_log(mysqli_error($conn));
    echo "DELETE 중 오류가 발생했습니다. 관리자에게 문의해주세요.";
  }else{
    echo "<h3>삭제에 성공했습니다.</h3><a href='index.php'>홈으로</a>";
  }
 ?>
