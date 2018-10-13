<html>
  <head>
    <meta charset="utf-8">
    <title>cross site scripting</title>
  </head>
  <body>
    <?php
    echo htmlspecialchars('<script>alert("hello");</script>');
    ?>
  </body>
</html>
