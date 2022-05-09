<div class="container">

    <div class="h5 text-left">
        <p>Historial de Asistencia</p>
    </div>


    <div class="row" style="margin-bottom:10px;">
        <div class="col">
            <form method="post">
                <div class="row">
                    <div class="form-group col-md-4">
                        <div class="input-field">
                            <?php
                            Page::showSelect("Grados", "grados", $assistance->getGrados(), $assistance->getGrados());
                            ?>
                        </div>
                    </div>
                    <div class="form-group col-md-5">
                        <label for="Apellido">Fecha:</label>
                        <div class="row form-group">
                            <div class="col-sm-12">
                                <div class="input-group date" id="datepickers">
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
                    <div class="col col-lg-2 col-md-2 col-sm-2 col-xs-2 button-ajust">
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
                        <th scope="col">Estudiante</th>
                        <th scope="col">Asistencia</th>
                    </tr>
                </thead>
                <tbody>
                    <!--Se generan los datos de la tabla a partir del recorrido de un foreach-->
                    <?php
                    foreach ($data as $row) {
                        print('
                                    <tr class="color-data-table">
                                        <td>' . $row['nombre_alumno'] . '</td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="checkbox' . $row['id_alumno'] . '" value="true" id="flexCheckChecked"  checked disabled>
                                                <label class="form-check-label" for="flexCheckChecked">
                                                Asistio
                                                </label>
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