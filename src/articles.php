<?php
include 'includes/db.php';

$result = pg_query($conn, "SELECT * FROM articles ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Статьи</title>
    <style>
        body { font-family: sans-serif; padding: 30px; }
        .article { border: 1px solid #ddd; border-radius: 7px; padding: 18px; margin-bottom: 15px; }
        h2 { margin-top: 0; }
        small { color: #888; }
        a { text-decoration: none; color: #264653; }
    </style>
</head>
<body>
    <h1>Список статей</h1>
    <a href="/" style="margin-bottom: 20px; display: inline-block;">На главную</a>
    <a href="pages/add_article.php" style="margin-bottom: 20px; display: inline-block; margin-left:20px;">Добавить статью</a>

    <?php
    while ($row = pg_fetch_assoc($result)) {
       echo "<div class='article'>
               <h2>{$row['title']}</h2>
               <p>{$row['content']}</p>
               <small>{$row['created_at']}</small>
             </div>";
    } ?>

</body>
</html>