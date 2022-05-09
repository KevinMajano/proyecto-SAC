<?php
require_once("../../app/models/grades.class.php");
try{
	$grades = new Grades;
    if($_GET['id']){
        $grades->setId($_GET['id']);
        $grades->readGrado();
        if(isset($_POST['buscar'])){
            $_POST = $grades->validateForm($_POST);
            $data = $grades->searchEstudiante($_POST['nombre']);
            if($data){
                $rows = count($data);
                Page::showMessage(4, "Se encontraron $rows resuldatos", null);
            }else{
                Page::showMessage(4, "No se encontraron resultados", null);
                $data = $grades->getAlumnosGrado();
            }
        }else{
            $data = $grades->getAlumnosGrado();
        }
        if($data){
            require_once("../../app/views/grades/members_view.php");
        }else{
            Page::showMessage(3, "No hay estudiantes asignados a este grado", "index.php");
        }
    }else {
        Page::showMessage(3, "Seleccione un grado", "index.php");
    }
	
}catch(Exception $error){
	Page::showMessage(2, $error->getMessage(), null);
}
?>