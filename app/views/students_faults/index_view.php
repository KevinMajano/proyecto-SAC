<div class="container">

  <div class="h5 text-left">
    <p>Tabla de alumnos</p>
  </div>

  <div class="row" style="margin-bottom:10px;">
    <div class="col">
      <form method="post">
        <div class="row">
          <div class="col col-lg-4 col-md-4 col-sm-4 col-xs-6">
            <input name="nombre" type="text" class="form-control" placeholder="Buscar por alumno">
          </div>
          <div class="col col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <button name="buscar" type="submit" class="btn btn-success color-botton-add">Buscar</button>
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
            <th scope="col">Alumno</th>
            <th scope="col">Encargado/a</th>
            <th scope="col">Acciones</th>
          </tr>
        </thead>
        <tbody>
          <!--Se generan los datos de la tabla a partir del recorrido de un foreach-->
          <?php
foreach($data as $row){
print('
<tr class="color-data-table">
    <td>'.$row['nombre_alumno'].'</td>
    <td>'.$row['nombre_encargado'].'</td>
    <td>
    <div class="dropdown show">
  <a class="dropdown-toggle" href="#"  id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <h3 class="color-titles-table mt-0">...</h3>
  </a>

  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
  <a class="dropdown-item" href="create.php?id='.$row['id_alumno'].'"><span><img src="../../web/img/iconos/add.png" width="25px"><span/><span class="ml-3">Asignar falta</span></a>
  <a class="dropdown-item" href="history.php?id='.$row['id_alumno'].'"><span><img src="../../web/img/iconos/list.png" width="25px"><span/><span class="ml-3">Historial</span></a>
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