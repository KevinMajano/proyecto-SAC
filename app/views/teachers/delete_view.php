<div class="container">
    <div class="row">
        <div class="col">
            <h2 class="text-center">Eliminar Profesor</h2>
            <!--Obtiene el nombre y el alias por el metodo get-->
            <h5 class="text-center">Nombre:  <?php print($teachers->getNombre());?> Correo: <?php print($teachers->getCorreo());?></h5>
        </div>
    </div>
        <div class="row">
            <div class="center center-text mx-auto">
                <form method="post">
                    <button name="delete" type="submit" class=" btn btn-success">Eliminar</button>
                    <a class="btn btn-danger" href="index.php" role="button">Cancelar</a>
                </form>
                </div>
        </div>
</div>