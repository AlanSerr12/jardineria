<?php
//TODO: Clase detalles pedido es un controlador
require_once('../models/detalle_pedido.model.php');
//TODO: Manejo de errores
error_reporting(0);
//TODO: Importación de Clase detalle_pedido
$detallespedido = new detalle_pedido;
switch ($_GET["op"]) {
    case 'todos':
        $datos = array();
        $datos = $detallespedido->todos();
        while ($fila = mysqli_fetch_assoc($datos)) {
            $todos[] = $fila;
        }
        echo json_encode($todos);
        break;

    case 'insertar':
        $codigo_pedido  = $_POST['nombre_cliente'];
        $codigo_producto  = $_POST['nombre_contacto'];
        $cantidad = $_POST['apellido_contacto'];
        $precio_unidad = $_POST['telefono'];
        $numero_linea = $_POST['fax'];
        $datos = array();
        $datos = $detallespedido->Insertar($codigo_pedido, $codigo_producto, $cantidad, $precio_unidad, $numero_linea);
        echo json_encode($datos);
        break;

    case 'actualizar':
        $codigo_pedido  = $_POST['nombre_cliente'];
        $codigo_producto  = $_POST['nombre_contacto'];
        $cantidad = $_POST['apellido_contacto'];
        $precio_unidad = $_POST['telefono'];
        $numero_linea = $_POST['fax'];
        $datos = array();
        $datos = $detallespedido->Actualizar($codigo_pedido, $codigo_producto, $cantidad, $precio_unidad, $numero_linea);
        echo json_encode($datos);
        break;

    case 'eliminar':
        $codigo_pedido  = $_POST['nombre_cliente'];
        $codigo_producto  = $_POST['nombre_contacto'];
        $datos = array();
        $datos = $detallespedido->Eliminar($$codigo_pedido, $codigo_producto);
        echo json_encode($datos);
        break;
}