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
    			<h1>PRODUCTOS EN TU CARRITO</h1>
    			<h3 class="text-primary">Mensaje</h3>
    			<br />
    			<hr />
    			<div class="table-editor" id="table_1" data-mdb-entries="5"
    				data-mdb-entries-options="[5, 10, 15]">
    				<table class="table table-hover">
    					<thead>
    						<tr>
    							<th class="th-sm">Id</th>
    							<th class="th-sm" data-mdb-sort="false"><p class='text-start'>Nombre</p></th>
    							<th class="th-sm" data-mdb-sort="false"><p class='text-start'>Tipo</p></th>
    							<th class="th-sm" data-mdb-sort="false"><p class='text-end'>Precio</p></th>
    							<th class="th-sm" data-mdb-sort="false"><p class='text-start'>Foto</p></th>
    							<th class="th-sm" data-mdb-sort="false"><p class='text-end'>Cantidad</p></th>
    							<th class="th-sm" data-mdb-sort="false"><p class='text-start'>Acciones</p></th>
    						</tr>
    					</thead>    
    					<tbody>
    					</tbody>
    				</table>  
    			</div>
    			<!-- The Mensaje Modal de confirmación de crear pedido -->
    			<div class="modal" id="confirmar">
    				<div class="modal-dialog">
    					<div class="modal-content">
    
    						<!-- Modal Header -->
    						<div class="modal-header">
    							<h4 class="modal-title">Confirmación</h4>
    							<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
    						</div>
    
    						<!-- Modal body -->
    						<div class="modal-body">¿Deseas crear el pedido?</div>
    
    						<!-- Modal footer -->
    						<div class="modal-footer">
    							<button type="submit" class="btn btn-primary"
    								data-bs-dismiss="modal" name="crearPedido">Crear</button>
    							<button type="submit" class="btn btn-danger"
    								data-bs-dismiss="modal">Cancelar</button>
    						</div>
    					</div>
    				</div>
    			</div>
    		</form>
    	</div>
	</body>
</html>