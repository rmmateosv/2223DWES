<!DOCTYPE html>
<html>
    <head>
        <meta charset="ISO-8859-1">
        <title>207 Dinero</title>
        
        <style>
        
            table{
                border: 1px solid black;
                margin: 0 auto;
                border-collapse: collapse;
            }
            
            td, th{
                border-bottom: 1px solid black;
                border-left: 1px solid black;
            }
        
            .can, h1{            
                text-align:center;            
            }
        
        </style>
        
    </head>
    <body>
    
    
    <?php
    
    //Parámetro que nos pasan
    $dinero = $_GET["dinero"];
    
    
    //Calculamos todos los restos y los vamos guardando
    $quinientos = intdiv($dinero, 500);     //Con esto averiguo cuántos billetes de 500 caben dentro del número que me han pasado
    $resto = $dinero % 500;     //Con esto le resto a lo que me han pasado la cantidad de billetes * el valor de los mismos
    
    //Para billetes de 200€
    $doscientos = intdiv($resto, 200);    //Averiguo cuantos billetes de 200 caben en lo que me queda de dinero
    $resto = $resto%200;  //Sobreescribo la variable $resto con el resultado de (Nº de billetes * valor de los mismos) 
    
    //Para billetes de 100€
    $cien = intdiv($resto, 100);
    $resto = $resto%100;
    
    //Para billetes de 50€
    $cincuenta = intdiv($resto, 50);
    $resto = $resto%50;
    
    //Para billetes de 20€
    $veinte = intdiv($resto, 20);
    $resto = $resto%20;
    
    //Para billetes de 10€
    $diez = intdiv($resto, 10);
    $resto = $resto%10;
    
    //Para billetes de 5€
    $cinco = intdiv($resto, 5);
    $resto = $resto%5;
    
    //Para monedas de 2€
    $dos = intdiv($resto, 2);
    $resto = $resto%2;
    
    //Para monedas de 1€
    $uno = intdiv($resto, 1);
    $resto = $resto%1;
    
    
    //Mostramos por pantalla
    /*
    echo "<h2>Ejercicio Dinero</h2>";
    echo "Billetes de 500: ".$quinientos;
    echo "<br>Billetes de 200: ".$doscientos;
    echo "<br>Billetes de 100: ".$cien;
    echo "<br>Billetes de 50: ".$cincuenta;
    echo "<br>Billetes de 20: ".$veinte;
    echo "<br>Billetes de 10: ".$diez;
    echo "<br>Billetes de 5: ".$cinco;
    echo "<br>Billetes de 2: ".$dos;
    echo "<br>Billetes de 1: ".$uno;
    
    echo "<br><br>Resto: $resto";
    */
    
    
    
    ?>
    
    <h1>Tabla básica</h1>
    
    <table>
    	<tr>
    		<th>Valor</th>
    		<th> Cantidad</th>    	
    	</tr>
    	
    	<tr>
    		<td>Billetes de 500€</td>
    		<td class="can"><?php echo $quinientos; ?></td>    	
    	</tr>
    	
    	<tr>
    		<td>Billetes de 200€</td>
    		<td class="can"><?php echo $doscientos; ?></td>    	
    	</tr>
    	
    	<tr>
    		<td>Billetes de 100€</td>
    		<td class="can"><?php echo $cien; ?></td>    	
    	</tr>
    	
    	<tr>
    		<td>Billetes de 50€</td>
    		<td class="can"><?php echo $cincuenta; ?></td>    	
    	</tr>
    	
    	<tr>
    		<td>Billetes de 20€</td>
    		<td class="can"><?php echo $veinte; ?></td>    	
    	</tr>
    	
    	<tr>
    		<td>Billetes de 10€</td>
    		<td class="can"><?php echo $diez; ?></td>    	
    	</tr>
    	
    	<tr>
    		<td>Billetes de 5€</td>
    		<td class="can"><?php echo $cinco; ?></td>    	
    	</tr>
    	
    	<tr>
    		<td>Monedas de 2€</td>
    		<td class="can"><?php echo $dos; ?></td>    	
    	</tr>
    	
    	<tr>
    		<td>Monedas de 1€</td>
    		<td class="can"><?php echo $uno; ?></td>    	
    	</tr>
    
    </table>

    
    

    
    </body>
</html>