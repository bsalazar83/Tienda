
<!-- dashbord general con las opciones para ver productos, crear productos, crear venta, ver facturas -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TIENDA</title>

    <?php include_once('css/css.php')?>
    <link rel="stylesheet" href="css/css.php">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="js/alertasProducto.js" defer></script>

</head>
<body>
<div class="container">
        <!-- <div class="row vh-100 justify-content-center align-items-center"> -->
            <div class="col-md-8 p-5">
<div class = "formulario">
<h1>TIENDA</h1>
    <table class="t">
        <tr>
            <td><a href="productos/crearProducto.php"><button class="btn btn-primary">Crear Productos</button></a></td>
            <td><a href="productos/verProducto.php"><button class="btn btn-primary">Ver Productos</button></a></td>
        </tr>
        <tr>
            <td>
                <form action="ventas/crearVenta.php" method="post">
                    <button class="btn btn-primary venta">Crear Venta</button>
                </form>
            </td>
            <td><a href="ventas/verFacturas.php"><button class="btn btn-primary">Ver Facturas</button></a></td>
        </tr>

        <tr>
            <td><a href="clientes/crearCliente.php"><button class="btn btn-primary">Crear Clientes</button></a></td>
            <!-- <td><a href="productos/verProducto.php"><button class="btn btn-primary">Ver Productos</button></a></td> -->
        </tr>
    </table>
    </div>
    </div>
        <!-- </div> -->
    </div>
</body>
</html>