<div class="container">
    <div class="row">
        <div class="col">
            <h2 class="text-center">Actualizar falta</h2>
        </div>
    </div>
    <form method='post'>
        <div class="form-row">
            <div class="form-group col-md-6">
                <div class="input-field">
                    <?php
                    Page::showSelect("Faltas", "falta", $students->getIdFalta(), $students->getFaltas());
                    ?>
                </div>
            </div>
            <div class="form-group col-md-6">
                <label for="exampleFormControlInput1">Descripciónn</label>
                <input name="descripcion" type="text" class="form-control" id="exampleFormControlInput1" value="<?php print($students->getDescripcion()); ?>">
            </div>
        </div>
        <div class="row">
            <div class="center center-text mx-auto">
                <button name="update" type="submit" class=" btn btn-success">Actualizar</button>
                <a class="btn btn-danger" href="history.php?id=<?php print($students->getIdAlumno());?>" role="button">Cancelar</a>
            </div>
        </div>
    </form>
</div>