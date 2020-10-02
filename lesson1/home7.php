<?php


class A {
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}
class B extends A {
}
$a1 = new A; // здесь нет скобок, но это не влияет так как нет параметров
$b1 = new B; // поэтому результат такой же как и в 6 задании
$a1->foo(); // 1
$b1->foo(); // 1
$a1->foo(); // 2
$b1->foo(); // 2

