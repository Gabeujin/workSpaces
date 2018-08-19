<?php
  $bname_delete_title = basename($_POST['delete_id']);

  unlink('data/'.$bname_delete_title);
  header('Location: ./index.php');
 ?>
