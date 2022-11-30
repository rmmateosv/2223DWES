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
            <form method="post" enctype="multipart/form-data">
                <h1>Gestión de Platos</h1>
                <h3 class="text-primary">MENSAJE</h3>
                <br/>
                <div class="d-flex justify-content-end mb-4">
                  <button name="alta" class="btn btn-primary btn-sm ms-3" data-mdb-add-entry data-mdb-target="#table_1">
                    <i class="fa fa-plus">+</i>
                  </button>             
            	</div>
                <hr />
                <div
                  class="table-editor"
                  id="table_1"
                  data-mdb-entries="5"
                  data-mdb-entries-options="[5, 10, 15]">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th class="th-sm" ><p class='text-start'>Id</th>
                        <th class="th-sm" data-mdb-sort="false"><p class='text-start'>Nombre</p></th>
                        <th class="th-sm" data-mdb-sort="false"><p class='text-start'>Tipo</p></th>
                        <th class="th-sm" data-mdb-sort="false"><p class='text-end'>Precio</p></th>
                        <th class="th-sm" data-mdb-sort="false"><p class='text-start'>Foto</p></th>
                        <th class="th-sm" data-mdb-sort="false"><p class='text-start'>Baja</p></th>
                        <th class="th-sm" data-mdb-sort="false"><p class='text-start'>Acciones</p></th>
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