<?php
class AccesoDatos
{
		//IMPLEMENTAR...OK
    private static $objetoAccesoDatos;
    private $objetoPDO;

    private function __construct()
    {
		//IMPLEMENTAR...OK
        try
        { 
            $this->objetoPDO = new PDO('mysql:host=localhost;dbname=id197356_login_pdo;charset=utf8', 'id197356_lucasmm03', 'programacion3', array(PDO::ATTR_EMULATE_PREPARES => false,PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
            $this->objetoPDO->exec("SET CHARACTER SET utf8");
        } 
        catch (PDOException $e)
        { 
            print "Error!: " . $e->getMessage(); 
            die();
        }
    }
 
    public function RetornarConsulta($sql)
    { 
		//IMPLEMENTAR...OK
        return $this->objetoPDO->prepare($sql); 
    }
    
     public function RetornarUltimoIdInsertado()
    { 
		//IMPLEMENTAR...OK
        return $this->objetoPDO->lastInsertId(); 
    }
 
    public static function dameUnObjetoAcceso()
    { 
		//IMPLEMENTAR...OK
        if (!isset(self::$objetoAccesoDatos))
        {          
            self::$objetoAccesoDatos = new AccesoDatos(); 
        } 
        return self::$objetoAccesoDatos; 
    }
 
    public function __clone()
    { 
 		//IMPLEMENTAR...OK
        trigger_error('La clonación de este objeto no está permitida', E_USER_ERROR); 
    }
}