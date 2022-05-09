<div class="container">

  <div class="h5 text-left">
    <p>Faltas de <?php print($students->getNombreA()); ?></p>
  </div>

  <div class="row" style="margin-bottom:10px;">
    <div class="col">
    <div class="col text-right">
          <a class="btn btn-primary color-botton-add" href="create.php?id=<?=$students->getIdAlumno()?>"><span><img src='../../web/img/iconos/adduser.png' width='25px'></span><span class='ml-3'>Agregar</span></a>	            
        </div>
    </div>
  </div>
  <div class="row">
    <div class="col col-sm-12 col-lg-12 col-md-12 table-responsive">

      <table class="table">
        <thead>
          <tr class='color-titles-table'>
            <th scope="col">Tipo</th>
            <th scope="col">Falta</th>
            <th scope="col">Descripción</th>
            <th scope="col">Acciones</th>
          </tr>
        </thead>
        <tbody>
          <!--Se generan los datos de la tabla a partir del recorrido de un foreach-->
          <?php
foreach($data as $row){
print('
<tr class="color-data-table">
    <td>'.$row['nombre_tipo_falta'].'</td>
    <td>'.$row['nombre_falta'].'</td>
    <td>'.$row['descripcion'].'</td>
    <td>
    <div class="dropdown show">
  <a class="dropdown-toggle" href="#"  id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <h3 class="color-titles-table mt-0">...</h3>
  </a>

  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
  <a class="dropdown-item" href="update.php?id='.$row['id_falta_alumno'].'"><span><img src="../../web/img/iconos/edit.png" width="25px"><span/><span class="ml-3">Editar</span></a>
  <a class="dropdown-item" href="delete.php?id='.$row['id_falta_alumno'].'"><span><img src="../../web/img/iconos/delete.png" width="25px"><span/><span class="ml-3">Eliminar</span></a>
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