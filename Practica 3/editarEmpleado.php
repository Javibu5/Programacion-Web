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
  <form method="post" action="/guardarEmpleado.php">

  <label for="dni"><strong>DNI</strong></label>
  <input type="text" name="dni" id="dni" value="<?php echo $row["dni"]?$row["dni"]:""?>"/> </br>

  <label for="nombre"><strong>Nombre: </strong> </label>
    <input type="text" name="nombre" id="nombre" value="<?php echo $row["nombre"]?$row["nombre"]:""?>"/>
     </br>

  <label for="apellido"><strong>Apellidos: </strong> </label>
    <input type="text" name="apellido" id="apellido" value="<?php echo $row["apellido"]?$row["apellido"]:""?>"/>
     </br>

  <label for="direccion"><strong>Direccion: </strong> </label>
    <input type="text" name="direccion" id="direccion" value="<?php echo $row["direccion"]?$row["direccion"]:""?>"/>
    </br>

  <label for="anoNacimiento"><strong>AnoNacimiento: </strong> </label>
    <input type="text" name="anoNacimiento" id="anoNacimiento" value="<?php echo $row["anoNacimiento"]?$row["anoNacimiento"]:""?>"/> 
     </br>

  <label for="departamento"><strong>Departamento: </strong> </label>
    <input type="text" name="departamento" id="departamento" value="<?php echo $row["departamento"]?$row["departamento"]:""?>"/>
      <br/><br/>


  <input type="submit" value="Guardar cambios">
  <input type="reset" value="Recuperar valores originales">
</form>

<a href="/index.php">Inicio</a>

<?php
   $conn = null;
  ?>