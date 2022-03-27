<?php
#Se crea una clase profesors que hereda los elementos de Validator(clase de validaciones)
class Faults extends Validator{
    #Se crean las variables privadas y se inicializan en null
    private $id_falta   = null;
    private $id_tipo_falta  = null;
    private $nombre_falta = null;
    


//Elementos del id para ingresar
    public function setId($value){
        if($this->validateId($value)){
			$this->id_falta = $value;
			return true;
		}else{
			return false;
		}
    }
//Funcion para recolectar el id
    public function getId(){
        return $this->id_falta;
    }

    //Elementos del id para ingresar
    public function setTipo($value){
        if($this->validateId($value)){
			$this->id_tipo_falta = $value;
			return true;
		}else{
			return false;
		}
    }
//Funcion para recolectar el id
    public function getTipo(){
        return $this->id_tipo_falta;
    }

//Elementos del nombre para ingresar
    public function setNombre($value){
        if($this->validateAlphanumeric($value,1,50)){
            $this->nombre_falta = $value;
            return true;
        }else{
            return false;
        }
    }
//Funcion para recolectar el nombre
    public function getNombre(){
        return $this->nombre_falta;
    }



#Funcion para crear profesor
    public function createFalta(){    
      
        #Se guarda la consulta en una variable
        $sql = "INSERT INTO `faltas`(`id_tipo_falta`,`nombre_falta`) VALUES(?,?)";
        #se guardan los parametros (datos recogidos) en una variable,como un arreglo
        $params = array($this->id_tipo_falta,$this->nombre_falta);
        #Retorna el estado que devuelve el metodo executeRow 
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
    #Funcion para actualizar profesor
    public function updateFalta(){
        $sql = "UPDATE `faltas` SET `nombre_falta`= ? ,`id_tipo_falta`= ? WHERE id_falta   = ?";
         #se guardan los parametros (datos recogidos) en una variable,como un arreglo
        $params = array($this->nombre_falta,$this->id_tipo_falta,$this->id_falta );
          #Retorna el estado que devuelve el metodo executeRow 
        return Database::executeRow($sql, $params);
    }
    #Funcion para eliminar profesor
    public function deleteFalta(){
         #Se guarda la consulta en una variable
        $sql = "DELETE FROM `faltas` WHERE id_falta   = ? ";
         #se guardan los parametros (datos recogidos) en una variable,como un arreglo
        $params = array($this->id_falta );
           #Retorna el estado que devuelve el metodo executeRow 
		return Database::executeRow($sql, $params);
	}
    #Funcion para busqueda de registros
    public function searchFalta($value){
        #Se guarda la consulta en una variable
        $sql = "SELECT f.id_falta, f.nombre_falta, t.nombre_tipo_falta as tipo FROM faltas f INNER JOIN tipos_faltas t USING(id_tipo_falta)  WHERE f.nombre_falta like  ? GROUP BY id_tipo_falta ";
         #se guardan los parametros (datos recogidos) en una variable,como un arreglo
        $params = array("%$value%");
        #Retorna los datos que devuelve el metodo getRows 
		return Database::getRows($sql, $params);
    }
    
    public function getFalta(){
        #Se guarda la consulta en una variable
        $sql = "SELECT id_falta, nombre_falta, t.nombre_tipo_falta as tipo FROM faltas f INNER JOIN tipos_faltas t USING(id_tipo_falta) GROUP BY id_tipo_falta;";
         #se guardan los parametros (datos recogidos) en una variable,como un arreglo
        $params = array(null);
        #Retorna los datos que devuelve el metodo getRows 
		return Database::getRows($sql, $params);
	}

    public function getTipos(){
        #Se guarda la consulta en una variable
        $sql = "SELECT id_tipo_falta, nombre_tipo_falta FROM tipos_faltas;";
         #se guardan los parametros (datos recogidos) en una variable,como un arreglo
        $params = array(null);
        #Retorna los datos que devuelve el metodo getRows 
		return Database::getRows($sql, $params);
	}

}
?>