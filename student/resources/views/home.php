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
            <li><a href="<?php echo url('post', [$post->id]) ?>"><?php echo $post->title ?></a></li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p>Désolé par d'article pour l'instant</p>
<?php endif; ?>

<?php if(!empty($students)) : ?>
    <ul>
        <?php foreach($student as $student): ?>
            <li><a href="<?php echo url('student', [$student->id]) ?>"><?php echo $student->name ?></a></li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p>Désolé par d'article pour l'instant</p>
<?php endif; ?>

</body>
</html>