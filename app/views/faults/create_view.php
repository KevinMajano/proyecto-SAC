<div class="container">

    <div class="row">
        <div class="col">
        <h2 class="text-center">Crear Falta</h2>
        </div>
    </div>
    
    <form method='post'>
  <div class="form-row">
    <div class="form-group col-md-6">
        <?php
            Page::showSelect("Tipo", "tipo", $faults->getTipo(), $faults->getTipos());
        ?>
    </div>
    <div class="form-group col-md-6">
      <label for="Nombre">Nombre:</label>
      <input name="nombre" type="text" class="form-control" id="Nombre" placeholder="Nombre">
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