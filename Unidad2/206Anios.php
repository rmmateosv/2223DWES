<?php
if(isset($_GET["anio"])){
    $a=$_GET["anio"];
    $actual = date("Y");
    echo "Dentro de 10 años tendré ".($a+10)." y será ".($actual+10);
    echo "<br/>Hace 10 años Tuve ".($a-10)." en ".($actual-10);
    echo "<br/>Me quedan ".(67-$a)." años para jubilarme, será ".($actual+(67-$a));
}
?>