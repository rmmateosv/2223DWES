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
            <form method="post">
                <h1>Gestión de Usuarios</h1>
                <h3 class="text-primary">MENSAJES</h3>
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
                                <th class="th-sm" >Id</th>
                                <th class="th-sm" data-mdb-sort="false">Email</th>
                                <th class="th-sm" data-mdb-sort="false">Nombre</th>
                                <th class="th-sm" data-mdb-sort="false">Dirección</th>
                                <th class="th-sm" data-mdb-sort="false">Teléfono</th>
                                <th class="th-sm" data-mdb-sort="false">Perfil</th>
                                <th class="th-sm" data-mdb-sort="false">Baja</th>
                                <th class="th-sm" data-mdb-sort="false">Acciones</th>
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