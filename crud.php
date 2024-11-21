<?php
include('conexion.php');

$conx = connection();
$sql = "SELECT * FROM viaje_global";
$query = mysqli_query($conx, $sql);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Registro</title>
</head>
<body>
    <div class="users-form">
        <h1>Adregar Productos</h1>
        <form action="insert_product.php" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required><br><br>
        <label for="descripcion">Descripción:</label>
        <input type="text" id="descripcion" name="descripcion" required><br><br>
        <label for="precio">Precio:</label>
        <input type="number" id="precio" name="precio" required><br><br>
        <button type="submit">Agregar Producto</button>
    </form>
        <iframe name="leet" width="300" height="100" src=""></iframe>
        <br>
        <div style="font-size:16px; color:#cc0000;" ><?php echo isset($error) ? utf8_decode($error) : '' ;?></div>
    </div>

    <div class="table">
        <h2>Lista de Compras</h2>
        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_array($query)): ?>
                    <tr>
                        <th><?= $row['id'] ?></th>    
                        <th><?= $row['nombre'] ?></th>
                        <th><?= $row['descripcion'] ?></th>
                        <th><?= $row['precio'] ?></th>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

</body>
</html>
