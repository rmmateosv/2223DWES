<?php
$a=139;
echo "<br/>",($a>=500?intdiv($a, 500):0), " billetes de 500";
$a=$a%500;
echo "<br/>",($a>=200?intdiv($a, 200):0), " billetes de 200";
$a=$a%200;
echo "<br/>",($a>=100?intdiv($a, 100):0), " billetes de 100";
$a=$a%100;
echo "<br/>",($a>=50?intdiv($a, 50):0), " billetes de 50";
$a=$a%50;
echo "<br/>",($a>=20?intdiv($a, 20):0), " billetes de 20";
$a=$a%20;
echo "<br/>",($a>=10?intdiv($a, 10):0), " billetes de 10";
$a=$a%10;
echo "<br/>",($a>=5?intdiv($a, 5):0), " billetes de 5";
$a=$a%5;
echo "<br/>",($a>=2?intdiv($a, 2):0), " monedas de 2";
$a=$a%2;
echo "<br/>",($a>=1?intdiv($a, 1):0), " monedas de 1";
$a=$a%1;
?>