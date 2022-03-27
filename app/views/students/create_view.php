<div class="container">

    <div class="row">
        <div class="col">
        <h2 class="text-center">Crear Estudiante</h2>
        </div>
    </div>
    
    <form method='post'>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="Nombre">Nombre completo(Estudiante):</label>
      <input name="nombre" type="text" class="form-control" id="Nombre" placeholder="Nombre">
    </div>
    <div class="form-group col-md-6">
    <label for="Apellido">Fecha nacimiento(Estudiante):</label>
      <div class="row form-group">
                <div class="col-sm-12">
                    <div class="input-group date" id="datepicker">
                        <input name="fecha" type="text" class="form-control">
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
      <label for="Nombre">Encargado/a:</label>
      <input name="nombreE" type="text" class="form-control" id="NombreE" placeholder="Nombre">
    </div>
    <div class="form-group col-md-6">
    <label for="exampleFormControlInput1">Direccion de Email:</label>
    <input name="correo" type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
  </div>
    <div class="form-group col-md-6">
      <label for="Telefono">Telefono:</label>
      <input name="telefono" type="numer" class="form-control" id="Telefono" placeholder="Telefono">
    </div>
  </div>

 <div class="row">
 <div class="center center-text mx-auto">
      <button name="crear" type="submit" class=" btn btn-success">Registrar</button>
      <a class="btn btn-danger" href="index.php" role="button">Cancelar</a>
  </div>
 </div>
</form>
        
</div>