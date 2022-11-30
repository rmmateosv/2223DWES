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
    		<form method="post" enctype="multipart/form-data"
    			action="detallePedido.php">
    			<h1>MIS PEDIDOS</h1>
    			<h3 class="text-primary">Mensaje</h3>
    			<br />
    			<hr />
    			<div class="table-editor" id="table_1" data-mdb-entries="5"
    				data-mdb-entries-options="[5, 10, 15]">
    				<table class="table table-hover">
    					<thead>
    						<tr>
    							<th class="th-sm"><p class='text-start'>Id</p></th>
    							<th class="th-sm" data-mdb-sort="false"><p class='text-start'>Fecha</p></th>
    							<th class="th-sm" data-mdb-sort="false"><p class='text-end'>Importe</p></th>
    							<th class="th-sm" data-mdb-sort="false"><p class='text-start'>Ver</p></th>
    						</tr>
    					</thead>   
    					<tbody>
    					</tbody>
    				</table>
    			</div>
    		</form>
    	</div>
    </body>
</html>