<?php

class Mamifere
{

    private $membre = 0;
    private $coeur;

    public function getGriffe()
    {
        // Fatal error variable privée classe Fille
        return $this->griffe;
    }
}

class Felin extends Mamifere
{

    // variables portées classe Felin
    private $griffe = 20;
    private $membre = 4;

    public function getMember()
    {
        return $this->membre; // variable $membre Felin
    }

}

var_dump(new Felin());

var_dump((new Felin)->getMember());

// fatal error voir plus haut
//var_dump((new Felin)->getGriffe());


class Nouriture
{

    protected $glucide = 0;
    protected $proteine = 0;
    protected $lipide = 0;
    protected $apport = 0;

    public function getGlucide()
    {
        return $this->glucide;
    }

    public function getApport()
    {
        return ($this->glucide + $this->lipide + $this->proteine);
    }

}


class Desert extends Nouriture
{
    protected $glucide = 100;
    protected $proteine = 200;
    protected $lipide = 800;
}

var_dump(new Desert());
var_dump((new Desert())->getGlucide());
// on n'expose pas les variables protected dans le script courant
//var_dump((new Desert())->glucide);

var_dump((new Desert())->getApport());


$nouriture = new Nouriture();

var_dump($nouriture->getApport());

/*--------------------------------*\
*             Method parent
/*--------------------------------*/

class Model
{
    protected $tableName;
    protected $dsn;
    protected $sql;

    public function __construct($dsn)
    {
        $this->dsn = $dsn;
    }

    public function select()
    {
        $this->sql = "SELECT ";
    }
}

$model = new Model('mysql');

class Post extends Model
{
    protected $tableName = 'posts';

    public function select()
    {
        parent::select();
        $this->sql .= " * ";
    }
}

$post = new Post('sqlite');
$post->select();
echo "<pre>";
print_r($post);
echo "</pre>";


/*--------------------------------*\
*             Surcharge
/*--------------------------------*/

// tout en haut de la hierachie de classe on met souvent celle-ci abstraite
// Une classe abstraite ne peut etre instanciée mais on peut en étendre
abstract class Monster
{
    protected $life;
    protected $date;

    public function __construct()
    {
        $this->date = date('d/m/Y');
    }
}

class Dracula extends Monster{

    public function __construct()
    {
        parent::__construct();
        $this->life = 1000;
    }

}

echo "<pre>";
print_r(new Dracula());
echo "</pre>";


/*--------------------------------*\
*             copy
/*--------------------------------*/

class A{
    public $name='anonymous';
}

$a = new A;
$b = $a;
$a->name = 'foo';

// tests copies ou référence
echo "<pre>";
print_r($a);
echo "</pre>";

echo "<pre>";
print_r($b);
echo "</pre>";



























