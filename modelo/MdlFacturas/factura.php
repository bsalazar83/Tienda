<?php
require_once('../../controlador/BD/conexion.php');

class Factura {
    private $id;
    private $numero_factura;
    private $id_cliente;
    private $id_producto;
    private $cantidad_producto;
    private $subtotal_producto;
    private $id_impuesto;
    private $total_producto;
    private $fecha_creacion;


    function __construct(){
        $this->Factura = array();
    }

    public function getId() {
        return $this->id;
    }

    public function getNumeroFactura() {
        return $this->numero_factura;
    }

    public function getIdCliente() {
        return $this->id_cliente;
    }

    public function getIdProducto() {
        return $this->id_producto;
    }

    public function getCantidadProducto() {
        return $this->cantidad_producto;
    }

    public function getSubtotalProducto() {
        return $this->subtotal_producto;
    }

    public function getIdImpuesto() {
        return $this->id_impuesto;
    }

    public function getTotalProducto() {
        return $this->total_producto;
    }

    public function getFechaCreacion() {
        return $this->fecha_creacion;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setNumeroFactura($numero_factura) {
        $this->numero_factura = $numero_factura;
    }

    public function setIdCliente($id_cliente) {
        $this->id_cliente = $id_cliente;
    }

    public function setIdProducto($id_producto) {
        $this->id_producto = $id_producto;
    }

    public function setCantidadProducto($cantidad_producto) {
        $this->cantidad_producto = $cantidad_producto;
    }

    public function setSubtotalProducto($subtotal_producto) {
        $this->subtotal_producto = $subtotal_producto;
    }

    public function setIdImpuesto($id_impuesto) {
        $this->id_impuesto = $id_impuesto;
    }

    public function setTotalProducto($total_producto) {
        $this->total_producto = $total_producto;
    }

    public function setFechaCreacion($fecha_creacion) {
        $this->fecha_creacion = $fecha_creacion;
    }
}


class CrudFactura{

    public function facturas(){
        $conexion = devolverConexion();
        $sql = "SELECT DISTINCT(f.numero_factura),c.nombre FROM facturas f, clientes c where f.id_cliente = c.id;";
        $facturas = mysqli_query($conexion, $sql);
        mysqli_close($conexion);
        return $facturas;
    }

    public function factura($numero_factura) {
    $conexion = devolverConexion();
    $sql = "SELECT * FROM facturas WHERE numero_factura = '$numero_factura'";
    $resultado = mysqli_query($conexion, $sql);
    $facturas = [];

    while ($factura = mysqli_fetch_assoc($resultado)) {
        $facturaObj = new Factura();
        $facturaObj->setId($factura['id']);
        $facturaObj->setNumeroFactura($factura['numero_factura']);
        $facturaObj->setIdCliente($factura['id_cliente']);
        $facturaObj->setIdProducto($factura['id_producto']);
        $facturaObj->setCantidadProducto($factura['cantidad']);
        $facturaObj->setSubtotalProducto($factura['subtotal']);
        $facturaObj->setIdImpuesto($factura['id_impuesto']);
        $facturaObj->setTotalProducto($factura['total']);
        $facturaObj->setFechaCreacion($factura['fecha_creacion']);
        $facturas[] = $facturaObj;
    }
    mysqli_close($conexion);
    return $facturas;
}


    public function guardar($numero_factura,$id_cliente,$id_producto,$cantidad_producto,$subtotal_producto,$id_impuesto,$total_producto){
        $conexion = devolverConexion();
        $sql = "INSERT INTO facturas (numero_factura,id_cliente,id_producto,cantidad,subtotal,id_impuesto,total,fecha_creacion) VALUES ('$numero_factura',$id_cliente,$id_producto,$cantidad_producto,$subtotal_producto,$id_impuesto,$total_producto,now())";
        $resultado = mysqli_query($conexion, $sql);
        $sql2 = "UPDATE productos SET cantidad = (cantidad - $cantidad_producto) WHERE id = $id_producto";
        $resultado2 = mysqli_query($conexion, $sql2);
        mysqli_close($conexion);
        return $resultado;
    }

    public function numeroFactura(){
        $conexion = devolverConexion();
        $sql = 'SELECT numero_factura FROM facturas ORDER BY id DESC LIMIT 1';
        $resultado = mysqli_query($conexion, $sql);
        
        if ($fila = mysqli_fetch_assoc($resultado)) {
            $numeroFactura = intval($fila['numero_factura']);
            $nuevoNumeroFactura = $numeroFactura + 1;
        } else {
            $nuevoNumeroFactura = 000001;
        }
        mysqli_close($conexion);
        return str_pad($nuevoNumeroFactura, 6, '0', STR_PAD_LEFT);
    }

}
?>