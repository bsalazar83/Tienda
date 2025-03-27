<?php
require_once('../../controlador/BD/conexion.php');

class Cliente {
    private $id_cliente;
    private $nombre_cliente;
    private $documento_cliente;
    private $celular_cliente;
    private $id_tipo_cliente;
    private $fecha_creado_cliente;


    function __construct(){
        $this->Cliente = array();
    }

    public function getIdCliente() {
        return $this->id_cliente;
    }

    public function getNombreCliente() {
        return $this->nombre_cliente;
    }

    public function getDocumentoCliente() {
        return $this->documento_cliente;
    }

    public function getCelularCliente() {
        return $this->celular_cliente;
    }

    public function getIdTipoCliente() {
        return $this->id_tipo_cliente;
    }

    public function getFechaCreadoCliente() {
        return $this->fecha_creado_cliente;
    }

    public function setIdCliente($id_cliente) {
        $this->id_cliente = $id_cliente;
    }

    public function setNombreCliente($nombre_cliente) {
        $this->nombre_cliente = $nombre_cliente;
    }

    public function setDocumentoCliente($documento_cliente) {
        $this->documento_cliente = $documento_cliente;
    }

    public function setCelularCliente($celular_cliente) {
        $this->celular_cliente = $celular_cliente;
    }

    public function setIdTipoCliente($id_tipo_cliente) {
        $this->id_tipo_cliente = $id_tipo_cliente;
    }

    public function setFechaCreadoCliente($fecha_creado_cliente) {
        $this->fecha_creado_cliente = $fecha_creado_cliente;
    }
}


class CrudCliente{

    public function clientes(){
        $conexion = devolverConexion();
        $sql = 'SELECT * FROM clientes';
        $clientes = mysqli_query($conexion, $sql);
        mysqli_close($conexion);
        return $clientes;
    }

    public function guardar($nombre_cliente,$documento_cliente,$celular_cliente,$id_tipo_cliente){
        $conexion = devolverConexion();
        $sql = "INSERT INTO clientes (nombre,numero_documento,celular,tipo_cliente,fecha_creacion) VALUES ('$nombre_cliente','$documento_cliente','$celular_cliente',$id_tipo_cliente,now())";
        $resultado = mysqli_query($conexion, $sql);
        mysqli_close($conexion);
        return $resultado;
    }

    public function cliente($id){
        $conexion = devolverConexion();
        $sql = "SELECT * FROM clientes WHERE id =" . $id;
        $clientes = mysqli_query($conexion, $sql);
        $cliente = mysqli_fetch_assoc($clientes);

        $clientes1 = new Cliente();
        $clientes1 ->setIdCliente($cliente['id']);
        $clientes1 ->setNombreCliente($cliente['nombre']);
        $clientes1 ->setDocumentoCliente($cliente['numero_documento']);
        $clientes1 ->setCelularCliente($cliente['celular']);
        $clientes1 ->setIdTipoCliente($cliente['tipo_cliente']);

        mysqli_close($conexion);
        return $clientes1;
    }
}

?>