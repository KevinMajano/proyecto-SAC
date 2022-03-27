<?php
require_once("../../app/models/grades.class.php");
try{
	#Se crea una instancia de la clase grades
	$grades = new Grades;
	#isset se ocupa para saber si una variable esta definida en este caso el $_POST['buscar'] 
	#En este caso solo se definira cuando manden datos por post a travez de un submit 
	if(isset($_POST['buscar'])){
		$_POST = $grades->validateForm($_POST);
		#$data almacena el arreglo de datos que retorna el metodo
        $data = $grades->searchGrado($_POST['nombre']);
		if($data){
			#Se guardan que numero de datos tiene la variable data
			$rows = count($data);
			#Se llama al metodo showMessage y se le pasan los argumentos indicados
			Page::showMessage(4, "Se encontraron $rows resultados", null);
		}else{
			#Se llama al metodo showMessage y se le pasan los argumentos indicados
			Page::showMessage(4, "No se encontraron resultados", null);
			#Se llama al metodo getProfesor
			$data = $grades->getGrado();
		}
	}else{
		#Se llama al metodo getProfesor
		$data = $grades->getGrado();
	}
	if($data){
		require_once("../../app/views/grades/index_view.php");
	}else{
		Page::showMessage(3, "No hay grados disponibles", "create.php");
	}
}catch(Exception $error){
	#Se llama al metodo showMessage y se le pasan los argumentos indicados en este caso mensaje de error
	Page::showMessage(2, $error->getMessage(), null);
}
?>