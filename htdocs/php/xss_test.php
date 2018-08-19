<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1>Cross site scripting</h1>
    <?php
    echo htmlspecialchars('<script>alert("nerd")</script>');
    ?>
  </body>
</html>
