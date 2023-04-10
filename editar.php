<!DOCTYPE html>
<html>
<head>
    <title>Editar registro</title>
</head>
<body>
    <h1>Editar registro</h1>
    <?php
    // Paso 1: Conectar a la base de datos
    $conexion = mysqli_connect('localhost', 'root', '', 'php-crud');

    // Paso 2: Leer el registro seleccionado
    $id = $_GET['id'];
    $resultado = mysqli_query($conexion, "SELECT * FROM tabla WHERE ID = $id");
    $registro = mysqli_fetch_assoc($resultado);
    ?>
    <form method="POST" action="index.php">
        <input type="hidden" name="id" value="<?php echo $registro['ID']; ?>">

        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" value="<?php echo $registro['Nombre']; ?>" required>

        <label for="completado">Completado:</label>
        <input type="checkbox" name="completado" <?php echo $registro['Completed'] ? 'checked' : ''; ?>>

        <label for="descripcion">Descripción:</label>
        <textarea name="descripcion"><?php echo $registro['description']; ?></textarea>

        <button type="submit">Actualizar</button>
    </form>
</body>
</html>