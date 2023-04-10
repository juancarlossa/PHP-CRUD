<?php
// Paso 1: Conectar a la base de datos
$conexion = mysqli_connect('localhost', 'root', '', 'php-crud');

// Paso 2: Obtener el ID del registro a eliminar
$id = $_GET['id'];

// Paso 3: Ejecutar la consulta DELETE
mysqli_query($conexion, "DELETE FROM tabla WHERE ID = $id");

// Paso 4: Redirigir al usuario de regreso a la página principal
header('Location: index.php');
?>