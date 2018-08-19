<?php
require_once('lib/print.php');
require('view/top.php');
?>
    <!-- isset() ? 있냐 없냐를 구분하는. true/false 인것 같다 -->
    <?php if(isset($_GET['id'])) {  ?>
      <a href="update.php?id=<?=$_GET['id'] ?>">update</a>
    <?php } ?>
    <h2>
      <?php
      print_title();
      ?>
    </h2>
    <?php
    print_description();
     ?>
     <form action="update_process.php" method="post">
       <input type="hidden" name="pre_title" value=<?php print_title(); ?> />
       <p>
         <input type="text" name="title" placeholder="Title" value=<?php print_title(); ?> />
       </p>
       <p>
         <textarea name="description" placeholder="Description"><?php print_description(); ?></textarea>
       </p>
       <p>
         <input type="submit" />
       </p>
     </form>
 <?php
require_once('view/bottom.php');
 ?>
