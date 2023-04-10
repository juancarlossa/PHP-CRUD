<!DOCTYPE html>
<html>

<main>
  <head>
    <!-- CSS de Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- Tema opcional de Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
    <!-- Archivos JavaScript de Bootstrap -->
    <title>CRUD PHP</title>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>


<?php
// Paso 1: Conectar a la base de datos
$conexion = mysqli_connect('localhost', 'root', '', 'php-crud');

// Paso 2: Crear la interfaz de usuario
echo '<div class="container">';
echo '<div class="row">';
echo '<div class="col-xs-12">';
echo '<h1 class="text-center">CRUD en PHP</h1>';
echo '<p class="text-center"><a href="formulario.php" class="btn btn-primary">Agregar registro</a></p>';
echo '</div>';
echo '</div>';

// Paso 3: Leer los registros
$resultado = mysqli_query($conexion, 'SELECT * FROM tabla');
$registros = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
?>

<style>
  body {
    width: 100%;
    margin: auto, auto;
  }
  table {
    border-collapse: collapse;
    width: 100%;
  }

  th, td {
    text-align: left;
    padding: 8px;
  }

  th {
    background-color: #f2f2f2;
    color: #000;
  }

  tr:nth-child(even) {
    background-color: #f2f2f2;
  }

  a {
    color: blue;
    text-decoration: none;
  }
  .container {
    text-align: center;
  }
</style>

<?php
echo '<div class="row">';
echo '<div class="col-xs-12">';
echo '<table class="table table-striped">';
echo '<thead>';
echo '<tr>';
//echo '<th>ID</th>';
echo '<th>Nombre</th>';
echo '<th>Completado</th>';
echo '<th>Descripción</th>';
echo '<th>Acciones</th>';
echo '</tr>';
echo '</thead>';
echo '<tbody>';

foreach ($registros as $registro) {
  echo '<tr>';
  //echo '<td>' . $registro['ID'] . '</td>';
  echo '<td>' . $registro['Nombre'] . '</td>';
  echo '<td>' . ($registro['Completed'] ? 'Sí' : 'No') . '</td>';
  echo '<td>' . $registro['Description'] . '</td>';
  echo '<td>';
  echo '<a href="editar.php?id=' . $registro['ID'] . '" class="btn btn-primary">Editar</a>';
  echo ' ';
  echo '<a href="eliminar.php?id=' . $registro['ID'] . '" class="btn btn-danger">Eliminar</a>';
  echo '</td>';
  echo '</tr>';
}

echo '</tbody>';
echo '</table>';
echo '</div>';
echo '</div>';
echo '</div>';

// Paso 4: Insertar registros
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $nombre = $_POST['nombre'];
  $completado = $_POST['completado'] ? 1 : 0;
  $descripcion = $_POST['descripcion'];

  $sql = "INSERT INTO tabla (Nombre, Completed, description) VALUES ('$nombre', $completado, '$descripcion')";
  mysqli_query($conexion, $sql);

  header('Location: index.php');
}

// Paso 5: Actualizar registros
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $id = $_POST['id'];
  $nombre = $_POST['nombre'];
  $completado = $_POST['completado'] ? 1 : 0;
  $descripcion = $_POST['descripcion'];

  $sql = "UPDATE tabla SET Nombre = '$nombre', Completed = $completado, description = '$descripcion' WHERE ID = $id";
  mysqli_query($conexion, $sql);

  header('Location: index.php');
}

// Paso 6: Eliminar registros
if (isset($_GET['id'])) {
  $id = $_GET['id'];

  $sql = "DELETE FROM tabla WHERE ID = $id";
  mysqli_query($conexion, $sql);

  header('Location: index.php');
}
?>

</main>
</html>