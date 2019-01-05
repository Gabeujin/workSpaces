<?php
 $nowPage = basename($_SERVER['PHP_SELF']);
 $nowTopic = _.str_replace('.php','',$nowPage);
 if($nowTopic === '_index' || $nowTopic === null){
   $nowTopic = '_topic';
 }
?>
