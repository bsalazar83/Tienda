<?php 
require_once ("../../modelo/MdlImpuestos/impuesto.php");

$impuesto = new Impuesto();
$crud = new CrudImpuesto();
$impuestos = $crud->impuestos();
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
    <script src="../js/alertasProducto.js" defer></script>

</head>
<body>
    <div class="container">
        <div class="row vh-100 justify-content-center align-items-center">
            <div class="col-md-8 p-5">
                <form class="row g-3" action="../../controlador/CtrProductos/CtrProducto.php" method="post">
                    <div class="col-md-12">
                      <label for="nombreproducto" class="form-label">Nombre del Producto</label>
                      <input type="text" class="form-control" name="nombreproducto" >
                    </div>
                    <div class="col-md-4">
                      <label for="cantidad" class="form-label">Cantidad del Producto</label>
                      <input type="number" class="form-control" name="cantidad" value=1>
                    </div>
                    <div class="col-4">
                      <label for="precio" class="form-label">Precio del Producto</label>
                      <input type="number" class="form-control" name="precio" placeholder="$9990">
                    </div>
                    <div class="col-4">
                      <label for="codigo" class="form-label">Codigo de Producto</label>
                      <input type="text" class="form-control" name="codigo" placeholder="9999">
                    </div>
                    <div class="col-md-8">
                      <label for="impuesto" class="form-label">Impuesto</label>
                      <select name="id_impuesto" class="form-select">
                        <option value="0">seleccione el impuesto aplicado</option>
                        <?php while ($impuesto = mysqli_fetch_assoc($impuestos)) { ?>
                        <option value="<?php echo($impuesto['id'])?>"><?php echo($impuesto['nombre'])?></option>
                        <?php } ?>
                      </select>
                    </div>
                    <input type="hidden" name="guardar">
                    <div class="col-6">
                      <button type="submit" class="btn btn-primary guardar m-2">Crear Producto</button>
                      <a class="btn btn-danger m-2" href="../index.php" role="button">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>