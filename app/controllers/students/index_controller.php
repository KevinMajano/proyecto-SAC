<?php
require_once("../../app/models/students.class.php");
try{
	#Se crea una instancia de la clase
	$students = new Students;
	#isset se ocupa para saber si una variable esta definida en este caso el $_POST['buscar'] 
	#En este caso solo se definira cuando manden datos por post a travez de un submit 
	if(isset($_POST['buscar'])){
		$_POST = $students->validateForm($_POST);
		#$data almacena el arreglo de datos que retorna el metodo
        $data = $students->searchEstudiante($_POST['nombre']);
		if($data){
			#Se guardan que numero de datos tiene la variable data
			$rows = count($data);
			#Se llama al metodo showMessage y se le pasan los argumentos indicados
			Page::showMessage(4, "Se encontraron $rows resuldatos", null);
		}else{
			#Se llama al metodo showMessage y se le pasan los argumentos indicados
			Page::showMessage(4, "No se encontraron resultados", null);
			#Se llama al metodo get
			$data = $students->getEstudiante();
		}
	}else{
		#Se llama al metodo get
		$data = $students->getEstudiante();
	}
	if($data){
		require_once("../../app/views/students/index_view.php");
	}else{
		Page::showMessage(3, "No hay estudiantes disponibles", "create.php");
	}
}catch(Exception $error){
	#Se llama al metodo showMessage y se le pasan los argumentos indicados en este caso mensaje de error
	Page::showMessage(2, $error->getMessage(), null);
}
?>