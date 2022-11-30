<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>miCocina</title>
    <link href="bootstrap-5.2.0-dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="bootstrap-5.2.0-dist/js/bootstrap.bundle.min.js" ></script>
  </head>
  <body>
    <div class="container-fluid">
    	<form method="post" enctype="multipart/form-data" action="detallePedido.php">
            <h1>PEDIDO: </h1>
            <h3>Fecha: </h3>
            <h3>Importe: </h3>
            <h3 class="text-primary"></h3>
            <br/>
            
            <hr />
            <div
              class="table-editor"
              id="table_1"
              data-mdb-entries="5"
              data-mdb-entries-options="[5, 10, 15]">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th class="th-sm" ><p class='text-start'>Plato</p></th>
                    <th class="th-sm" data-mdb-sort="false"><p class='text-end'>Cantidad</p></th>
                    <th class="th-sm" data-mdb-sort="false"><p class='text-end'>Precio</p></th>
                    <th class="th-sm" data-mdb-sort="false"><p class='text-end'>Total</p></th>
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