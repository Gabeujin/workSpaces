<?php
// require_once('lib/errorDP.php');
require_once('lib/dbConn.php');

//타입지정
settype($_POST['id'],'integer');
//escaping
$use_table = mysqli_real_escape_string($conn, $tableName);
$filtered = array(
  'id'          => mysqli_real_escape_string($conn,$_POST['id'])
);

$delete_sql = "DELETE
                FROM {$use_table}
                WHERE
                  id = {$filtered['id']}
                ";

$result = mysqli_query($conn, $delete_sql);
if($result != true) {
    // error_log(mysqli_error($conn));
    print("DELETE 중 오류가 발생했습니다. 관리자에게 문의해주세요.");
  }else{
    header('Location:index.php');
  }
 ?>
