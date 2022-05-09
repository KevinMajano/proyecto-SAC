<?php
#Se crea una clase profesors que hereda los elementos de Validator(clase de validaciones)
class Assistance extends Validator{
    #Se crean las variables privadas y se inicializan en null
    private $id_asistencia  = null;
    private $id_alumno_asistencia  = null;
    private $fecha_asistencia = null;

    private $nombre_alumno = null;
    private $id_grado = null;
    


    public function setId($value){
        if($this->validateId($value)){
			$this->id_asistencia = $value;
			return true;
		}else{
			return false;
		}
    }
    public function getId(){
        return $this->id_asistencia;
    }


    public function setIdAlumnoAs($value){
        if($this->validateId($value)){
			$this->id_alumno_asistencia = $value;
			return true;
		}else{
			return false;
		}
    }

    public function getIdAlumnoAs(){
        return $this->id_alumno_asistencia;
    }

  

    public function setIdGrado($value){
        if($this->validateId($value)){
			$this->id_grado = $value;
			return true;
		}else{
			return false;
		}
    }

    public function getIdGrado(){
        return $this->id_grado;
    }



    public function setFechaAs($value){
        $this->fecha_asistencia = $value;
        return true;
}

    public function getFechaAs(){
        return $this->fecha_asistencia;
    }



    public function setNombre($value){
        if($this->validateAlphanumeric($value,1,50)){
            $this->nombre_alumno = $value;
            return true;
        }else{
            return false;
        }
    }
    public function getNombre(){
        return $this->nombre_alumno;
    }


#Funcion para crear profesor
    public function createAsistencia(){    
        $sql = "INSERT INTO `asistencia`(`id_alumno_grado`, `fecha_asistencia`) VALUES (?,?)";
        $params = array($this->id_alumno_asistencia,$this->fecha_asistencia);
        return Database::executeRow($sql, $params);
    }
    #Funcion para leer profesor 
    public function readFalta(){
        #Se guarda la consulta en una variable
		$sql = "SELECT `id_falta`, `nombre_falta`, `id_tipo_falta` FROM `faltas` WHERE id_falta  = ?";
        #se guardan los parametros (datos recogidos) en una variable,como un arreglo
        $params = array($this->id_falta );
        #guarda los datos devueltos del metodo getRow
		$fault = Database::getRow($sql, $params);
		if($fault){
            #Se guardan los datos obtenidos en las variables pertenecientes a la clase
			$this->nombre_falta = $fault['nombre_falta'];
			$this->id_tipo_falta  = $fault['id_tipo_falta'];  
			return true;
		}else{
			return null;
		}
	}
  
    public function getAsistenciaToday(){
        #Se guarda la consulta en una variable
        $sql = "SELECT `id_alumno`,`nombre_alumno` FROM alumnos al 
        INNER JOIN alumnos_grados ag USING(id_alumno)
        INNER JOIN grados g USING(id_grado)
        LEFT JOIN asistencia a ON ag.id_alumno_grado = a.id_alumno_grado
        WHERE al.id_alumno = ag.id_alumno
        AND a.fecha_asistencia < CURDATE()
        AND g.id_grado = ?;
        ";
         #se guardan los parametros (datos recogidos) en una variable,como un arreglo
        $params = array($this->id_grado);
        #Retorna los datos que devuelve el metodo getRows 
		return Database::getRows($sql, $params);
	}

    public function getAsistencia(){
        #Se guarda la consulta en una variable
        $sql = "SELECT `id_alumno`,`nombre_alumno` FROM alumnos al 
        INNER JOIN alumnos_grados ag USING(id_alumno)
        INNER JOIN grados g USING(id_grado)
        LEFT JOIN asistencia a ON ag.id_alumno_grado = a.id_alumno_grado
        WHERE al.id_alumno = ag.id_alumno
        AND a.fecha_asistencia = ?
        AND g.id_grado = ?;
        ";
         #se guardan los parametros (datos recogidos) en una variable,como un arreglo
        $params = array($this->fecha_asistencia,$this->id_grado);
        #Retorna los datos que devuelve el metodo getRows 
		return Database::getRows($sql, $params);
	}

     //Combobox 
     public function getGrados(){
        $sql = $sql = "SELECT id_grado,nombre_grado FROM grados";
        $params = array(null);
		return Database::getRows($sql, $params);
	}

}
?>