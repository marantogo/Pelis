<?php
include("connection.php");

$con = connection ();

$sql = "SELECT * FROM tblpelicula";
$query = mysqli_query ($con, $sql);

?>
<!DOCTYPE html><html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href ="style.css">
    <title>Peliculas CRUD</title>
</head>
<body>
    <div class = "users-form">

    <form action="inserta_peli.php" method="POST">
        <h1>Registrar Película </h1>
        <input type="text" name ="nombre" placeholder="Nombre de Película ">
        <input type="text" name ="pais" placeholder="Pais">
        <input type="text" name ="sinopsis" placeholder="Sinopsis">
        <input type="text" name ="lanzamiento" placeholder="Lanzamiento">
        <input type="text" name ="clasificacion" placeholder="Clasificacion">
        <br>
        <input type="submit" value="Agregar Película: ">
    </form>
    </div>
    <div class = "users-table">
        <h2>Películas Registradas</h2>
        <table>
            <thead>
                <tr>
                    <th>Id Película</th>    
                    <th>Nombre</th>
                    <th>Pais</th>
                    <th>Sinopsis</th>
                    <th>Lanzamiento</th>
                    <th>Clasificacion</th>
                    <th></th>
                    <th></th>                    
                </tr>
            </thead>
            <tbody>
                <?php while($row = mysqli_fetch_array($query)): ?>
                <tr>
                <th><?=$row['id_pelicula']?></th>
                <th><?=$row['nombre']?></th>
                <th><?=$row['pais']?></th>
                <th><?=$row['sinopsis']?></th>
                <th><?=$row['año_lanzamiento']?></th>
                <th><?=$row['clasificacion']?></th>
                <th><a href="cambiar.php?id_pelicula=<?=$row['id_pelicula']?>" class="users-table--edit">Cambiar </a></th>
                <th><a href="eliminar.php?id_pelicula=<?=$row['id_pelicula']?>" class="users-table--delete">Eliminar </a></th>    
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>