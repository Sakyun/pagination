<?php include 'db.php' ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="pagination.css">
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php foreach ($results as $key => $result): ?>
      <p><?=$result['id']?> <?=$result['lettre']?></p>
    <?php endforeach; ?>
    <nav class="pagination">
      <a href="#">&laquo;</a>
      <?php for ($page = 1; $page <= $number_of_pages; $page++): ?>
        <a href="index.php?page=<?=$page?>"><?=$page?></a>
      <?php endfor; ?>
      <a href="#">&raquo;</a>
    </nav>
    <script src="pagination.js"></script>
  </body>
</html>
