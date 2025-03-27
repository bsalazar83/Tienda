<?php 
include_once ("../../modelo/MdlImpuestos/impuesto.php");
include_once ("../../modelo/MdlProductos/producto.php");

$impuesto = new Impuesto();
$crud = new CrudImpuesto();
$impuestos = $crud->impuestos();

$producto = new Producto();
$crud2 = new CrudProducto();
$productos = $crud2->producto($_POST['id']);
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

</head>
<body>
    <div class="container">
        <div class="row vh-100 justify-content-center align-items-center">
            <div class="col-md-8 p-5">
                <form class="row g-3" action="../../controlador/CtrProductos/CtrProducto.php" method="post">
                    <div class="col-md-12">
                      <label for="nombreproducto" class="form-label">Nombre del Producto</label>
                      <input type="text" class="form-control" name="nombreproducto" value = "<?php echo($productos->getNombreProducto())?>">
                    </div>
                    <div class="col-md-4">
                      <label for="cantidad" class="form-label">Cantidad del Producto</label>
                      <input type="number" class="form-control" name="cantidad" value = "<?php echo($productos->getCantidad())?>">
                    </div>
                    <div class="col-4">
                      <label for="precio" class="form-label">Precio del Producto</label>
                      <input type="number" class="form-control" name="precio" value = "<?php echo($productos->getCodigo())?>">
                    </div>
                    <div class="col-4">
                      <label for="codigo" class="form-label">Codigo de Producto</label>
                      <input type="text" class="form-control" name="codigo" value = "<?php echo($productos->getPrecio())?>">
                    </div>
                    <div class="col-md-8">
                      <label for="impuesto" class="form-label">Impuesto</label>
                      <select name="id_impuesto" class="form-select">
                        <option value = "<?php echo($productos->getIdImpuesto())?>">seleccione el impuesto aplicado</option>
                        <?php while ($impuesto = mysqli_fetch_assoc($impuestos)) { ?>
                        <option value="<?php echo($impuesto['id'])?>"><?php echo($impuesto['nombre'])?></option>
                        <?php } ?>
                      </select>
                    </div>
                    <input type="hidden" name="editar">
                    <input type= "hidden" name= "id" value= "<?php echo($productos->getId())?>">
                    <div class="col-12">
                      <button type="submit" class="btn btn-primary">Crear Producto</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>