<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<h1>Vous vous trouvez dans: <?php echo $title; ?></h1>
<?php if(!empty($posts)) : ?>
    <ul>
        <?php foreach($posts as $post): ?>
            <li><a href="<?php echo url('post', [$post->id]) ?>"><?php echo $post->title ?></a>
                <img src="<?php echo url('images', [$post->thumbnail]); ?>" alt="">
                <p><?php echo ($post->category)? $post->category->title: 'non catégorisé'; ?></p>
            </li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p>Désolé par d'article pour l'instant</p>
<?php endif; ?>
</body>
</html>