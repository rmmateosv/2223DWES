<?php
$a=139;
echo "<br/>",intdiv($a, 500), " billetes de 500";
$a=$a%500;
echo "<br/>",intdiv($a, 200), " billetes de 200";
$a=$a%200;
echo "<br/>",intdiv($a, 100), " billetes de 100";
$a=$a%100;
echo "<br/>",intdiv($a, 50), " billetes de 50";
$a=$a%50;
echo "<br/>",intdiv($a, 20), " billetes de 20";
$a=$a%20;
echo "<br/>",intdiv($a, 10), " billetes de 10";
$a=$a%10;
echo "<br/>",intdiv($a, 5), " billetes de 5";
$a=$a%5;
echo "<br/>",intdiv($a, 2), " monedas de 2";
$a=$a%2;
echo "<br/>",($a>=1?intdiv($a, 1):0), " monedas de 1";
$a=$a%1;
?>