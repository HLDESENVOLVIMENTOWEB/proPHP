<?php
require_once 'CalculadoraDePrimos.php';

$fim = 50;
$calculadora = new CalculadoraDePrimos($fim);
$inicio = 10;
echo "A soma dos números primos entre $inicio e $fim é: " . $calculadora->somaPrimos($inicio, $fim) . "\n";
