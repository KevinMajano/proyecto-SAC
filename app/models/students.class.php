<?php
#Se crea una clase profesors que hereda los elementos de Validator(clase de validaciones)
class Students extends Validator{
    #Se crean las variables privadas y se inicializan en null
    private $id_alumno  = null;
    private $nombre_alumno = null;
    private $nacimiento_alumno = null;
    private $nombre_encargado = null;
    private $correo_encargado = null;
    private $telefono_encargado = null;


//Elementos del id para ingresar
    public function setId($value){
        if($this->validateId($value)){
			$this->id_alumno = $value;
			return true;
		}else{
			return false;
		}
    }
//Funcion para recolectar el id
    public function getId(){
        return $this->id_alumno;
    }

//Elementos del nombre para ingresar
    public function setNombre($value){
        if($this->validateAlphanumeric($value,1,50)){
            $this->nombre_alumno = $value;
            return true;
        }else{
            return false;
        }
    }
//Funcion para recolectar el nombre
    public function getNombre(){
        return $this->nombre_alumno;
    }

//Elementos del nacimiento para ingresar
    public function setNacimiento($value){
        if($this->validateAlphanumeric($value,1,50)){
            $this->nacimiento_alumno = $value;
            return true;
        }else{
            return false;
        }
    }
//Funcion para recolectar el nacimiento
    public function getNacimiento(){
        return $this->nacimiento_alumno;
    }


//Elementos de encargado para ingresar
    public function setNombreE($value){
		if($this->validateAlphanumeric($value,1,50)){
			$this->nombre_encargado = $value;
			return true;
		  }else{
		  	return false;
		  } 
    }
    //Funcion para recolectar encargado
	public function getNombreE(){
		return $this->nombre_encargado;
    }
//Elementos del telefono para ingresar
    public function setTelefono($value){
        if($this->validateNumeric($value,1,50)){
            $this->telefono_encargado = $value;
            return true;
        }else{
            return false;
        }
    }
//Funcion para recolectar el telefono
    public function getTelefono(){
        return $this->telefono_encargado;
    }

//Elementos del correo para ingresar
    public function setCorreo($value){
		if($this->validateEmail($value)){
			$this->correo_encargado = $value;
			return true;
		}else{
			return false;
		}
    }
//Funcion para recolectar el correo
	public function getCorreo(){
		return $this->correo_encargado;
    }

#Funcion para crear profesor
    public function createEstudiante(){    
      
        #Se guarda la consulta en una variable
        $sql = "INSERT INTO `alumnos`(`nombre_alumno`, `nacimiento_alumno`, `nombre_encargado`, `correo_encargado`, `telefono_encargado`) VALUES(?,?,?,?,?)";
        #se guardan los parametros (datos recogidos) en una variable,como un arreglo
        $params = array($this->nombre_alumno,$this->nacimiento_alumno,$this->nombre_encargado,$this->correo_encargado,$this->telefono_encargado);
        #Retorna el estado que devuelve el metodo executeRow 
        return Database::executeRow($sql, $params);
    }
    #Funcion para leer profesor 
    public function readEstudiante(){
        #Se guarda la consulta en una variable
		$sql = "SELECT `id_alumno`, `nombre_alumno`, `nacimiento_alumno`, `nombre_encargado`, `correo_encargado`, `telefono_encargado` FROM `alumnos` WHERE id_alumno = ?";
        #se guardan los parametros (datos recogidos) en una variable,como un arreglo
        $params = array($this->id_alumno );
        #guarda los datos devueltos del metodo getRow
		$student = Database::getRow($sql, $params);
		if($student){
            #Se guardan los datos obtenidos en las variables pertenecientes a la clase
			$this->nombre_alumno = $student['nombre_alumno'];
			$this->nacimiento_alumno = $student['nacimiento_alumno'];
            $this->nombre_encargado = $student['nombre_encargado'];
			$this->correo_encargado = $student['correo_encargado'];
			$this->telefono_encargado = $student['telefono_encargado'];
                     
			return true;
		}else{
			return null;
		}
	}
    #Funcion para actualizar profesor
    public function updateEstudiante(){
        $sql = "UPDATE `alumnos` SET `nombre_alumno`= ? ,`nacimiento_alumno`= ? ,`nombre_encargado`= ?, `correo_encargado`= ? ,`telefono_encargado`= ? WHERE id_alumno  = ?";
         #se guardan los parametros (datos recogidos) en una variable,como un arreglo
        $params = array($this->nombre_alumno,$this->nacimiento_alumno,$this->nombre_encargado,$this->correo_encargado,$this->telefono_encargado,$this->id_alumno );
          #Retorna el estado que devuelve el metodo executeRow 
        return Database::executeRow($sql, $params);
    }
    #Funcion para eliminar profesor
    public function deleteEstudiante(){
         #Se guarda la consulta en una variable
        $sql = "DELETE FROM `alumnos` WHERE id_alumno  = ? ";
         #se guardan los parametros (datos recogidos) en una variable,como un arreglo
        $params = array($this->id_alumno );
           #Retorna el estado que devuelve el metodo executeRow 
		return Database::executeRow($sql, $params);
	}
    #Funcion para busqueda de registros
    public function searchEstudiante($value){
        #Se guarda la consulta en una variable
        $sql = "SELECT * FROM alumnos  WHERE nombre_alumno like  ? ORDER BY nombre_alumno";
         #se guardan los parametros (datos recogidos) en una variable,como un arreglo
        $params = array("%$value%");
        #Retorna los datos que devuelve el metodo getRows 
		return Database::getRows($sql, $params);
    }
    
    public function getEstudiante(){
        #Se guarda la consulta en una variable
        $sql = "SELECT * FROM alumnos ORDER BY nombre_alumno";
         #se guardan los parametros (datos recogidos) en una variable,como un arreglo
        $params = array(null);
        #Retorna los datos que devuelve el metodo getRows 
		return Database::getRows($sql, $params);
	}

}
?>