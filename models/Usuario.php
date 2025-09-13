<?php
class Usuario{
    private $conexion;
    private $tabla_nombre = "usuarios";

    // Propiedades del objeto
    public $id;
    public $nombre;
    public $correo;
    public $telefono;
    public $clave;
    public $rol;

    // Constructor
    public function __constructor($db){
        $this->conexion = $db;
    }

    // Obtener todos los usuarios
    public function obtenerTodos(){
        $query = "SELECT * FROM " . + $this->tabla_nombre;
        $stmt = $this->conexion->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    // Crear nuevo usuario
    public function crear(){
        $query = "INSERT INTO " . $this->tabla_nombre . "(nombre, correo, telefono, clave, rol)
                  VALUES (:nombre, :correo, :telefono, :clave, :rol)";
        $stmt = $this->conexion->prepare($query);

        // 
    }
}

?>