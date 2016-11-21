<?php

class Usuario {

    public $id;
    public $nombre;
    public $email;
    public $password;
    public $perfil;
    public $foto;
//--CONSTRUCTOR
    public function __construct($id = NULL) {
        if ($id !== NULL) {
		//IMPLEMENTAR...OK
            $this->id = $id;
        }
    }
    
    public static function TraerUsuarioLogueado($obj) {
		//IMPLEMENTAR...OK

        return json_decode($obj);

    }

    public static function TraerUnUsuarioPorId($id) {
		//IMPLEMENTAR...OK
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
        $consulta = $objetoAccesoDato->RetornarConsulta("SELECT * FROM usuarios WHERE id=:id");

        $consulta->execute(array(":id" => $id));
    
        $usuario = $consulta->fetchObject('Usuario');

        return $usuario;
    }

    public static function Agregar($obj) {
		//IMPLEMENTAR...OK
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
        
        $consulta =$objetoAccesoDato->RetornarConsulta("INSERT INTO usuarios (nombre, email, password, perfil, foto)"
                                                    ."VALUES(:nombre, :email, :password, :perfil, :foto)");
        
        $consulta->bindValue(':nombre', $obj->nombre, PDO::PARAM_INT);
        $consulta->bindValue(':email', $obj->email, PDO::PARAM_STR);
        $consulta->bindValue(':password', $obj->password, PDO::PARAM_STR);
        $consulta->bindValue(':perfil', $obj->perfil, PDO::PARAM_STR);
        $consulta->bindValue(':foto', $obj->foto, PDO::PARAM_STR);

        return $consulta->execute();   
    }

    public function ActualizarFoto() {
		//IMPLEMENTAR...OK
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
        
        $consulta =$objetoAccesoDato->RetornarConsulta("UPDATE usuarios SET foto = :foto WHERE id = :id");
        
        $consulta->bindValue(':id', $this->id, PDO::PARAM_INT);
        $consulta->bindValue(':foto', $this->foto, PDO::PARAM_STR);

        return $consulta->execute();
    }

    public static function Modificar($obj) {
		//IMPLEMENTAR...OK
        try
        {
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
        
            $consulta =$objetoAccesoDato->RetornarConsulta("UPDATE usuarios SET nombre = :nombre, email = :email, 
                                                            password = :password, perfil = :perfil,
                                                            foto = :foto WHERE id = :id");
            
            $consulta->bindValue(':id', $obj->id, PDO::PARAM_INT);
            $consulta->bindValue(':nombre', $obj->nombre, PDO::PARAM_STR);
            $consulta->bindValue(':email', $obj->email, PDO::PARAM_STR);
            $consulta->bindValue(':password', $obj->password, PDO::PARAM_STR);
            $consulta->bindValue(':perfil', $obj->perfil, PDO::PARAM_STR);
            $consulta->bindValue(':foto', $obj->foto, PDO::PARAM_STR);

            $consulta->execute();
        }
        catch (Exception $e)
        {
            return false;
        }
        return true;
    }

    public static function TraerTodosLosUsuarios() {
		//IMPLEMENTAR...OK
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
        $consulta = $objetoAccesoDato->RetornarConsulta("SELECT * FROM usuarios");

        $consulta->execute();
    
        $usuariosArray = $consulta->fetchAll();

        return $usuariosArray;
    }

    public static function TraerTodosLosPerfiles() {
		//IMPLEMENTAR...OK
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
        $consulta = $objetoAccesoDato->RetornarConsulta("SELECT perfil FROM usuarios");

        $consulta->execute();
    
        $perfilesArray = $consulta->fetchAll();

        return $perfilesArray;
    }

    public static function Borrar($id) {
		//IMPLEMENTAR...OK
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
        
        $consulta =$objetoAccesoDato->RetornarConsulta("DELETE FROM usuarios WHERE id = :id");
        
        $consulta->bindValue(':id', $id, PDO::PARAM_INT);

        return $consulta->execute();
    }
}