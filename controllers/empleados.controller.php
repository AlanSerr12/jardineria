<?php
//TODO: Clase Empleados es un controlador
require_once('../models/empleados.model.php');
//TODO: Manejo de errores
error_reporting(0);
//TODO: Importación de Clase Empleados
$Empleados = new EmpleadoModel;
switch ($_GET["op"]) {
    case 'todos':
        $datos = array();
        $datos = $Empleados->todos();
        while ($fila = mysqli_fetch_assoc($datos)) {
            $todos[] = $fila;
        }
        echo json_encode($todos);
        break;

    case 'uno':
        $codigo_empleado  = $_POST['codigo_empleado '];
        $datos = array();
        $datos = $codigo_empleado ->uno($codigo_empleado );
        $respuesta = mysqli_fetch_assoc($datos);
        echo json_encode($respuesta);
        break;

    case 'insertar':
        $nombre = $_POST['nombre'];
        $apellido1 = $_POST['apellido1'];
        $apellido2 = $_POST['apellido2'];
        $extension = $_POST['extension'];
        $email = $_POST['email'];
        $codigo_oficina  = $_POST['codigo_oficina '];
        $codigo_jefe  = $_POST['codigo_jefe '];
        $puesto = $_POST['puesto'];
        $datos = array();
        $datos = $Empleados->Insertar($nombre, $apellido1, $apellido2, $extension, $email, $codigo_oficina, $codigo_jefe, $puesto, $region, $pais);
        echo json_encode($datos);
        break;
        
    case 'actualizar':
        $codigo_empleado  = $_POST['codigo_empleado '];     
        $nombre = $_POST['nombre'];
        $apellido1 = $_POST['apellido1'];
        $apellido2 = $_POST['apellido2'];
        $extension = $_POST['extension'];
        $email = $_POST['email'];
        $codigo_oficina  = $_POST['codigo_oficina '];
        $codigo_jefe  = $_POST['codigo_jefe '];
        $puesto = $_POST['puesto'];
        $datos = array();
        $datos = $Empleados->Actualizar( $codigo_empleado,$nombre, $apellido1, $apellido2, $extension, $email, $codigo_oficina, $codigo_jefe, $puesto, $region, $pais);
        break;

    case 'eliminar':
        $codigo_empleado  = $_POST['codigo_empleado '];    
        $datos = array();
        $datos = $Empleados->Eliminar($codigo_empleado);
        echo json_encode($datos);
        break;
}