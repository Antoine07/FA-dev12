<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<h1>Listes des posts</h1>
<?php if(!empty($student)) : ?>
<ul>
<li><?php echo $student->name ?></li>
<li><?php echo $student->email ?></li>
<li><?php echo $student->address ?></li>
</ul>
<?php else: ?>
    <p>Désolé par d'étudiant pour l'instant</p>
<?php endif; ?>
</body>
</html>