<?php 
include_once('../../modelo/MdlFacturas/factura.php');
include_once('../../modelo/MdlClientes/cliente.php');
include_once('../../modelo/MdlProductos/producto.php');

$factura = new Factura();
$crud = new CrudFactura();
$crud2 = new CrudCliente();
$crud3 = new CrudProducto();
$facturas = $crud->factura($_POST['numero_factura']);
$cliente_id = $facturas[0]->getIdCliente();
$cliente = $crud2->cliente($cliente_id);
$total = 0;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ver Productos</title>
    <?php include_once('../css/css.php')?>
    <link rel="stylesheet" href="../css/css.php">
</head>
<body>
    <div class="container">
        <div class="row vh-100 justify-content-center align-items-center">
            <div class="col-md-12 p-5">
            <a href="verFacturas.php"><button class="btn btn-primary m-4">Volver</button></a>
                <table class="table table-bordered ">
                    <thead>
                        <tr>
                            <th class="col-md-2">Numero de Factura</th>
                            <th class="col-md-4">Cliente</th>
                            <th class="col-md-4">Documento cliente</th>
                            <th class="col-md-2" >Tipo de cliente</th>
                            <th class="col-md-2" >Celular</th>
                        </tr>
                        <tr>
                            <td class="col-md-2"># <?php echo ($_POST['numero_factura'])?></td>
                            <td class="col-md-4"><?php echo ($cliente->getNombreCliente())?></td>
                            <td class="col-md-4"><?php echo ($cliente->getDocumentoCliente())?></td>
                            <td class="col-md-2" ><?php echo ($cliente->getIdTipoCliente() == 1 ? 'Empresa' : 'Persona')?></td>
                            <td class="col-md-2" ><?php echo ($cliente->getCelularCliente())?></td>
                        </tr>
                        <tr>
                            <th class="col-md-4">Nombre Producto</th>
                            <th class="col-md-2" >Cantidad</th>
                            <th class="col-md-2">Precio</th>
                            <th class="col-md-2" colspan="2">SubTotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($facturas as $factura) { 
                            $subtotal1 = $factura->getTotalProducto();
                            $producto = $crud3->producto($factura->getIdProducto());
                            ?>
                            <tr>
                                <td class="col-md-2"> <?php echo ($producto->getNombreProducto())?></td>
                                <td class="col-md-2"> <?php echo ($factura->getCantidadProducto())?></td>
                                <td class="col-md-2"> <?php echo ($factura->getSubtotalProducto())?></td>
                                <td class="col-md-2" colspan="2"> <?php echo ($factura->getTotalProducto())?></td>
                            </tr>
                        <?php 
                        $total += $subtotal1;} ?>
                        <tr>
                            <td colspan="5">Total de la compra  =  <?php echo ($total)?></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            
        </div>
    </div>
</body>
</html>


