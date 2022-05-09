<?php
require_once("../../app/models/assistance.class.php");
try{
    $idGrado = null;
	$assistance = new Assistance;

	if(isset($_POST['buscar'])){
		$_POST = $assistance->validateForm($_POST);
        $assistance->setIdGrado($_POST['grados']);
        $assistance->setFechaAs($_POST['fecha']);
        
        $data = $assistance->getAsistencia();
		if($data){		
			$rows = count($data);
			Page::showMessage(4, "Se encontraron $rows resuldatos", null);
		}else{	
			Page::showMessage(4, "No se encontraron resultados", null);
			$data = $assistance->getAsistencia();
		}
	}else{
        $data = $assistance->getAsistenciaToday();
    }

    require_once("../../app/views/assistance/history_view.php");

}catch(Exception $error){
	Page::showMessage(2, $error->getMessage(), null);
}
?>