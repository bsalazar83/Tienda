<?php
include_once('../../modelo/MdlProductos/producto.php');

$crud = new CrudProducto();

    if(isset($_POST['guardar'])){
        $nombre_producto = $_POST['nombreproducto'];
        $cantidad = $_POST['cantidad'];
        $codigo = $_POST['codigo'];
        $precio = $_POST['precio'];
        $id_impuesto = $_POST['id_impuesto'];
        $estado = 'Y';

        $resultado = $crud->guardar($nombre_producto,$cantidad,$codigo,$precio,$id_impuesto,$estado);

        if($resultado){
            header('Location: ../../vista/productos/verProducto.php');
            }else{
            echo("error al guardar");
        }
    }

    if (isset($_POST['editar'])) {
        $id = $_POST['id'];
        $nombre_producto = $_POST['nombreproducto'];
        $cantidad = $_POST['cantidad'];
        $codigo = $_POST['codigo'];
        $precio = $_POST['precio'];
        $id_impuesto = $_POST['id_impuesto'];

        $producto = new Producto();
        $producto->setId($id);
        $producto->setNombreProducto($nombre_producto);
        $producto->setCantidad($cantidad);
        $producto->setCodigo($codigo);
        $producto->setPrecio($precio);
        $producto->setIdImpuesto($id_impuesto);

        $resultado = $crud->editar($producto);

        if ($resultado) {
            header('Location: ../../vista/productos/verProducto.php');
            } else {
            echo ("error al editar");
        }
    }

    if (isset($_POST['eliminar'])) {
        $id = $_POST['id'];
        $codigo = $_POST['codigo'];
        $resultado = $crud->eliminar($id,$codigo);
        
        if ($resultado) {
            header('Location: ../../vista/productos/verProducto.php');
            } else {
            echo ("error al eliminar");
        }   
    }
?>