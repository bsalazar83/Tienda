<?php 
require_once ("../../modelo/MdlProductos/producto.php");

$producto = new Producto();
$crud = new CrudProducto();
$productos = $crud->productos();
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../js/alertas.js" defer></script>
</head>
<body>
    <div class="container">
        <div class="row vh-100 justify-content-center align-items-center">
            <div class="col-md-12 p-5">
            <a href="crearProducto.php"><button class="btn btn-primary m-4">Crear Producto</button></a>
            <a href="../index.php"><button class="btn btn-primary m-4">Home</button></a>
                <table class="table table-bordered m-2">
                    <thead>
                        <tr>
                            <th class="col-md-2">Codigo</th>
                            <th class="col-md-4">Nombre</th>
                            <th class="col-md-2">Precio</th>
                            <th class="col-md-1">Estado</th>
                            <th class="col-md-1">Cantidad</th>
                            <th class="col-md-2" colspan="2">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php while ($producto = mysqli_fetch_assoc($productos)) { ?>
                        <tr>
                            <td class="col-md-2"># <?php echo ($producto['codigo'])?></td>
                            <td class="col-md-4"><?php echo ($producto['nombre'])?></td>
                            <td class="col-md-2">$<?php echo ($producto['precio'])?></td>
                            <td class="col-md-1"><?php echo(($producto['cantidad'] == 0) ? 'Agotado' : 'En Stock')?></td>
                            <td class="col-md-1"><?php echo ($producto['cantidad'])?></td>
                            <td class="col-md-1">
                                <form action="editarProducto.php" method="post">
                                    <input type= "hidden" name= "id" value= "<?php echo($producto['id'])?>"> 
                                    <a href="editarProducto.php?">
                                        <button class="btn btn-warning btn-sm" role="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Editar">
                                        <i>
                                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M160-400v-80h280v80H160Zm0-160v-80h440v80H160Zm0-160v-80h440v80H160Zm360 560v-123l221-220q9-9 20-13t22-4q12 0 23 4.5t20 13.5l37 37q8 9 12.5 20t4.5 22q0 11-4 22.5T863-380L643-160H520Zm300-263-37-37 37 37ZM580-220h38l121-122-18-19-19-18-122 121v38Zm141-141-19-18 37 37-18-19Z"/></svg>
                                        </i>
                                        </button>
                                    </a>
                                    <input type= "hidden" name= "codigo" value= "<?php echo($producto['codigo'])?>">
                                    <input type="hidden" name="editar">
                                </form>
                            </td>
                            <td class="col-md-1">
                                <form action="../../controlador/CtrProductos/CtrProducto.php" method="post">
                                    <input type= "hidden" name= "id" value= "<?php echo($producto['id'])?>">
                                    <button class="btn btn-danger btn-sm eliminar" data-bs-toggle="tooltip" data-bs-placement="top" title="Eliminar">
                                        <i>
                                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520ZM360-280h80v-360h-80v360Zm160 0h80v-360h-80v360ZM280-720v520-520Z"/></svg>
                                        </i>
                                    </button>
                                    <input type= "hidden" name= "codigo" value= "<?php echo($producto['codigo'])?>">
                                    <input type="hidden" name="eliminar">
                                </form>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>


