<?php

class home5 {
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}
$a1 = new home5();
$a2 = new home5();
$a1->foo(); //1     так сначало инкремент потом вывод
$a2->foo(); // 2    так как $x будет равен уже 1 из за того что он static
$a1->foo();  // 3
$a2->foo();   // 4
