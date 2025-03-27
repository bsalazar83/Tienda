<?php
require_once('../../controlador/BD/conexion.php');

class Impuesto {
    private $id;
    private $nombre_impuesto;
    private $porcentaje;
    private $fecha_creacion;


    function __construct(){
        $this->Impuesto = array();
    }

    public function getId() {
        return $this->id;
    }

    public function getNombreImpuesto() {
        return $this->nombre_impuesto;
    }

    public function getPorcentaje() {
        return $this->porcentaje;
    }

    public function getFechacreacion() {
        return $this->fecha_creacion;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setNombreImpuesto($nombre_impuesto) {
        $this->nombre_impuesto = $nombre_impuesto;
    }

    public function setPorcentaje($porcentaje) {
        $this->porcentaje = $porcentaje;
    }

    public function setFechacreacion($fecha_creacion) {
        $this->fecha_creacion = $fecha_creacion;
    }
}

class CrudImpuesto{

    public function impuesto($id){
        $conexion = devolverConexion();
        $sql = "SELECT * FROM impuestos WHERE id =" . $id;
        $impuestos = mysqli_query($conexion, $sql);
        $impuesto = mysqli_fetch_assoc($impuestos);

        $impuestos1 = new Impuesto();
        $impuestos1 ->setId($impuesto['id']);
        $impuestos1 ->setNombreImpuesto($impuesto['nombre']);
        $impuestos1 ->setPorcentaje($impuesto['porcentaje']);
        $impuestos1 ->setFechaCreacion($impuesto['fecha_creacion']);

        mysqli_close($conexion);
        return $impuestos1;
    }

    public function impuestos(){
        $conexion = devolverConexion();
        $sql = 'SELECT * FROM impuestos';
        $impuestos = mysqli_query($conexion, $sql);
        mysqli_close($conexion);
        return $impuestos;
    }
}
?>