<?php
require_once("../../app/models/students.class.php");
try{
  if($_GET['id']){
        #Se crea una instancia de la clase
$students = new Students;
#isset se ocupa para saber si una variable esta definida en este caso el $_POST['crear'] 
	#En este caso solo se definira cuando manden datos por post a travez de un submit 
    $students->setId($_GET['id']);
       #Se ejecuta el metodo para leer 
    $students->readEstudiante();

if(isset($_POST['update'])){
    $_POST = $students->validateForm($_POST);
    #Se le pasa el argumento indicado (Dato del formulario) y se ejecuta el metodo
    if($students->setNombre($_POST['nombre'])){
        if($students->setNacimiento($_POST['fecha'])){
            if($students->setNombreE($_POST['nombreE'])){
                if($students->setTelefono($_POST['telefono'])){
                    if($students->setCorreo($_POST['correo'])){
                        #Se ejecuta el metodo para crear usuario
                        if($students->updateEstudiante()){
                            #Se llama al metodo showMessage y se le pasan los argumentos indicados
                            Page::showMessage(1, "Estudiante actualizado", "index.php");
                        }else {
                            #Se llama al metodo showMessage y se le pasan los argumentos indicados
                            Page::showMessage(2, "No se actualizo", null);
                        }
                    }else{
                        #Lanza una excepcion  
                        throw new Exception("Correo incorrecto");
                    }
                }else{
                    throw new Exception("Telelfono incorrecto");
                }
            
            }else{
                throw new Exception("Encargado incorrecto");
            }
        }else{
            throw new Exception("Fecha de nacimiento incorrecto");
        }
    }else{
            throw new Exception("Nombre incorrecto");
        }
    }
  }else {
    Page::showMessage(3, "Seleccione Estudiante", "index.php");
  }
#Captura la exception 
}catch(Exception $error){
#Se llama al metodo showMessage y se le pasan los argumentos indicados en este caso mensaje de error
Page::showMessage(2, $error->getMessage(), null);
}
require_once("../../app/views/students/update_view.php");
?>