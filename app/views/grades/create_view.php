<div class="container">

    <div class="row">
        <div class="col">
            <h2 class="text-center">Crear Grado</h2>
        </div>
    </div>

    <form method='post'>
        <div class="form-row">
            <div class="form-group col-md-6">
                <div class="input-field">
                    <?php
                    Page::showSelect("Profesores", "profesores", $grades->getIdProfesor(), $grades->getProfesores());
                    ?>
                </div>
            </div>
            <div class="form-group col-md-6">
                <label for="exampleFormControlInput1">Nombre del grado</label>
                <input name="nombre" type="text" class="form-control" id="exampleFormControlInput1" placeholder="noveno A">
            </div>
            <div class="form-group col-md-6">
                <label for="Apellido">Fecha:</label>
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

        </div>



        <div class="row">
            <div class="center center-text mx-auto">
                <button name="crear" type="submit" class=" btn btn-success">Registrar</button>
                <a class="btn btn-danger" href="index.php" role="button">Cancelar</a>
            </div>
        </div>
    </form>

</div>