<?php 
include_once ("../../modelo/MdlProductos/producto.php");
include_once ("../../modelo/MdlClientes/cliente.php");

$producto = new Producto();
$crud = new CrudProducto();
$productos = $crud->productos();

$cliente = new Cliente();
$crud2 = new CrudCliente();
$clientes = $crud2->clientes();

$productosArray = [];

while ($productoA = mysqli_fetch_assoc($productos)) {
    $productosArray[] = $productoA;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crear Producto</title>
    <?php include_once('../css/css.php')?>
    <link rel="stylesheet" href="../css/css.php">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<body>
    <div class="container">
        <div class="row vh-100 justify-content-center align-items-center">
            <div class="col-md-8 p-5">
                <form class="row g-3" action="../../controlador/CtrFacturas/CtrFactura.php" method="post">
                    <div class="col-md-12">
                        <label for="cliente" class="form-label">Cliente que realiza la compra</label>
                        <select name="cliente" class="form-select">
                          <option value="0">seleccione el cliente</option>
                          <?php while ($cliente = mysqli_fetch_assoc($clientes)) { ?>
                          <option value="<?php echo($cliente['id'])?>"><?php echo($cliente['nombre'])?></option>
                          <?php } ?>
                        </select>
                    </div>
                    <div id="productosContainer">
                        <div class="row g-3" id="group-product">
                            <div class="col-md-8 select-product">
                                <label for="productos" class="form-label">Producto a comprar</label>
                                <select name="productos[]" class="form-select" required>
                                    <option value="0">Seleccione el producto</option>
                                </select>
                            </div>
                            <div class="col-md-4 cantidad-product">
                                <label for="cantidad" class="form-label">Cantidad del Producto</label>
                                <input type="number" class="form-control cantidad" name="cantidad[]" value="1" min="1" required>
                            </div>
                        </div>
                        <div class="col-12 mt-4">
                            <button type="button" class="btn btn-primary col-4" id="btnAgregarProducto">Agregar Producto</button>
                            <button type="submit" class="btn btn-primary col-4">Realizar Compra</button>
                            <a class="btn btn-danger col-3" href="../index.php" role="button">Cancelar compra</a>
                        </div>
                    </div>
                    <input type="hidden" name="comprar">
                </form>
                <script>
                    const productos = <?= json_encode($productosArray) ?>;
                </script>
                <script src="../js/ventas.js"></script>
            </div>
        </div>
    </div>
</body>
</html>