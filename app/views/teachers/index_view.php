<div class="container">

  <div class="h5 text-left">
    <p>Tabla de profesores</p>
  </div>

  <div class="row" style="margin-bottom:10px;">
    <div class="col">
      <form method="post">
        <div class="row">
          <div class="col col-lg-4 col-md-4 col-sm-4 col-xs-6">
            <input name="nombre" type="text" class="form-control" placeholder="Buscar por Nombre">
          </div>
          <div class="col col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <button name="buscar" type="submit" class="btn btn-success color-botton-add">Buscar</button>
          </div>
          <div class="col text-right">
          <a class="btn btn-primary color-botton-add" href="create.php"><span><img src='../../web/img/iconos/adduser.png' width='25px'></span><span class='ml-3'>Agregar</span></a>	            
        </div>
        </div>
      </form>

    </div>
  </div>


  <div class="row">
    <div class="col col-sm-12 col-lg-12 col-md-12 table-responsive">

      <table class="table">
        <thead>
          <tr class='color-titles-table'>
            <th scope="col">Nombre</th>
            <th scope="col">Fecha nacimiento</th>
            <th scope="col">Correo</th>
            <th scope="col">Telefono</th>
             <th scope="col">Acciones</th>
          </tr>
        </thead>
        <tbody>
          <!--Se generan los datos de la tabla a partir del recorrido de un foreach-->
          <?php
foreach($data as $row){
print('
<tr class="color-data-table">
    <td>'.$row['nombre_profesor'].'</td>
    <td>'.$row['nacimiento_profesor'].'</td>
    <td>'.$row['correo_profesor'].'</td>
    <td>'.$row['telefono_profesor'].'</td>
    <td>
    <div class="dropdown show">
  <a class="dropdown-toggle" href="#"  id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <h3 class="color-titles-table mt-0">...</h3>
  </a>

  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
  <a class="dropdown-item" href="update.php?id='.$row['id_profesor'].'"><span><img src="../../web/img/iconos/edit.png" width="25px"><span/><span class="ml-3">Editar</span></a>
  <a class="dropdown-item" href="delete.php?id='.$row['id_profesor'].'"><span><img src="../../web/img/iconos/delete.png" width="25px"><span/><span class="ml-3">Eliminar</span></a>
  </div>
</div>
    </td>
</tr>
');
}
?>

        </tbody>
      </table>

    </div>
  </div>
</div>