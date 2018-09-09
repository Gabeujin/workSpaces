<?php
//root 사용자권한은 위험
$conn = mysqli_connect('localhost','','','');

$create_sql = "INSERT INTO ***
                (title, description, created)
                VALUES(
                  '{$_POST['title']}',
                  '{$_POST['description']}',
                  NOW()
                )";

$result = mysqli_query($conn, $create_sql);
if($result != true) {
    echo "CREATE 중 오류가 발생했습니다. 관리자에게 문의해주세요.";
    echo "<script>console.log(`".mysqli_error($conn)."`)</script>";
  }else{
    echo "<h3>성공했습니다.</h3><a href='index.php'>홈으로</a>";
  }
 ?>
