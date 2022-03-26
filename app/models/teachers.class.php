<?php
#Se crea una clase profesors que hereda los elementos de Validator(clase de validaciones)
class Teachers extends Validator{
    #Se crean las variables privadas y se inicializan en null
    private $id_profesor = null;
    private $nombre_profesor = null;
    private $nacimiento_profesor = null;
    private $correo_profesor = null;
    private $telefono_profesor = null;
    private $clave_profesor = null;
    private $token_profesor = null;

//Elementos del id para ingresar
    public function setId($value){
        if($this->validateId($value)){
			$this->id_profesor = $value;
			return true;
		}else{
			return false;
		}
    }
//Funcion para recolectar el id
    public function getId(){
        return $this->id_profesor;
    }

//Elementos del nombre para ingresar
    public function setNombre($value){
        if($this->validateAlphanumeric($value,1,50)){
            $this->nombre_profesor = $value;
            return true;
        }else{
            return false;
        }
    }
//Funcion para recolectar el nombre
    public function getNombre(){
        return $this->nombre_profesor;
    }

//Elementos del nacimiento para ingresar
    public function setNacimiento($value){
        if($this->validateAlphanumeric($value,1,50)){
            $this->nacimiento_profesor = $value;
            return true;
        }else{
            return false;
        }
    }
//Funcion para recolectar el nacimiento
    public function getNacimiento(){
        return $this->nacimiento_profesor;
    }


//Elementos de clave para ingresar
    public function setClave($value){
		if($this->validateAlphanumeric($value,1,50)){
			$this->clave_profesor = $value;
			return true;
		  }else{
		  	return false;
		  } 
    }
    //Funcion para recolectar la clave
	public function getClave(){
		return $this->clave_profesor;
    }
//Elementos del telefono para ingresar
    public function setTelefono($value){
        if($this->validateNumeric($value,1,50)){
            $this->telefono_profesor = $value;
            return true;
        }else{
            return false;
        }
    }
//Funcion para recolectar el telefono
    public function getTelefono(){
        return $this->telefono_profesor;
    }

//Elementos del correo para ingresar
    public function setCorreo($value){
		if($this->validateEmail($value)){
			$this->correo_profesor = $value;
			return true;
		}else{
			return false;
		}
    }
//Funcion para recolectar el correo
	public function getCorreo(){
		return $this->correo_profesor;
    }

#Funcion para crear profesor
    public function createProfesor(){    
        #Se ocupa una funcion nativa de php para encriptar contraseña   
        $hash = password_hash($this->clave_profesor,PASSWORD_DEFAULT);
        #Se guarda la consulta en una variable
        $sql = "INSERT INTO `profesores`(`nombre_profesor`, `nacimiento_profesor`, `correo_profesor`, `telefono_profesor`, `contrasena_profesor`) VALUES(?,?,?,?,?)";
        #se guardan los parametros (datos recogidos) en una variable,como un arreglo
        $params = array($this->nombre_profesor,$this->nacimiento_profesor,$this->correo_profesor,$this->telefono_profesor,$hash);
        #Retorna el estado que devuelve el metodo executeRow 
        return Database::executeRow($sql, $params);
    }
    #Funcion para leer profesor 
    public function readProfesor(){
        #Se guarda la consulta en una variable
		$sql = "SELECT `id_profesor`, `nombre_profesor`, `nacimiento_profesor`, `correo_profesor`, `telefono_profesor`, `contrasena_profesor`FROM `profesores` WHERE id_profesor = ?";
        #se guardan los parametros (datos recogidos) en una variable,como un arreglo
        $params = array($this->id_profesor);
        #guarda los datos devueltos del metodo getRow
		$profesor = Database::getRow($sql, $params);
		if($profesor){
            #Se guardan los datos obtenidos en las variables pertenecientes a la clase
			$this->nombre_profesor = $profesor['nombre_profesor'];
			$this->nacimiento_profesor = $profesor['nacimiento_profesor'];
			$this->correo_profesor = $profesor['correo_profesor'];
			$this->telefono_profesor = $profesor['telefono_profesor'];
            $this->clave_profesor = $profesor['contrasena_profesor'];         
			return true;
		}else{
			return null;
		}
	}
    #Funcion para actualizar profesor
    public function updateProfesor(){
        #Se ocupa una funcion nativa de php para encriptar contraseña   
        $hash = password_hash($this->clave_profesor,PASSWORD_DEFAULT);
         #Se guarda la consulta en una variable
        $sql = "UPDATE `profesores` SET `nombre_profesor`= ? ,`nacimiento_profesor`= ? ,`correo_profesor`= ? ,`telefono_profesor`= ? ,`contrasena_profesor`= ?  WHERE id_profesor = ?";
         #se guardan los parametros (datos recogidos) en una variable,como un arreglo
        $params = array($this->nombre_profesor,$this->nacimiento_profesor,$this->correo_profesor,$this->telefono_profesor,$hash,$this->id_profesor);
          #Retorna el estado que devuelve el metodo executeRow 
        return Database::executeRow($sql, $params);
    }
    #Funcion para eliminar profesor
    public function deleteProfesores(){
         #Se guarda la consulta en una variable
        $sql = "DELETE FROM `profesores` WHERE id_profesor = ? ";
         #se guardan los parametros (datos recogidos) en una variable,como un arreglo
        $params = array($this->id_profesor);
           #Retorna el estado que devuelve el metodo executeRow 
		return Database::executeRow($sql, $params);
	}
    #Funcion para busqueda de registros
    public function searchProfesores($value){
        #Se guarda la consulta en una variable
        $sql = "SELECT * FROM profesores  WHERE nombre_profesor like  ? ORDER BY nombre_profesor";
         #se guardan los parametros (datos recogidos) en una variable,como un arreglo
        $params = array("%$value%");
        #Retorna los datos que devuelve el metodo getRows 
		return Database::getRows($sql, $params);
    }
    
    public function getProfesor(){
        #Se guarda la consulta en una variable
        $sql = "SELECT * FROM profesores ORDER BY nombre_profesor";
         #se guardan los parametros (datos recogidos) en una variable,como un arreglo
        $params = array(null);
        #Retorna los datos que devuelve el metodo getRows 
		return Database::getRows($sql, $params);
	}

}
?>