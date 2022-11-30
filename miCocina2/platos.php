<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>miCocina</title>
        <link href="bootstrap-5.2.0-dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="bootstrap-5.2.0-dist/js/bootstrap.bundle.min.js"></script>
    </head>
    <body>
    	<div class="container-fluid">
    		<form method="post" enctype="multipart/form-data">
    			<h1>NUESTROS PLATOS</h1>
    			<h3 class="text-primary">Mensaje</h3>
    			<hr />
    			<h3>Filtro</h3>
    			<select name="tipos" onchange="this.form.submit()">
    				<option>Todos</option>
    				<option>Entrante</option>
    				<option>Principal</option>
    				<option>Bebida</option>
    				<option>Postre</option>
    			</select>
    			<hr />
    			<div class="row row-cols-1 row-cols-md-5 g-4"></div>
    		</form>
    	</div>
    </body>
</html>