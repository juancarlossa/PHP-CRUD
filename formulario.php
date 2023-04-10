<!DOCTYPE html>
<html>
<head>
    <title>Agregar registro</title>
</head>
<body>
    <h1>Agregar registro</h1>
    <form method="POST" action="index.php">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" required>

        <label for="completado">Completado:</label>
        <input type="checkbox" name="completado">

        <label for="descripcion">Descripción:</label>
        <textarea name="descripcion"></textarea>

        <button type="submit">Agregar</button>
    </form>
</body>
</html>