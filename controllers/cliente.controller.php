<?php
//TODO: Clase Clientes es un controlador
require_once('../models/cliente.model.php');
//TODO: Manejo de errores
error_reporting(0);
//TODO: Importación de Clase Clientes
$Clientes = new cliente;
switch ($_GET["op"]) {
    case 'todos':
        $dato = array();
        $dato = $Clientes->todos();
        while ($fila = mysqli_fetch_assoc($dato)) {
            $todos[] = $fila;
        }
        echo json_encode($todos);
        break;

    case 'uno':
        $codigo_cliente = $_POST['codigo_cliente'];
        $dato = array();
        $dato = $codigo_cliente->uno($codigo_cliente);
        $respuesta = mysqli_fetch_assoc($dato);
        echo json_encode($respuesta);
        break;

    case 'insertar':
        $nombre_cliente = $_POST['nombre_cliente'];
        $nombre_contacto = $_POST['nombre_contacto'];
        $apellido_contacto = $_POST['apellido_contacto'];
        $telefono = $_POST['telefono'];
        $fax = $_POST['fax'];
        $linea_direccion1 = $_POST['linea_direccion1'];
        $linea_direccion2 = $_POST['linea_direccion2'];
        $ciudad = $_POST['ciudad'];
        $region = $_POST['region'];
        $pais = $_POST['pais'];
        $codigo_postal = $_POST['codigo_postal'];
        $codigo_empleado_rep_ventas  = $_POST['codigo_empleado_rep_ventas '];
        $limite_credito = $_POST['limite_credito'];
        $dato = array();
        $dato = $Clientes->Insertar($nombre_cliente, $nombre_contacto, $apellido_contacto, $telefono, $fax, $linea_direccion1, $linea_direccion2, $ciudad, $region, $pais, $codigo_postal, $codigo_empleado_rep_venta, $limite_credito);
        echo json_encode($dato);
        break;
        
    case 'actualizar':
        $codigo_cliente = $_POST['codigo_cliente'];
        $nombre_cliente = $_POST['nombre_cliente'];
        $nombre_contacto = $_POST['nombre_contacto'];
        $apellido_contacto = $_POST['apellido_contacto'];
        $telefono = $_POST['telefono'];
        $fax = $_POST['fax'];
        $linea_direccion1 = $_POST['linea_direccion1'];
        $linea_direccion2 = $_POST['linea_direccion2'];
        $ciudad = $_POST['ciudad'];
        $region = $_POST['region'];
        $pais = $_POST['pais'];
        $codigo_postal = $_POST['codigo_postal'];
        $codigo_empleado_rep_ventas  = $_POST['codigo_empleado_rep_ventas '];
        $limite_credito = $_POST['limite_credito'];
        $dato = array();
        $dato = $Clientes->Actualizar($codigo_cliente,$nombre_cliente, $nombre_contacto, $apellido_contacto, $telefono, $fax, $linea_direccion1, $linea_direccion2, $ciudad, $region, $pais, $codigo_postal, $codigo_empleado_rep_venta, $limite_credito);
        echo json_encode($dato);
        break;

    case 'eliminar':
        $codigo_cliente = $_POST['codigo_cliente'];
        $dato = array();
        $dato = $Clientes->Eliminar($codigo_cliente);
        echo json_encode($dato);
        break;
}