<?php
require_once("../../app/models/faults.class.php");
try{
    #Se crea una instancia de la clase
$faults = new Faults;
#isset se ocupa para saber si una variable esta definida en este caso el $_POST['crear'] 
	#En este caso solo se definira cuando manden datos por post a travez de un submit 
if(isset($_POST['crear'])){
    $_POST = $faults->validateForm($_POST);
    #Se le pasa el argumento indicado (Dato del formulario) y se ejecuta el metodo
    if($faults->setNombre($_POST['nombre'])){
        if($faults->setTipo($_POST['tipo'])){
            #Se ejecuta el metodo para crear usuario
            if($faults->createFalta()){
                #Se llama al metodo showMessage y se le pasan los argumentos indicados
                Page::showMessage(1, "Falta creada", "index.php");
            }else {
                #Se llama al metodo showMessage y se le pasan los argumentos indicados
                Page::showMessage(2, "No se creo", null);
            }
                    
        }else{
            throw new Exception("Nombre incorrecto");
        }
    }else{
            throw new Exception("Tipo incorrecto");
        }
    }
#Captura la exception 
}catch(Exception $error){
#Se llama al metodo showMessage y se le pasan los argumentos indicados en este caso mensaje de error
Page::showMessage(2, $error->getMessage(), null);
}
require_once("../../app/views/faults/create_view.php");
?>