<?php
require_once('lib/errorDP.php');
require_once('lib/dbConn.php');

  $insertSql = "INSERT INTO {$tableName}
                  (title,description,created)
                  VALUE ('MySQL2','MySQL2 is...',NOW())";
  $result = mysqli_query($conn, $insertSql);

  if($result != true){
    echo mysqli_error($conn);
  }
 ?>
