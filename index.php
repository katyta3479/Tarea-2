<?php
require 'crud.php';

// Crear curso
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nombre_curso'], $_POST['docentes'], $_POST['fecha'], $_POST['informacion'] {
    createCurso($_POST['nombre_curso'], $_POST['docentes'], $_POST['fecha'], $_POST['informacion']);
    header("Location: index.php");
    exit;
}

// Crear inscripcion
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nombres_apellidos'])) {
    createVehicle($_POST['vehicle_model'], $_POST['vehicle_price'], $_POST['vehicle_year'], $_POST['brand_id']);
    header("Location: index.php");
    exit;
}

// Obtener cursos e inscripciones
$cursos = getCurso();
$inscripciones = getIncripciones();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscripción de Cursos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #DB7093;
        }
        form {
            margin-bottom: 20px;
        }
        input, select, button {
            padding: 10px;
            margin: 5px 0;
            width: 100%;
            max-width: 300px;
        }
        button {
            background-color: #FF69B4;
            color: white;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: #FFC0CB;
        }
    </style>
</head>
<body>
    <h1>Inscripción de Cursos</h1>

    <!-- Crear Cursos -->
    <h2>Crea un curso</h2>
    <form method="POST">
        <input type="text" name="nombre_curso" placeholder="Nombre del curso" required>
        <input type="text" name="docentes" placeholder="Nombre de docente" required>
        <input type="date" name="fecha" required>
        <input type="text" name="Informacion" placeholder="Detalle del curso" required>
        <button type="submit">Crear Curso</button>
    </form>

    <!-- Crear Inscripcion -->
    <h2>Realizar Inscripción</h2>
    <form method="POST">
        <input type="text" name="nombres_apellidos" placeholder="Nombres y Apellidos" required>
        <input type="number" name="cedula" placeholder="cedula" required>
                <select name="id_cursos" required>
            <option value="">Seleccionar Cursos</option>
            <?php foreach ($cursos as curso): ?>
                <option value="<?= $curso['id'] ?>"><?= $curso['nombre_curso'] ?></option>
            <?php endforeach; ?>
        </select>
        <button type="submit">Realizar inscripción</button>
    </form>

    <!-- Listado de cursos -->
    <h2>Cursos</h2>
    <table>
        <tr>
            <th>Nombre del curso</th>
            <th>Docente</th>
            <th>fecha</th>
            <th>Información</th>
                   </tr>
        <?php foreach ($incripciones as $incripcion): ?>
            <tr>
                <td><?= htmlspecialchars($incripcion['nombres_apellidos']) ?></td>
                <td>$<?= number_format($incripcion['cedula'], 10) ?></td>
                <td><?= htmlspecialchars($incripcion['nombre_curso']) ?></td>
                <td>
                    <a href="edit.php?id=<?= $incripcion['id'] ?>">Editar</a>
                    <a href="delete.php?id=<?= $incripcion['id'] ?>" 
                       onclick="return confirm('¿Estás seguro de eliminar este curso?')">Eliminar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>