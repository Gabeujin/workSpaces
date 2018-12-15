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
          <td>update</td>
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
          <td><button class="align_center fit_contents p_zero"><a href="author.php?id=<?=$filtered['id'] ?>" class="display_IB fit_contents">U</a></button></td>
        </tr>
        <?php
        }
        ?>
      </tbody>
    <?php
    if(isset($_GET['id'])){
      $filtered_id = mysqli_real_escape_string($conn, $_GET['id']);
      settype($filtered_id, 'integer');
      $select_sql = "SELECT * FROM author WHERE id = {$filtered_id}";
      $result = mysqli_query($conn, $select_sql);
      $row = mysqli_fetch_array($result);
    }
    ?>
    </table>
    <form action="process_create_author.php" method="post">
      <p><input type="text" name="name" placeholder="name"></p>
      <p><textarea name="profile" rows="4" cols="30" placeholder="profile"></textarea></p>
      <p><input type="submit" value="create author"></p>
    </form>
  <script type="text/javascript" src="js/click.js"></script>
  </body>
</html>
