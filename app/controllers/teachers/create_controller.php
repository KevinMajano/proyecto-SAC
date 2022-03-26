<?php
require_once("../../app/models/teachers.class.php");
try{
    #Se crea una instancia de la clase teachers
$teachers = new Teachers;
#isset se ocupa para saber si una variable esta definida en este caso el $_POST['crear'] 
	#En este caso solo se definira cuando manden datos por post a travez de un submit 
if(isset($_POST['crear'])){
    $_POST = $teachers->validateForm($_POST);
    #Se le pasa el argumento indicado (Dato del formulario) y se ejecuta el metodo
    if($teachers->setNombre($_POST['nombre'])){
        if($teachers->setNacimiento($_POST['fecha'])){
                if($_POST['clave1'] == $_POST['clave2']){
                    if($teachers->setClave($_POST['clave1'])){
                        if($teachers->setTelefono($_POST['telefono'])){
                            if($teachers->setCorreo($_POST['correo'])){
                                #Se ejecuta el metodo para crear usuario
                                if($teachers->createProfesor()){
                                    #Se llama al metodo showMessage y se le pasan los argumentos indicados
                                    Page::showMessage(1, "Profesor creado", "index.php");
                                }else {
                                    #Se llama al metodo showMessage y se le pasan los argumentos indicados
                                    Page::showMessage(2, "No se creo", null);
                                }
                            }else{
                                #Lanza una excepcion  
                                throw new Exception("Correo incorrecto");
                            }
                }else{
                    throw new Exception("Telelfono incorrecto");
                }
            }else{
                throw new Exception("Clave incorrecto");
            }
    }else{
        throw new Exception("Contraseñas distintas");
    }
}else{
    throw new Exception("Fecha de nacimiento incorrecto");
}
}else{
        throw new Exception("Nombre incorrecto");
    }
}
#Captura la exception 
}catch(Exception $error){
#Se llama al metodo showMessage y se le pasan los argumentos indicados en este caso mensaje de error
Page::showMessage(2, $error->getMessage(), null);
}
require_once("../../app/views/teachers/create_view.php");
?>