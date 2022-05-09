<?php
require_once("../../app/models/students_faults.class.php");
try{
	if(isset($_GET['id'])){
        $students = new StudentsF;
		if($students->setId($_GET['id'])){
			if($students->readEstudianteFalta()){
				$id_al = $students->getIdAlumno();
				if(isset($_POST['delete'])){
					if($students->deleteFaltaEstudiante()){
						Page::showMessage(1, "Falta eliminada", "history.php?id=$id_al");
					}else{
						throw new Exception(Database::getException());
					}
				}
			}else{
				throw new Exception("No se pudo obtener la información del estudiante");
			}
		}else{
			throw new Exception("Falta incorrecta");
		}
	}else{
		Page::showMessage(3, "Seleccione falta", "history.php?id=$id_al");
	}
	#Se captura la exception
}catch(Exception $error){
	Page::showMessage(2, $error->getMessage(), "history.php?id=$id_al");
}
require_once("../../app/views/students_faults/delete_view.php");
?>