<?php
require_once('lib/errorDP.php');
require_once('lib/dbConn.php');
//DB connection
//escape table name
$use_table    = mysqli_real_escape_string($conn, $tableName);
$join_table   = mysqli_real_escape_string($conn, $joinTable);
$list = '';
?>
<!DOCTYPE html>
<html lang="ko">
  <head>
    <meta charset="utf-8">
    <title>WEB</title>
    <link rel="stylesheet" type="text/css" href="css/main.css">
  </head>
  <body>
    <h1><a href="index.php">WEB</a></h1>
    <p><a href="index.php">topic</a></p>
    <table>
      <thead>
        <tr>
          <td>id</td>
          <td>name</td>
          <td>profile</td>
        </tr>
      </thead>
      <tbody>
        <?php
        $sql = "SELECT id,name,profile FROM {$join_table}";
        $result = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_array($result)){
          $filtered = array(
          'id'        => htmlspecialchars($row['id']),
          'name'      => htmlspecialchars($row['name']),
          'profile'   => htmlspecialchars($row['profile'])
          )
        ?>
        <tr>
          <td><?=$filtered['id'] ?></td>
          <td><?=$filtered['name'] ?></td>
          <td><?=$filtered['profile'] ?></td>
        </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
    <form action="process_create_author.php" method="post">
      <p><input type="text" name="name" placeholder="name"></p>
      <p><textarea name="profile" rows="4" cols="30" placeholder="profile"></textarea></p>
      <p><input type="submit" value="create author"></p>
    </form>
  </body>
</html>
