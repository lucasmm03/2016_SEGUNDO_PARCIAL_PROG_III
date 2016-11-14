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
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
            $consulta = $objetoAccesoDato->RetornarConsulta("
                SELECT *
                FROM usuarios
                WHERE id=:id");
            $consulta->bindValue(":id", $this->id, PDO::PARAM_INT);
            $consulta->execute();
            $fila = $consulta->fetch(PDO::FETCH_ASSOC);
            $this->$nombre = $fila["nombre"];
            $this->$email = $fila["email"];
            $this->$password = $fila["password"];
            $this->$perfil = $fila["perfil"];
            $this->$foto = $fila["foto"];
        }
    }
    
    public static function TraerUsuarioLogueado($obj) {
		//IMPLEMENTAR...
    }

    public static function TraerUnUsuarioPorId($id) {
		//IMPLEMENTAR...
    }

    public static function Agregar($obj) {
		//IMPLEMENTAR...
    }

    public function ActualizarFoto() {
		//IMPLEMENTAR...
    }

    public static function Modificar($obj) {
		//IMPLEMENTAR...
    }

    public static function TraerTodosLosUsuarios() {
		//IMPLEMENTAR...
    }

    public static function TraerTodosLosPerfiles() {
		//IMPLEMENTAR...
    }

    public static function Borrar($id) {
		//IMPLEMENTAR...
    }
}