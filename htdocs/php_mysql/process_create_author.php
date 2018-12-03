<?php
require_once('lib/errorDP.php');
require_once('lib/dbConn.php');

//escaping
$filtered = array(
  'name'       => mysqli_real_escape_string($conn,$_POST['name']),
  'profile'    => mysqli_real_escape_string($conn,$_POST['profile'])
);

$create_sql = "INSERT INTO {$joinTable}
              (name,profile)
              VALUES(
                '{$filtered['name']}',
                '{$filtered['profile']}'
              )";

$result = mysqli_query($conn, $create_sql);
if($result != true) {
    echo "CREATE 중 오류가 발생했습니다. 관리자에게 문의해주세요.";
    echo "<script>console.log(`".mysqli_error($conn)."`)</script>";
  }else{
    header('Location: author.php');
    //redirection
  }
 ?>
