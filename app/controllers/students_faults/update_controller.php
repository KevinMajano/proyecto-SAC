<?php
require_once("../../app/models/students_faults.class.php");
try{
    if($_GET['id']){
        $students = new StudentsF;
        $students->setId($_GET['id']);
        $students->readEstudianteFalta();

        if(isset($_POST['update'])){
            $_POST = $students->validateForm($_POST);
            $id_al = $students->getIdAlumno();
            if ($students->setIdFalta($_POST['falta'])) {
                if ($students->setDescripcion($_POST['descripcion'])) {
                    if ($students->updateFaltaEstudiante()) {
                        Page::showMessage(1, "Falta actualizada", "history.php?id=$id_al");
                    } else {
                        Page::showMessage(2, "No se actualizo", null);
                    }
                } else {
                    throw new Exception("Descripción incorrecta");
                }
            } else {
                throw new Exception("Error en el envio del formuladio");
            }
        }
    }else {
        Page::showMessage(3, "Seleccione un estudidiante", "index.php");
    }
#Captura la exception 
}catch(Exception $error){
#Se llama al metodo showMessage y se le pasan los argumentos indicados en este caso mensaje de error
Page::showMessage(2, $error->getMessage(), null);
}
require_once("../../app/views/students_faults/update_view.php");
?>