<?php

include "Libros.php";

$servidor = 'localhost';
$usuario = 'root';
$contrasena = '';
$basedatos = 'foc3';
$libro = new Libros();

$conn = $libro->conexion($servidor, $basedatos, $usuario, $contrasena);
$autores = $libro->consultarAutores($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de autores</title>
    <style>
        tr,td{
            border: 1px solid black
        }
        thead{
            text-align: center;
        }
    </style>
</head>
<body>
    
<h2 style="text-align: center;" >Autores y sus libros</h2>
<?php


echo "<table style='margin:auto'>
 <thead>
 <tr>
 <td>Nombre</td>
 <td>Apellidos</td>
 <td>Libros publicados</td>
 </tr>
 </thead><tbody>";
 foreach($autores as $autor){

    echo "<tr>
     <td>".
     $autor['nombre'] ."<br>
     </td>
     <td>".
     $autor['apellidos'] ."<br>
     </td>
     <td>
        ";
          $librosAutor = $libro->librosAutor($conn,$autor['id']);
          if($librosAutor){
                echo "<ul>";
                foreach($librosAutor as $libroAutor){
                    echo "<li>Título: ".$libroAutor->titulo." - Fecha publicación: ".$libroAutor->f_publicacion."  </li>";
                }
                echo "</ul>";
          }else{
            echo "Este autor no tiene libros publicados";
          }

    echo "</td> </tr>";
 }
 echo "</tbody></table>";
?>

</body>
</html>