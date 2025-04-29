<?php
include '../includes/db.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];

   $result = pg_query_params(
       $conn,
       "INSERT INTO articles (title, content) VALUES ($1, $2)",
       [$title, $content]
   );

   if ($result) {
       header("Location: /articles.php");
       exit;
   } else {
       echo "Ошибка: " . pg_last_error($conn);
   }
} ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Добавить статью</title>
    <style>
        body { font-family: sans-serif; padding: 30px; }
        form { max-width: 400px; margin: auto; }
        input, textarea { width: 100%; margin-bottom: 8px; padding: 8px; }
        button { padding: 10px 16px; background: #2a9d8f; color: #fff; border: none; border-radius: 4px; }
        a { text-decoration: none; color: #264653; }
    </style>
</head>
<body>
    <h2>Добавить статью</h2>
    <form method="post">
        <input type="text" name="title" placeholder="Заголовок" required>
        <textarea name="content" placeholder="Содержимое" rows="5"></textarea>
        <button type="submit">Сохранить</button>
    </form>
    <p><a href="/articles.php">Назад к статьям</a></p>
</body>
</html>