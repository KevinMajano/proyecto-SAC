<div class="container">

    <div class="row">
        <div class="col">
        <h2 class="text-center">Actualizar Profesor</h2>
        </div>
    </div>
    
    <form method='post'>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="Nombre">Nombres:</label>
      <input name="nombre" type="text" class="form-control" id="Nombre" placeholder="Nombre" value="<?php print($teachers->getNombre());?>"/>
    </div>
    <div class="form-group col-md-6">
    <label for="Apellido">Fecha nacimiento:</label>
      <div class="row form-group">
                <div class="col-sm-12">
                    <div class="input-group date" id="datepicker">
                        <input name="fecha" type="text" class="form-control" value="<?php print($teachers->getNacimiento());?>"/>
                        <span class="input-group-append">
                            <span class="input-group-text bg-white">
                                <i class="fa fa-calendar"></i>
                            </span>
                        </span>
                    </div>
                </div>
            </div>
    </div>
    <div class="form-group col-md-6">
    <label for="exampleFormControlInput1">Direccion de Email</label>
    <input name="correo" type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" value="<?php print($teachers->getCorreo());?>"/>
  </div>
    <div class="form-group col-md-6">
      <label for="Telefono">Telefono:</label>
      <input name="telefono" type="numer" class="form-control" id="Telefono" placeholder="Telefono" value="<?php print($teachers->getTelefono());?>">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Contraseña</label>
      <input name="clave1" type="password" class="form-control" id="inputPassword4" placeholder="Contraseña" value="<?php print($teachers->getClave());?>">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword5">Confirmar Contraseña</label>
      <input name="clave2" type="password" class="form-control" id="inputPassword5" placeholder="Contraseña" value="<?php print($teachers->getClave());?>">
    </div>
  </div>
 
  

 <div class="row">
 <div class="center center-text mx-auto">
      <button name="update" type="submit" class=" btn btn-success">Actualizar</button>
      <a class="btn btn-danger" href="index.php" role="button">Cancelar</a>
  </div>
 </div>
</form>
        
</div>