<?php
//TODO: Clase Productos es un controlador
require_once('../models/productos.models.php');
//TODO: Manejo de reportes
error_reporting(0);
//TODO: Importacion de clase Productos
$Produc = new productosModel;
switch ($_GET['OP']) {
    case 'todos':
        $datos = array();
        $datos = $Produc->todos();
        while ($fila = mysqli_fetch_assoc($datos)) {
            $todos[] = $fila;
        }
        echo json_encode($todos);
        break;

    case 'uno':
        $codigo_producto  = $_POST['codigo_producto '];
        $datos = array();
        $datos = $Produc->uno($codigo_producto );
        $respuesta = mysqli_fetch_assoc($datos);
        echo json_encode($respuesta);
        break;

    case 'insertar':
            $codigo_producto  = $_POST['codigo_producto'];
            $nombre = $_POST['nombre'];
            $gama  = $_POST['gama '];
            $dimensiones = $_POST['dimensiones'];
            $proveedor = $_POST['proveedor'];
            $descripcion = $_POST['descripcion'];
            $cantidad_en_stock = $_POST['cantidad_en_stock'];
            $precio_venta = $_POST['precio_venta'];
            $precio_proveedor = $_POST['precio_proveedor'];
            $datos = array();
            $datos = $Produc->insertar($codigo_producto,$nombre,$gama,$dimensiones,$proveedor,$descripcion, $cantidad_en_stock,$precio_venta,$precio_proveedor);
            echo json_encode($datos);
            break;



    case 'actulizar':
         $codigo_producto  = $_POST['codigo_producto '];
         $nombre = $_POST['nombre'];
         $gama  = $_POST['gama '];
         $dimensiones = $_POST['dimensiones'];
         $proveedor = $_POST['proveedor'];
         $descripcion = $_POST['descripcion'];
         $cantidad_en_stock = $_POST['cantidad_en_stock'];
         $precio_venta = $_POST['precio_venta'];
         $precio_proveedor = $_POST['precio_proveedor'];
         $datos = array();
         $datos = $Produc->actualizar($codigo_producto,$nombre,$gama,$dimensiones,$proveedor,$descripcion, $cantidad_en_stock,$precio_venta,$precio_proveedor);
         echo json_encode($datos);
         break;

    case 'eliminar':
        $codigo_producto  = $_POST['codigo_producto '];
        $datos = array();
        $datos = $Produc->eliminar($codigo_producto);
        echo json_encode($datos);
        break;
}