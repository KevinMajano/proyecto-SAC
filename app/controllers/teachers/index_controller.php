<?php
require_once("../../app/models/teachers.class.php");
try{
	#Se crea una instancia de la clase teachers
	$teachers = new Teachers;
	#isset se ocupa para saber si una variable esta definida en este caso el $_POST['buscar'] 
	#En este caso solo se definira cuando manden datos por post a travez de un submit 
	if(isset($_POST['buscar'])){
		$_POST = $teachers->validateForm($_POST);
		#$data almacena el arreglo de datos que retorna el metodo
        $data = $teachers->searchProfesores($_POST['nombre']);
		if($data){
			#Se guardan que numero de datos tiene la variable data
			$rows = count($data);
			#Se llama al metodo showMessage y se le pasan los argumentos indicados
			Page::showMessage(4, "Se encontraron $rows resuldatos", null);
		}else{
			#Se llama al metodo showMessage y se le pasan los argumentos indicados
			Page::showMessage(4, "No se encontraron resultados", null);
			#Se llama al metodo getProfesor
			$data = $teachers->getProfesor();
		}
	}else{
		#Se llama al metodo getProfesor
		$data = $teachers->getProfesor();
	}
	if($data){
		require_once("../../app/views/teachers/index_view.php");
	}else{
		Page::showMessage(3, "No hay profesores disponibles", "create.php");
	}
}catch(Exception $error){
	#Se llama al metodo showMessage y se le pasan los argumentos indicados en este caso mensaje de error
	Page::showMessage(2, $error->getMessage(), null);
}
?>