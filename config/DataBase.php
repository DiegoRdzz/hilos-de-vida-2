<?php
class DataBase {
    private $host = "localhost";
    private $bd_nombre = "detector_caidas_db";
    private $usuario;
    private $clave;
    public $conexion;

    public function __construct(string $tipoUsuario) {
        switch ($tipoUsuario) {
            case "admin":
                $this->adminBD();
                break;
            case "cliente":
                $this->clienteBD();
                break;
            default:
                //$this->usuario = "root";$this->clave = 1234;
                $this->invitadoBD();
            }       
    }

    public function obtenerConexion() {
        $this->conexion = null;

        try {
            $this->conexion = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->bd_nombre,
                                      $this->usuario, $this->clave);
            $this->conexion->exec("set names utf8");
        } catch (PDOException $exception) {
            die("Error de conexión: " . $exception->getMessage());
        }

        return $this->conexion;
    }


    private function adminBD(){
        $this->usuario = "admin";
        $this->clave = "admin";
    }
    private function clienteBD(){
        $this->usuario = "cliente";
        $this->clave = "cliente";
    }
    private function invitadoBD(){
        $this->usuario = "invitado";
        $this->clave = "invitado";
    }

}
/*
// Prueba de consulta
try {
    $obj = new DataBase("cliente");
    $conexion = $obj->obtenerConexion();
    
    $query = "SELECT * FROM usuarios LIMIT 2"; // Limitar resultados para prueba
    $stmt = $conexion->prepare($query);
    $stmt->execute();
    
    $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo "<pre>";
    print_r($resultados);
    echo "</pre>";
    
} catch (PDOException $e) {
    die("Error en consulta: " . $e->getMessage());
}
*/
?>