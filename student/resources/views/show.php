<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<h1>Listes des posts</h1>
<?php if(!empty($post)) : ?>
<ul>
<li><?php echo $post->title ?></li>

</ul>
<?php else: ?>
    <p>Désolé par d'article pour l'instant</p>
<?php endif; ?>
</body>
</html>