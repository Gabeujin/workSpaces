<?php
  unlink('data/'.$_POST['delete_id']);
  header('Location: ./index.php');
 ?>
