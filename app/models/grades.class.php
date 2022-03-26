<?php
#Se crea una clase profesors que hereda los elementos de Validator(clase de validaciones)
class Grades extends Validator{
    #Se crean las variables privadas y se inicializan en null
    private $id_grado = null;
    private $id_profesor = null;
    private $nombre_profesor = null;
    private $nombre_grado = null;
    private $anio = null;

//Elementos del id para ingresar
    public function setId($value){
        if($this->validateId($value)){
			$this->id_grado = $value;
			return true;
		}else{
			return false;
		}
    }
//Funcion para recolectar el id
    public function getId(){
        return $this->id_grado;
    }

//Elementos del id para ingresar
public function setIdProfesor($value){
    if($this->validateId($value)){
        $this->id_profesor = $value;
        return true;
    }else{
        return false;
    }
}
//Funcion para recolectar el id
public function getIdProfesor(){
    return $this->id_profesor;
}
//Elementos del nombre para ingresar
    public function setNombre($value){
        if($this->validateAlphanumeric($value,1,50)){
            $this->nombre_grado = $value;
            return true;
        }else{
            return false;
        }
    }
//Funcion para recolectar el nombre
    public function getNombre(){
        return $this->nombre_grado;
    }

    //Elementos del nombre para ingresar
    public function setNombreProfesor($value){
        if($this->validateAlphanumeric($value,1,50)){
            $this->nombre_profesor = $value;
            return true;
        }else{
            return false;
        }
    }
//Funcion para recolectar el nombre
    public function getNombreProfesor(){
        return $this->nombre_profesor;
    }
    
//Elementos del nacimiento para ingresar
    public function setAnio($value){
        if($this->validateAlphanumeric($value,1,50)){
            $this->anio = $value;
            return true;
        }else{
            return false;
        }
    }
//Funcion para recolectar el nacimiento
    public function getAnio(){
        return $this->anio;
    }


#Funcion para crear profesor
    public function createGrado(){    
        #Se guarda la consulta en una variable
        $sql = "INSERT INTO `grados`(`id_profesor`, `nombre_grado`, `anio`) VALUES (?,?,?)";
        #se guardan los parametros (datos recogidos) en una variable,como un arreglo
        $params = array($this->id_profesor,$this->nombre_grado,$this->anio);
        #Retorna el estado que devuelve el metodo executeRow 
        return Database::executeRow($sql, $params);
    }
    #Funcion para leer profesor 
    public function readGrado(){
        #Se guarda la consulta en una variable
		$sql = "SELECT id_grado,id_profesor,nombre_profesor, nombre_grado, anio FROM grados g INNER JOIN profesores p USING(id_profesor) WHERE id_grado = ?";
        #se guardan los parametros (datos recogidos) en una variable,como un arreglo
        $params = array($this->id_grado);
        #guarda los datos devueltos del metodo getRow
		$grado = Database::getRow($sql, $params);
		if($grado){
            #Se guardan los datos obtenidos en las variables pertenecientes a la clase
			$this->id_profesor = $grado['id_profesor'];
			$this->nombre_profesor = $grado['nombre_profesor'];
			$this->nombre_grado = $grado['nombre_grado'];
			$this->anio = $grado['anio'];         
			return true;
		}else{
			return null;
		}
	}
    #Funcion para actualizar profesor
    public function updateGrado(){
        #Se ocupa una funcion nativa de php para encriptar contraseña   
         #Se guarda la consulta en una variable
        $sql = "UPDATE `grados` SET `id_profesor`= ?,`nombre_grado`= ?,`anio`= ? WHERE id_grado = ?";
         #se guardan los parametros (datos recogidos) en una variable,como un arreglo
        $params = array($this->id_profesor,$this->nombre_grado,$this->anio,$this->id_grado);
          #Retorna el estado que devuelve el metodo executeRow 
        return Database::executeRow($sql, $params);
    }
    #Funcion para eliminar profesor
    public function deleteGrado(){
         #Se guarda la consulta en una variable
        $sql = "DELETE FROM `grados` WHERE id_grado = ? ";
         #se guardan los parametros (datos recogidos) en una variable,como un arreglo
        $params = array($this->id_grado);
           #Retorna el estado que devuelve el metodo executeRow 
		return Database::executeRow($sql, $params);
	}
    #Funcion para busqueda de registros
    public function searchGrado($value){
        #Se guarda la consulta en una variable
        $sql = "SELECT id_grado,nombre_profesor, nombre_grado, anio FROM grados g INNER JOIN profesores p USING(id_profesor)  WHERE nombre_grado like  ? ORDER BY nombre_grado";
         #se guardan los parametros (datos recogidos) en una variable,como un arreglo
        $params = array("%$value%");
        #Retorna los datos que devuelve el metodo getRows 
		return Database::getRows($sql, $params);
    }
    
    public function getGrado(){
        #Se guarda la consulta en una variable
        $sql = $sql = "SELECT id_grado,nombre_profesor, nombre_grado, anio FROM grados g INNER JOIN profesores p USING(id_profesor) ORDER BY nombre_grado";
         #se guardan los parametros (datos recogidos) en una variable,como un arreglo
        $params = array(null);
        #Retorna los datos que devuelve el metodo getRows 
		return Database::getRows($sql, $params);
	}

    //Combobox 
    public function getProfesores(){
        $sql = $sql = "SELECT id_profesor,nombre_profesor FROM profesores";
        $params = array(null);
		return Database::getRows($sql, $params);
	}
}
?>