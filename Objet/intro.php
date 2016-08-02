<?php
phpinfo();
/*
En C

struct _zend_object {
    zend_refcounted_h gc;
    uint32_t          handle;
    zend_class_entry *ce;
    const zend_object_handlers *handlers;
    HashTable        *properties;
    zval              properties_table[1];
};

 */

/*
 * Une variable objet ne contient pas l'objet lui-même, elle contient seulement un identifiant d'objet qui permet
 * aux accesseurs d'objet de trouver cet objet.
 *
 * Lorsqu'un objet est assigné à une autre variable, les différentes variables ne sont pas des alias (au sens référence)
 * elles contiennent des copies de l'identifiant qui pointent sur le même objet
 *
 * */

class A {
    public $foo = 1;
}

$a = new A;
$b = $a;     // $a et $b sont des copies du même identifiant
// ($a) = ($b) = <id>

echo "<pre>";
debug_zval_dump($a);
debug_zval_dump($b);

echo "</pre>";

$b->foo = 2;
echo $a->foo."\n";


$c = new A;
$d = &$c;    // $c et $d sont des références
// ($c,$d) = <id>

echo "<pre>";
debug_zval_dump($c);
debug_zval_dump($d);
echo "</pre>";

$d->foo = 2;
echo $c->foo."\n";


$e = new A;

function foo($obj) {
    // ($obj) = ($e) = <id>
    $obj->foo = 2;
}

foo($e);
echo $e->foo."\n";