<?php


class A {
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}
class B extends A {
}
$a1 = new A();
$b1 = new B();
$a1->foo();  // 1
$b1->foo();   //  1   работает с самим классом и так как В это другой класс то у него св-ва из класса А стали своими и нужно менять через В
$a1->foo();   // 2
$b1->foo();    //  2