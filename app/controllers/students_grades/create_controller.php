<?php
require_once("../../app/models/students_grades.class.php");
try {
    $studentsG = new StudentsG;
    if (isset($_GET['id'])) {
        $studentsG->setIdAlumno($_GET['id']);
        $studentsG->readEstudiante();
        $studentsG->readGradoEstudiante();
        $idG = $studentsG->getIdGrado();
        if ($_GET['from'] == 1) {
            $toURL = "../students/index.php";
        }else{
            $toURL = "../grades/members.php?id=$idG";
        }
        if (isset($_POST['assign'])) {
            $_POST = $studentsG->validateForm($_POST);
            if ($studentsG->setIdGrado($_POST['grado'])) {
                if ($studentsG->getId() == null) {
                    if ($studentsG->createGradoAlumno()) {
                        Page::showMessage(1, "Grado asignado", $toURL);
                    } else {
                        Page::showMessage(2, "No se asigno el grado", null);
                    }
                }else{
                    if ($studentsG->updateGradoEstudiante()) {
                        Page::showMessage(1, "Grado actualizado", $toURL);
                    } else {
                        Page::showMessage(2, "No se actualizo el grado", null);
                    }
                }
            } else {
                throw new Exception("Debe seleccionar un grado");
            }
        }
        if (isset($_POST['unassign'])) {
            
            if ($studentsG->deleteFaltaEstudiante()) {
                Page::showMessage(1, "El estudiante ha sido dado de baja", $toURL);
            } else {
                Page::showMessage(2, "No se pudo dar de baja al estudiante", null);
            }
        }
    }else {
        Page::showMessage(3, "Seleccione un estudiante", "../students/index.php");
      }
    #Captura la exception 
} catch (Exception $error) {
    Page::showMessage(2, $error->getMessage(), null);
}
require_once("../../app/views/students_grades/create_view.php");
