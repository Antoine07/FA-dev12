<?php

/*--------------------------------*\
*             Autoload
/*--------------------------------*/


/*--------------------------------*\
*             Bootstrap
/*--------------------------------*/

require_once 'Connect/Connect.php';


/*--------------------------------*\
*             Controller
/*--------------------------------*/



/*--------------------------------*\
*             Views
/*--------------------------------*/

$render = <<<EOT
<!doctype html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <title>$title</title>
</head>
<body>
<section>
    $content
</section>
</body>
</html>
EOT;


