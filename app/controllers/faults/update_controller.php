<?php
require_once("../../app/models/faults.class.php");
try{
  if($_GET['id']){
        #Se crea una instancia de la clase
$faults = new Faults;
#isset se ocupa para saber si una variable esta definida en este caso el $_POST['crear'] 
	#En este caso solo se definira cuando manden datos por post a travez de un submit 
    $faults->setId($_GET['id']);
       #Se ejecuta el metodo para leer 
    $faults->readFalta();

if(isset($_POST['update'])){
    $_POST = $faults->validateForm($_POST);
    #Se le pasa el argumento indicado (Dato del formulario) y se ejecuta el metodo
    if($faults->setNombre($_POST['nombre'])){
        if($faults->setTipo($_POST['tipo'])){
            #Se ejecuta el metodo para crear usuario
            if($faults->updateFalta()){
                #Se llama al metodo showMessage y se le pasan los argumentos indicados
                Page::showMessage(1, "Falta actualizada", "index.php");
            }else {
                #Se llama al metodo showMessage y se le pasan los argumentos indicados
                Page::showMessage(2, "No se actualizo", null);
            }
        }else{
            throw new Exception("Nombre incorrecto");
        }
    }else{
            throw new Exception("Tipo incorrecto");
        }
    }
  }else {
    Page::showMessage(3, "Seleccione Falta", "index.php");
  }
#Captura la exception 
}catch(Exception $error){
#Se llama al metodo showMessage y se le pasan los argumentos indicados en este caso mensaje de error
Page::showMessage(2, $error->getMessage(), null);
}
require_once("../../app/views/faults/update_view.php");
?>