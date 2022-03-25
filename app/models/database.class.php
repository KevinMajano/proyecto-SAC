<?php
class Database{
    #Se crean las variables privadas estaticas y se inicializan en null
    private static $connection = null;
    private static $statement = null;
    private static $id = null;
    private static $error = null;
    #Se crea la funcion connect
    private function connect(){
        $server = "localhost";
        $database = "asistenia_lis";
        $username = "root";
        $password = "";
        try{
            #Se instancia a la api de pdo
            @self::$connection = new PDO("mysql:host=$server; dbname=$database; charset=utf8", $username, $password);
        #Se captura una exception pdo 
        }catch(PDOException $exception){
            throw new Exception($exception->getCode());
        }
    }

    private function desconnect(){
        #ejecuta el metodo errorInfo y lo guarda en error, en dado caso exista
        self::$error = self::$statement->errorInfo();
        #iguala la connection a null
        self::$connection = null;
    }

    public static function executeRow($query, $values){
        #Se abre la conexion pdo
        self::connect();
        #Se ejecuta el metodo prepare perteneciente a la instancia pdo creada(connection) y se manda la consulta 
        self::$statement = self::$connection->prepare($query);
        #Ejecuta la consulta con los valores mandados
        $state = self::$statement->execute($values);
        #guarda el id de la ultima fila insertada
        self::$id = self::$connection->lastInsertId();
        self::desconnect();
        #devuelve el estado guardado al ejecutar  
        return $state;
    }

    public static function getRow($query, $values){
        #Se abre la conexion pdo
        self::connect();
         #Se ejecuta el metodo prepare perteneciente a la instancia pdo creada(connection) y se manda la consulta 
        self::$statement = self::$connection->prepare($query);
          #Ejecuta la consulta con los valores mandados
        self::$statement->execute($values);
        self::desconnect();
        #recorre los datos a través de fetch uno por un y los retorna 
        return self::$statement->fetch();
    }

    public static function getRows($query, $values){
        #Se abre la conexion pdo
        self::connect();
         #Se ejecuta el metodo prepare perteneciente a la instancia pdo creada(connection) y se manda la consulta 
        self::$statement = self::$connection->prepare($query);
        #Ejecuta la consulta con los valores mandados
        self::$statement->execute($values);
        self::desconnect();
        #recorre los datos a través de fetchAll todos de golpe y retorna todos
        return self::$statement->fetchAll();
    }

    public static function getLastRowId(){
        #Obtiene el ultimo id de la fila insertada
        return self::$id;
    }

    public static function getException(){
        #Para consultar si existe un error al ejecutar un metodo de conexion a base
        if(self::$error[0] == "00000"){
            print_r(self::$error);
            return false;
        }else{
            print_r(self::$error);
            return self::$error[1];
        }
    }
}
?>