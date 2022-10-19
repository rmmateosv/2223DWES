<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Insert title here</title>
</head>
<body>
	<?php
	if(isset($_GET["numero"])){
	?><!--  Pintar tabla-->
	<h1>Con un for</h1>
	  <table style="border:1px solid">
	  	<thead>
	  		<th>a</th>
	  		<th>*</th>
	  		<th>b</th>
	  		<th>=</th>
	  		<th>a*b</th>
	  	</thead>
	  	<tbody>
	  		<?php 
	  		for($i=0;$i<=10;$i++){
	  		    echo "<tr>
                        <td>".$_GET['numero']."</td>
                        <td>*</td>
                        <td>$i</td>
                        <td>=</td>
                        <td>".$_GET['numero']*$i."</td>
                      </tr>";
	  		}
	  		?>
	  	</tbody>
	  </table>
	  <h1>Con un while</h1>
	  <table style="border:1px solid">
	  	<thead>
	  		<th>a</th>
	  		<th>*</th>
	  		<th>b</th>
	  		<th>=</th>
	  		<th>a*b</th>
	  	</thead>
	  	<tbody>
	  		<?php 
	  		$i=0;
	  		while($i<=10){
	  		    echo "<tr>
                        <td>".$_GET['numero']."</td>
                        <td>*</td>
                        <td>$i</td>
                        <td>=</td>
                        <td>".$_GET['numero']*$i."</td>
                      </tr>";
	  		    $i++;
	  		}
	  		?>
	  	</tbody>
	  </table>  
	<?php 
	    
	}
	else{
	    echo "<br/>Error, no se pasa el número";
	}
	?>
</body>
</html>