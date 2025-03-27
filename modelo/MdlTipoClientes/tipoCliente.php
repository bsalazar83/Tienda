<?php
require_once('../../controlador/BD/conexion.php');

class TipoCliente {
    private $id;
    private $nombre_tipo_cliente;
    private $fecha_creado;

    function __construct(){
        $this->TipoCliente = array();
    }

    public function getId() {
        return $id;
    }

    public function getNombreTipoCliente() {
        return $nombre_tipo_cliente;
    }

    public function getFechaCreacion() {
        return $fecha_creacion;
    }

    public function setIdTipoCliente($id) {
        $this->id = $id;
    }

    public function setNombreTipoCliente($nombre_tipo_cliente) {
        $this->nombre_tipo_cliente = $nombre_tipo_cliente;
    }

    public function setFechaCreacion($fecha_creacion) {
        $this->fecha_creacion = $fecha_creacion;
    }
}

class CrudTipoCliente{

    public function tipoClientes(){
        $conexion = devolverConexion();
        $sql = 'SELECT * FROM tipo_clientes';
        $tipoClientes = mysqli_query($conexion, $sql);
        mysqli_close($conexion);
        return $tipoClientes;
    }
}
?>