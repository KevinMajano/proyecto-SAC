<div class="container">
    <div class="row">
        <div class="col">
            <h2 class="text-center">Asignar grado o dar de baja a <?= $studentsG->getNombreA(); ?></h2>
        </div>
    </div>

    <form method='post'>
        <div class="form-row">
            <div class="form-group col-md-6">
                <div class="input-field">
                    <?php
                    Page::showSelect("Grados", "grado", $studentsG->getIdGrado(), $studentsG->getGrados());
                    ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="center-text mx-auto">
                    <button name="assign" type="submit" class=" btn btn-success">Asignar</button>
                    <button name="unassign" type="submit" class=" btn btn-info">Dar de baja</button>
                    <a class="btn btn-danger" href="<?= $toURL; ?>" role="button">Cancelar</a>
                </div>
            </div>
        </div>
    </form>

</div>