<?php
require_once("../../app/models/students_faults.class.php");
try{
    if($_GET['id']){
      $students = new StudentsF;
      if ($students->setIdAlumno($_GET['id'])) {
          $students->readEstudiante();
          #Se llama al metodo 
          $data = $students->getEstudianteFaltas();

          if($data){
              require_once("../../app/views/students_faults/history_view.php");
          }else{
              Page::showMessage(3, "No hay Faltas asignadas", "index.php");
          }
      }
    }else {
      Page::showMessage(3, "Seleccione un alumno", "index.php");
    }
#Captura la exception 
}catch(Exception $error){
#Se llama al metodo showMessage y se le pasan los argumentos indicados en este caso mensaje de error
Page::showMessage(2, $error->getMessage(), null);
}
?>