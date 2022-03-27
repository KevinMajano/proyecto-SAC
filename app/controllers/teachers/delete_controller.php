<?php
require_once("../../app/models/teachers.class.php");
try{
	#isset se ocupa para saber si una variable esta definida en este caso el $_POST['id'] 
	#En este caso solo se definira cuando manden datos por get a travez de la url 
	if(isset($_GET['id'])){
		#Se crea una instancia de la clase teachers
        $teachers = new Teachers;
		#Se le pasa el argumento indicado (Dato del formulario) y se ejecuta el metodo
		if($teachers->setId($_GET['id'])){
			 #Se ejecuta el metodo para leer usuario
			if($teachers->readProfesor()){
				#isset se ocupa para saber si una variable esta definida en este caso el $_POST['delete'] 
				#En este caso solo se definira cuando manden datos por Post a travez de un submit 
				if(isset($_POST['delete'])){
					#Se ejecuta el metodo eliminar usuario
					if($teachers->deleteProfesores()){
						#Se llama al metodo showMessage y se le pasan los argumentos indicados
						Page::showMessage(1, "Profesor eliminado", "index.php");
					}else{
						#Se lanza una Exception obteniendo su argumento de la clase Database
						throw new Exception(Database::getException());
					}
				}
			}else{
				throw new Exception("Profesor inexistente");
			}
		}else{
			throw new Exception("Profesor incorrecta");
		}
	}else{
		Page::showMessage(3, "Seleccione Profesor", "index.php");
	}
	#Se captura la exception
}catch(Exception $error){
	 #Se llama al metodo showMessage y se le pasan los argumentos indicados en este caso mensaje de error
	Page::showMessage(2, $error->getMessage(), "index.php");
}
require_once("../../app/views/teachers/delete_view.php");
?>