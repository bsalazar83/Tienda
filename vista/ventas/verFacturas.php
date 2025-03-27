<?php 
include_once('../../modelo/MdlFacturas/factura.php');

$factura = new Factura();
$crud = new CrudFactura();
$facturas = $crud->facturas();
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
            <a href="../index.php"><button class="btn btn-primary m-4">Home</button></a>
                <table class="table table-bordered m-2">
                    <thead>
                        <tr>
                            <th class="col-md-2">Numero de Factura</th>
                            <th class="col-md-4">Cliente</th>
                            <th class="col-md-2" >Ver Factura</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php while ($factura = mysqli_fetch_assoc($facturas)) { ?>
                        <tr>
                            <td class="col-md-2"># <?php echo ($factura['numero_factura'])?></td>
                            <td class="col-md-4"><?php echo ($factura['nombre'])?></td>
                            <td class="col-md-1">
                                <form action="verFactura.php" method="post">
                                    <input type= "hidden" name= "numero_factura" value= "<?php echo($factura['numero_factura'])?>"> 
                                    <a href="verFactura.php?">
                                        <button class="btn btn-warning btn-sm" role="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Editar">
                                        <i>
                                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M160-400v-80h280v80H160Zm0-160v-80h440v80H160Zm0-160v-80h440v80H160Zm360 560v-123l221-220q9-9 20-13t22-4q12 0 23 4.5t20 13.5l37 37q8 9 12.5 20t4.5 22q0 11-4 22.5T863-380L643-160H520Zm300-263-37-37 37 37ZM580-220h38l121-122-18-19-19-18-122 121v38Zm141-141-19-18 37 37-18-19Z"/></svg>
                                        </i>
                                        </button>
                                    </a>
                                    <input type="hidden" name="editar">
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


