<?php
include_once('../../modelo/MdlProductos/producto.php');
include_once('../../modelo/MdlFacturas/factura.php');

$crud1 = new CrudProducto();
$crud2 = new CrudFactura();

if(isset($_POST['comprar'])){
    $numero_factura = $crud2->numeroFactura();
    $id_cliente = $_POST['cliente'];
    $productos = $_POST['productos'];
    $cantidades = $_POST['cantidad'];

    if (count($productos) === count($cantidades)) {
    for ($i = 0; $i < count($productos); $i++) {
        $subtotal = 0;
        $id = $productos[$i];
        $cantidad = $cantidades[$i];

        if ($id != 0) {
            $producto = $crud1->producto($id);
            $precio = $producto->getPrecio();
            $impuesto = $producto->getIdImpuesto();

            $subtotal = $precio * $cantidad;
            $total = $subtotal * 0.19;
            $total = $subtotal + $total
            $resultado = $crud2->guardar($numero_factura,$id_cliente,$producto->getId(),$cantidad,$subtotal,$impuesto,$total);
        }
    }
    if($resultado){
            header('Location: ../../vista/index.php');
            }else{
                echo "Error: no se proceso la informacion.";
        }
    } else {
        echo "Error: Los productos y cantidades no coinciden.";
    }

}

?>