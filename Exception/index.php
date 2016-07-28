<?php

throw new Exception("Je suis avant tout le monde!!");

try{

    echo "hello je suis avant l'exception";

    // levée une exception donc arrête les scripts
    throw new Exception("Je suis une exception");

    echo "je ne serai jamais affiché!!!!";

}catch(Exception $e)
{
    var_dump($e->getMessage());
}