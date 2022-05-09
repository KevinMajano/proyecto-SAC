<?php
require_once("../../app/models/students_faults.class.php");
try{
  if($_GET['id']){
    $students = new StudentsF;
    $id_al = $_GET['id'];
    if(isset($_POST['crear'])){
        $_POST = $students->validateForm($_POST);
        $students->setIdAlumno($_GET['id']);
        if ($students->setIdFalta($_POST['falta'])) {
            if ($students->setDescripcion($_POST['descripcion'])) {
                if ($students->createFaltaAlumno()) {
                    Page::showMessage(1, "Falta asignada", "history.php?id=$id_al");
                } else {
                    Page::showMessage(2, "No se asigno", null);
                }
            } else {
                throw new Exception("Descripción incorrecta");
            }
        } else {
            throw new Exception("Seleccione una falta");
        }
    }
  }else {
    Page::showMessage(3, "Seleccione estudiante", "index.php");
  }
#Captura la exception 
}catch(Exception $error){
#Se llama al metodo showMessage y se le pasan los argumentos indicados en este caso mensaje de error
Page::showMessage(2, $error->getMessage(), null);
}
require_once("../../app/views/students_faults/create_view.php");
?>