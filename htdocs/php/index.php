<?php
require_once('lib/print.php');
require('view/top.php');
?>
    <!-- isset() ? 있냐 없냐를 구분하는. true/false 인것 같다 -->
    <?php if(isset($_GET['id'])) {  ?>
      <a href="update.php?id=<?=$_GET['id'] ?>">update</a>
      <form action="delete_process.php" method="post">
        <input type="hidden" name="delete_id" value="<?=$_GET['id'] ?>" />
        <input type="submit" value="delete" />
      </form>
    <?php } ?>
    <h2>
      <?php
      print_title();
      ?>
    </h2>
<?php
print_description();
require_once('view/bottom.php');
?>
