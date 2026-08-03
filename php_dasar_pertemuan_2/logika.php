<?php

$a = false;
$b = true;

echo var_dump($a && $b) . "<br>"; // AND (&&) -> false
echo var_dump($a || $b) . "<br>"; // OR (||) -> true
echo var_dump(!$a) . "<br>"; // NOT (!) -> true (karena kebalikan dari false)
echo var_dump($a xor $b) . "<br>"; // XOR (xor) -> true

?>