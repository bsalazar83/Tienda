<?php
require_once('../../controlador/BD/conexion.php');

class Producto {
    private $id;
    private $nombre_producto;
    private $cantidad;
    private $codigo;
    private $precio;
    private $id_impuesto;
    private $estado;
    private $fecha_creacion;
    private $fecha_actualizacion;


    function __construct(){
        $this->Producto = array();
    }

    public function getId() {
        return $this->id;
    }

    public function getNombreProducto() {
        return $this->nombre_producto;
    }

    public function getCantidad() {
        return $this->cantidad;
    }

    public function getCodigo() {
        return $this->codigo;
    }

    public function getPrecio() {
        return $this->precio;
    }

    public function getIdImpuesto() {
        return $this->id_impuesto;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function getFechaCreacion() {
        return $this->fecha_creacion;
    }

    public function getFechaActualizacion() {
        return $this->fecha_actualizacion;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setNombreProducto($nombre_producto) {
        $this->nombre_producto = $nombre_producto;
    }

    public function setCantidad($cantidad) {
        $this->cantidad = $cantidad;
    }

    public function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    public function setPrecio($precio) {
        $this->precio = $precio;
    }

    public function setIdImpuesto($id_impuesto) {
        $this->id_impuesto = $id_impuesto;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }

    public function setFechaCreacion($fecha_creacion) {
        $this->fecha_creacion = $fecha_creacion;
    }

    public function setFechaActualizacion($fecha_actualizacion) {
        $this->fecha_actualizacion = $fecha_actualizacion;
    }
}

class CrudProducto{
    public function producto($id){
        $conexion = devolverConexion();
        $sql = "SELECT * FROM productos WHERE id =" . $id;
        $productos = mysqli_query($conexion, $sql);
        $producto = mysqli_fetch_assoc($productos);

        $producto1 = new Producto();
        $producto1 ->setId($producto['id']);
        $producto1 ->setNombreProducto($producto['nombre']);
        $producto1 ->setCantidad($producto['cantidad']);
        $producto1 ->setCodigo($producto['codigo']);
        $producto1 ->setPrecio($producto['precio']);
        $producto1 ->setIdImpuesto($producto['id_impuesto']);
        $producto1 ->setEstado($producto['estado']);
        $producto1 ->setFechaCreacion($producto['fecha_creacion']);
        $producto1 ->setFechaActualizacion($producto['fecha_actualizacion']);

        mysqli_close($conexion);
        return $producto1;
    }

    public function productos(){
        $conexion = devolverConexion();
        $sql = 'SELECT * FROM productos';
        $productos = mysqli_query($conexion, $sql);
        mysqli_close($conexion);
        return $productos;
    }

    public function guardar($nombre_producto,$cantidad,$codigo,$precio,$id_impuesto,$estado){
        $conexion = devolverConexion();
        $sql = "INSERT INTO productos (nombre,cantidad,codigo,precio,id_impuesto,estado,fecha_creacion) VALUES ('$nombre_producto','$cantidad','$codigo','$precio','$id_impuesto','$estado',now())";
        $resultado = mysqli_query($conexion, $sql);
        mysqli_close($conexion);
        return $resultado;
    }

    public function editar($producto){
        $conexion = devolverConexion(); 
        $sql = "UPDATE productos SET nombre = '".$producto->getNombreProducto()."', cantidad = ".$producto->getCantidad().", codigo = '".$producto->getCodigo()."', precio = ".$producto->getPrecio().", id_impuesto = ".$producto->getIdImpuesto()." WHERE id = ".$producto->getId();
        $resultado = mysqli_query($conexion, $sql);
        mysqli_close($conexion);
        return $resultado;
        }  

    public function eliminar($id,$codigo){
        $conexion = devolverConexion();
        $sql = "DELETE FROM productos WHERE id = $id and codigo = '$codigo'";
        $resultado = mysqli_query($conexion, $sql);
        mysqli_close($conexion);
        return $resultado;
    }

    
}
?>