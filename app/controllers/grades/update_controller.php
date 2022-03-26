<?php
require_once("../../app/models/grades.class.php");
try{
  if($_GET['id']){
        #Se crea una instancia de la clase grades
$grades = new Grades;
#isset se ocupa para saber si una variable esta definida en este caso el $_POST['crear'] 
	#En este caso solo se definira cuando manden datos por post a travez de un submit 
    $grades->setId($_GET['id']);
       #Se ejecuta el metodo para leer usuario
    $grades->readGrado();

if(isset($_POST['update'])){
    $_POST = $grades->validateForm($_POST);
    #Se le pasa el argumento indicado (Dato del formulario) y se ejecuta el metodo
    if ($grades->setIdProfesor($_POST['profesores'])) {
        if ($grades->setNombre($_POST['nombre'])) {
            if ($grades->setAnio($_POST['fecha'])) {
                #Se ejecuta el metodo para crear usuario
                if ($grades->updateGrado()) {
                    #Se llama al metodo showMessage y se le pasan los argumentos indicados
                    Page::showMessage(1, "Grado actualizado", "index.php");
                } else {
                    #Se llama al metodo showMessage y se le pasan los argumentos indicados
                    Page::showMessage(2, "No se actualizo", null);
                }
            } else {
                throw new Exception("Año incorrecto");
            }
        } else {
            throw new Exception("Nombre incorrecto");
        }
    } else {
        throw new Exception("Profesor incorrecto");
    }
    }
  }else {
    Page::showMessage(3, "Seleccione grado", "index.php");
  }
#Captura la exception 
}catch(Exception $error){
#Se llama al metodo showMessage y se le pasan los argumentos indicados en este caso mensaje de error
Page::showMessage(2, $error->getMessage(), null);
}
require_once("../../app/views/grades/update_view.php");
?>