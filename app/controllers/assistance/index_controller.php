<?php
require_once("../../app/models/assistance.class.php");
try{
    $idGrado = null;
	$assistance = new Assistance;
    if(isset($_GET['id_grado']))  $assistance->setIdGrado($_GET['id_grado']);

	if(isset($_POST['buscar'])){
		$_POST = $assistance->validateForm($_POST);
        $assistance->setIdGrado($_POST['grados']);
        
        $data = $assistance->getAsistenciaToday();
		if($data){		
			$rows = count($data);		
			Page::showMessage(4, "Se encontraron $rows resuldatos", null);
		}else{	
			Page::showMessage(4, "No se encontraron resultados", null);
			$data = $assistance->getAsistenciaToday();
		}
	}else{
		$data = $assistance->getAsistenciaToday();
	}


    if (isset($_POST['crear'])) {
        $_POST = $assistance->validateForm($_POST);
    
        $assistance->setIdGrado($_POST['grados']);
        $data = $assistance->getAsistenciaToday();

       foreach ($data as $row) {
        if(isset($_POST['checkbox'.$row['id_alumno']])){
            $date = date('Y-m-d');
            if ($assistance->setIdAlumnoAs($row['id_alumno'])) {
                if ($assistance->setFechaAs($date)) {

                        if ($assistance->createAsistencia()) {
                            Page::showMessage(1, "Asistencia Tomada", "index.php");
                        } else {
                            Page::showMessage(2, "No se creo", null);
                        }

                } else {
                    throw new Exception("Fecha incorrecta");
                }
            } else {
                throw new Exception("Alumno incorrecto");
            }

        }

       }

    }

	if($data){
		require_once("../../app/views/assistance/index_view.php");
	}else{
        require_once("../../app/views/assistance/index_view.php");
	}
}catch(Exception $error){
	Page::showMessage(2, $error->getMessage(), null);
}
?>