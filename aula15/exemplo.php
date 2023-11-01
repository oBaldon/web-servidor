<?php

trait TraitString{
    public function toString(){
        echo 'Imprime trait';
    }
}
class A{
    use TraitString{
        TraitString::toString as hello;
    }
    public function toString(){
        echo 'Imprime toString';
    }
}
/*class B{
    use TraitString;
}*/

$a = new A();
$a->toString();
$a->hello();

/*$b = new B();
$b->toString();*/