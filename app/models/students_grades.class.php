<?php
#Se crea una clase profesors que hereda los elementos de Validator(clase de validaciones)
class StudentsG extends Validator{
    #Se crean las variables privadas y se inicializan en null
    private $id_alumno_grado  = null;
    private $id_alumno = null;
    private $nombre_grado = null;
    private $id_grado = null;
    private $nombre_alumno = null;

//Elementos del id para ingresar
    public function setId($value){
        if($this->validateId($value)){
			$this->id_alumno_grado  = $value;
			return true;
		}else{
			return false;
		}
    }
//Funcion para recolectar el id
    public function getId(){
        return $this->id_alumno_grado ;
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
public function setIdGrado($value){
    if($this->validateId($value)){
        $this->id_grado = $value;
        return true;
    }else{
        return false;
    }
}
//Funcion para recolectar el id
public function getIdGrado(){
    return $this->id_grado;
}
//Elementos del nombre para ingresar
    public function setNombreG($value){
        if($this->validateAlphanumeric($value,1,100)){
            $this->nombre_grado = $value;
            return true;
        }else{
            return false;
        }
    }
//Funcion para recolectar el nombre
    public function getNombreG(){
        return $this->nombre_grado;
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


#Funcion para crear
    public function createGradoAlumno(){    
        #Se guarda la consulta en una variable
        $sql = "INSERT INTO `alumnos_grados`(`id_alumno`, `id_grado`) VALUES (?,?)";
        #se guardan los parametros (datos recogidos) en una variable,como un arreglo
        $params = array($this->id_alumno,$this->id_grado);
        #Retorna el estado que devuelve el metodo executeRow 
        return Database::executeRow($sql, $params);
    }

    public function readGradoEstudiante(){
        #Se guarda la consulta en una variable
		$sql = "SELECT id_alumno_grado, nombre_alumno, id_grado, CONCAT(nombre_grado,' (',anio,')') as grado FROM alumnos_grados INNER JOIN alumnos a USING(id_alumno) INNER JOIN grados g USING(id_grado) WHERE id_alumno = ?";
        #se guardan los parametros (datos recogidos) en una variable,como un arreglo
        $params = array($this->id_alumno);
        #guarda los datos devueltos del metodo getRow
		$student = Database::getRow($sql, $params);
		if($student){
            #Se guardan los datos obtenidos en las variables pertenecientes a la clase
            $this->id_alumno_grado = $student['id_alumno_grado'];
			$this->nombre_alumno = $student['nombre_alumno'];
            $this->id_grado = $student['id_grado'];
			$this->nombre_grado = $student['grado'];

			return true;
		}else{
			return null;
		}
	}
    #Funcion para actualizar 
    public function updateGradoEstudiante(){
        #Se ocupa una funcion nativa de php para encriptar contraseña   
         #Se guarda la consulta en una variable
        $sql = "UPDATE `alumnos_grados` SET `id_grado`= ? WHERE id_alumno = ?";
         #se guardan los parametros (datos recogidos) en una variable,como un arreglo
        $params = array($this->id_grado,$this->id_alumno);
          #Retorna el estado que devuelve el metodo executeRow 
        return Database::executeRow($sql, $params);
    }
    #Funcion para eliminar 
    public function deleteFaltaEstudiante(){
         #Se guarda la consulta en una variable
        $sql = "DELETE FROM `alumnos_grados` WHERE id_alumno = ? ";
         #se guardan los parametros (datos recogidos) en una variable,como un arreglo
        $params = array($this->id_alumno);
           #Retorna el estado que devuelve el metodo executeRow 
		return Database::executeRow($sql, $params);
	}

    //Combobox 
    public function getGrados(){
        $anio = date("Y");
        $sql = $sql = "SELECT id_grado, CONCAT(nombre_grado,' (',anio,')') as grado FROM grados WHERE anio = ?";
        $params = array($anio);
		return Database::getRows($sql, $params);
	}

    public function readEstudiante(){
        #Se guarda la consulta en una variable
		$sql = "SELECT `nombre_alumno` FROM `alumnos` WHERE id_alumno = ?";
        #se guardan los parametros (datos recogidos) en una variable,como un arreglo
        $params = array($this->id_alumno );
        #guarda los datos devueltos del metodo getRow
		$student = Database::getRow($sql, $params);
		if($student){
            #Se guardan los datos obtenidos en las variables pertenecientes a la clase
			$this->nombre_alumno = $student['nombre_alumno'];
			return true;
		}else{
			return null;
		}
	} 

}
?>