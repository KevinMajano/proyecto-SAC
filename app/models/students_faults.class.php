<?php
#Se crea una clase profesors que hereda los elementos de Validator(clase de validaciones)
class StudentsF extends Validator{
    #Se crean las variables privadas y se inicializan en null
    private $id_falta_alumno = null;
    private $id_alumno = null;
    private $nombre_alumno = null;
    private $id_falta = null;
    private $nombre_falta = null;
    private $descripcion = null;

//Elementos del id para ingresar
    public function setId($value){
        if($this->validateId($value)){
			$this->id_falta_alumno = $value;
			return true;
		}else{
			return false;
		}
    }
//Funcion para recolectar el id
    public function getId(){
        return $this->id_falta_alumno;
    }

//Elementos del id para ingresar
public function setIdAlumno($value){
    if($this->validateId($value)){
        $this->id_alumno = $value;
        return true;
    }else{
        return false;
    }
}
//Funcion para recolectar el id
public function getIdAlumno(){
    return $this->id_alumno;
}
//Elementos del id para ingresar
public function setIdFalta($value){
    if($this->validateId($value)){
        $this->id_falta = $value;
        return true;
    }else{
        return false;
    }
}
//Funcion para recolectar el id
public function getIdFalta(){
    return $this->id_falta;
}
//Elementos del nombre para ingresar
    public function setNombreA($value){
        if($this->validateAlphanumeric($value,1,100)){
            $this->nombre_alumno = $value;
            return true;
        }else{
            return false;
        }
    }
//Funcion para recolectar el nombre
    public function getNombreA(){
        return $this->nombre_alumno;
    }
//Elementos del nombre para ingresar
public function setNombreF($value){
    if($this->validateAlphanumeric($value,1,100)){
        $this->nombre_falta = $value;
        return true;
    }else{
        return false;
    }
}
//Funcion para recolectar el nombre
public function getNombreF(){
    return $this->nombre_falta;
}

public function setDescripcion($value){
    if($this->validateAlphanumeric($value,1,100)){
        $this->descripcion = $value;
        return true;
    }else{
        return false;
    }
}
//Funcion para recolectar el nombre
public function getDescripcion(){
    return $this->descripcion;
}


#Funcion para crear profesor
    public function createFaltaAlumno(){    
        #Se guarda la consulta en una variable
        $sql = "INSERT INTO `alumnos_faltas`(`id_alumno`, `id_falta`, `descripcion`) VALUES (?,?,?)";
        #se guardan los parametros (datos recogidos) en una variable,como un arreglo
        $params = array($this->id_alumno,$this->id_falta,$this->descripcion);
        #Retorna el estado que devuelve el metodo executeRow 
        return Database::executeRow($sql, $params);
    }

    public function readEstudianteFalta(){
        #Se guarda la consulta en una variable
		$sql = "SELECT id_alumno, nombre_alumno, id_falta, nombre_falta, descripcion FROM alumnos_faltas af INNER JOIN alumnos a USING(id_alumno) INNER JOIN faltas f USING(id_falta) WHERE id_falta_alumno = ?";
        #se guardan los parametros (datos recogidos) en una variable,como un arreglo
        $params = array($this->id_falta_alumno);
        #guarda los datos devueltos del metodo getRow
		$student = Database::getRow($sql, $params);
		if($student){
            #Se guardan los datos obtenidos en las variables pertenecientes a la clase
            $this->id_alumno = $student['id_alumno'];
			$this->nombre_alumno = $student['nombre_alumno'];
            $this->id_falta = $student['id_falta'];
			$this->nombre_falta = $student['nombre_falta'];
            $this->descripcion = $student['descripcion'];
			return true;
		}else{
			return null;
		}
	}

    public function readEstudiante(){
        #Se guarda la consulta en una variable
		$sql = "SELECT id_alumno, nombre_alumno FROM alumnos WHERE id_alumno = ?";
        #se guardan los parametros (datos recogidos) en una variable,como un arreglo
        $params = array($this->id_alumno);
        #guarda los datos devueltos del metodo getRow
		$student = Database::getRow($sql, $params);
		if($student){
            #Se guardan los datos obtenidos en las variables pertenecientes a la clase
            $this->id_alumno = $student['id_alumno'];
			$this->nombre_alumno = $student['nombre_alumno'];

			return true;
		}else{
			return null;
		}
	}
    #Funcion para actualizar profesor
    public function updateFaltaEstudiante(){
        #Se ocupa una funcion nativa de php para encriptar contraseña   
         #Se guarda la consulta en una variable
        $sql = "UPDATE `alumnos_faltas` SET `id_falta`= ?,`descripcion`= ? WHERE id_falta_alumno = ?";
         #se guardan los parametros (datos recogidos) en una variable,como un arreglo
        $params = array($this->id_falta,$this->descripcion,$this->id_falta_alumno);
          #Retorna el estado que devuelve el metodo executeRow 
        return Database::executeRow($sql, $params);
    }
    #Funcion para eliminar profesor
    public function deleteFaltaEstudiante(){
         #Se guarda la consulta en una variable
        $sql = "DELETE FROM `alumnos_faltas` WHERE id_falta_alumno = ? ";
         #se guardan los parametros (datos recogidos) en una variable,como un arreglo
        $params = array($this->id_falta_alumno);
           #Retorna el estado que devuelve el metodo executeRow 
		return Database::executeRow($sql, $params);
	}
    #Funcion para busqueda de registros
    
    public function getEstudianteFaltas(){
        #Se guarda la consulta en una variable
        $sql = $sql = "SELECT id_falta_alumno, nombre_tipo_falta, nombre_falta, descripcion FROM alumnos_faltas af INNER JOIN faltas f USING(id_falta) INNER JOIN tipos_faltas tf USING(id_tipo_falta) Where id_alumno = ?";
         #se guardan los parametros (datos recogidos) en una variable,como un arreglo
        $params = array($this->id_alumno);
        #Retorna los datos que devuelve el metodo getRows 
		return Database::getRows($sql, $params);
	}

    //Combobox 
    public function getFaltas(){
        $sql = $sql = "SELECT id_falta,nombre_falta FROM faltas";
        $params = array(null);
		return Database::getRows($sql, $params);
	}

    public function getEstudiantes(){
        #Se guarda la consulta en una variable
        $sql = "SELECT id_alumno, nombre_alumno, nombre_encargado FROM alumnos";
         #se guardan los parametros (datos recogidos) en una variable,como un arreglo
        $params = array(null);
        #Retorna los datos que devuelve el metodo getRows 
		return Database::getRows($sql, $params);
	}

    public function searchEstudiante($value){
        #Se guarda la consulta en una variable
        $sql = "SELECT id_alumno, nombre_alumno FROM alumnos WHERE nombre_alumno like ?";
         #se guardan los parametros (datos recogidos) en una variable,como un arreglo
        $params = array("%$value%");
        #Retorna los datos que devuelve el metodo getRows 
		return Database::getRows($sql, $params);
    }
}
?>