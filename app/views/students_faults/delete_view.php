<div class="container">
    <div class="row">
        <div class="col">
            <h2 class="text-center">Eliminar Falta de <?php print($students->getNombreA()); ?></h2>
            <!--Obtiene el nombre y el alias por el metodo get-->
            <h5 class="text-center">Falta:  <?php print($students->getNombreF());?> Descripción: <?php print($students->getDescripcion());?></h5>
        </div>
    </div>
        <div class="row">
            <div class="center center-text mx-auto">
                <form method="post">
                    <button name="delete" type="submit" class=" btn btn-success">Eliminar</button>
                    <a class="btn btn-danger" href="history.php?id=<?php print($students->getIdAlumno());?>" role="button">Cancelar</a>
                </form>
                </div>
        </div>
</div>