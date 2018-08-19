<?php
$bname_update_pre_title = basename($_POST['pre_title']);
$bname_update_title = basename($_POST['title']);
$bname_update_des = basename($_POST['description']);

rename('data/'.$bname_update_pre_title, 'data/'.$bname_update_title);
file_put_contents('data/'.$bname_update_title,$bname_update_des);
header('Location: ./index.php?id='.$bname_update_title);
 ?>
