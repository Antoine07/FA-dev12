<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<h1>Listes des posts</h1>
<?php if(!empty($posts)) : ?>
<ul>
<?php foreach($posts as $post): ?>
    <li><?php echo $post['title']?></li>
<?php endforeach; ?>
</ul>
<?php else: ?>
    <p>Désolé par d'article pour l'instant</p>
<?php endif; ?>
</body>
</html>