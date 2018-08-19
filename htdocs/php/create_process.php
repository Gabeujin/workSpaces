<?php
$bname_create_title = basename($_POST['title']);
$bname_create_des = basename($_POST['description']);

file_put_contents('data/'.$bname_create_title, $bname_create_des);
header('Location: ./index.php?id='.$bname_create_title);
?>
