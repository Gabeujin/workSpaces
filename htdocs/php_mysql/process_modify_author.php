<?php
require_once('lib/errorDP.php');
require_once('lib/dbConn.php');

//타입지정
settype($_POST['id'],'integer');
$join_table = mysqli_real_escape_string($conn, $joinTable);
//escaping
$filtered = array(
  'id'       => mysqli_real_escape_string($conn,$_POST['id']),
  'name'     => mysqli_real_escape_string($conn,$_POST['name']),
  'profile'  => mysqli_real_escape_string($conn,$_POST['profile'])
);
$update_sql = "UPDATE {$join_table}
                SET
                  name       = '{$filtered['name']}',
                  profile    = '{$filtered['profile']}'
                WHERE
                  id         = '{$filtered['id']}'
                ";
                
$result = mysqli_query($conn, $update_sql);
if($result != true) {
    error_log(mysqli_error($conn));
    echo "UPDATE 중 오류가 발생했습니다. 관리자에게 문의해주세요.";
  }else{
    header('Location:author.php?id='.$filtered['id']);
  }
 ?>
