<?php 
require_once ("../../modelo/MdlTipoClientes/tipoCliente.php");

$tipoCliente = new TipoCliente();
$crud = new CrudTipoCliente();
$tipoClientes = $crud->tipoClientes();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crear Cliente</title>
    <?php include_once('../css/css.php')?>
    <link rel="stylesheet" href="../css/css.php">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../js/alertasCliente.js" defer></script>

</head>
<body>
    <div class="container">
        <div class="row vh-100 justify-content-center align-items-center">
            <div class="col-md-8 p-5">
                <form class="row g-3" action="../../controlador/CtrClientes/CtrCliente.php" method="post">
                    <div class="col-md-12">
                      <label for="nombrecliente" class="form-label">Nombre o razon social del cliente</label>
                      <input type="text" class="form-control" name="nombrecliente" >
                    </div>
                    <div class="col-md-6">
                      <label for="documento" class="form-label">Numero de documento o NIT</label>
                      <input type="number" class="form-control" name="documento">
                    </div>
                    <div class="col-6">
                      <label for="celular" class="form-label">Celular</label>
                      <input type="number" class="form-control" name="celular">
                    </div>
                    <div class="col-md-12">
                      <label for="tipocliente" class="form-label">Tipo de cliente</label>
                      <select name="tipo_cliente" class="form-select">
                        <option value="0">seleccione el tipo de cliente</option>
                        <?php while ($tipoCliente = mysqli_fetch_assoc($tipoClientes)) { ?>
                        <option value="<?php echo($tipoCliente['id'])?>"><?php echo($tipoCliente['nombre_tipo_cliente'])?></option>
                        <?php } ?>
                      </select>
                    </div>
                    <input type="hidden" name="guardar">
                    <div class="col-12">
                      <button type="submit" class="btn btn-primary guardar m-2">Crear Cliente</button>
                      <a class="btn btn-danger m-2" href="../index.php" role="button">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>