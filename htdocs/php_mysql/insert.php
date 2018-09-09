<?php
  $conn = mysqli_connect('localhost','','','');
  $insertSql = "INSERT INTO ***
                  (title,description,created)
                  VALUE ('MySQL2','MySQL2 is...',NOW())";
  $result = mysqli_query($conn, $insertSql);

  if($result != true){
    echo mysqli_error($conn);
  }
 ?>
