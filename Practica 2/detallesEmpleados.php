
<head>
<title>Empleado</title>
</head>

<?php

 
   $host = "127.0.0.1";
   $username = "root";
   $password = "secret";
   $database = "EjemploPW";
   
$conn = new mysqli ($host, $username, $password, $database);
  if ($conn->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    echo $mysqli->host_info . "\n";
}

  $stmt = $conn->prepare("SELECT * from empleados where dni=?");

  $stmt->bind_param("s", $_GET['dni']);

  
   $stmt->execute();
   $rows = $stmt->get_result();
   
   if (!$rows)
    die ($conn->error);
   
   $row=$rows->fetch_assoc();
  ?>

  <p><strong>Nombre: </strong><?php echo $row["nombre"] ?></p> 
  <p><strong>Apellidos: </strong><?php echo $row["apellido"]?></p> 
  <p><strong>dni: </strong><?php echo $row["dni"]?></p> 
  <p><strong>direccion: </strong><?php echo $row["direccion"]?></p> 
  <p><strong>anoNacimiento </strong><?php echo $row["anoNacimiento"]?></p> 
  <p><strong>departamento: </strong><?php echo $row["departamento"]?></p> 

 <br/>

<a href="/index.php">Inicio</a>

<?php
   $conn = null;
  ?>