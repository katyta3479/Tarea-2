<?php
require 'db.php';

// crear curso

function createCurso($nombre_curso, $docentes, $fecha, $informacion){
    global $pdo;
    $stmt = $pdo->prepare("INSERT INTO cursos (nombre_curso, docentes, fecha, informacion) VALUES (:nombre_curso, :docentes, :fecha, :informacion)");
    $stmt->execute(['nombre_curso', 'docentes', 'fecha', 'informacion' => $nombre_curso, $docentes, $fecha, $informacion]);
}

// obtener cursos

function getCurso(){
    global $pdo;
      $stmt = $pdo->prepare("SELECT * FROM cursos");
    return 
        
 $stmt->execute();
    $stmt->close();

   exit();
    }
?>

