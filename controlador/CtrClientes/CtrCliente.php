<?php
include_once('../../modelo/MdlClientes/cliente.php');

$crud = new CrudCliente();

    if(isset($_POST['guardar'])){
        $nombre_cliente = $_POST['nombrecliente'];
        $documento = $_POST['documento'];
        $celular = $_POST['celular'];
        $tipo_cliente = $_POST['tipo_cliente'];

        $resultado = $crud->guardar($nombre_cliente,$documento,$celular,$tipo_cliente);

        if($resultado){
            header('Location: ../../vista/ventas/crearVenta.php');
            }else{
            header('Location: ../../vista/clientes/crearClientes.php');
        }
    }
?>