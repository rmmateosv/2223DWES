<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Insert title here</title>
</head>

    <body>
    	<table border="1px">
    	<?php 
    	  $color = "gray";
    	  for($i=1;$i<=10;$i++){
    	      echo "<tr bgcolor=$color>";
    	      for($j=1;$j<=10;$j++){
    	          echo "<td>".$i*$j."</td>";
    	      }
    	      if($color=="gray"){
    	          $color="white";
    	      }
    	      else{
    	          $color = "gray";
    	      }
    	      echo "</tr>";
    	  }
    	  
    	?>
    	</table>
    	
    	
    </body>
</html>