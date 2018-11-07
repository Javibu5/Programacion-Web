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


  $stmt = $conn->prepare("DELETE from empleados where dni=?");

  $stmt->bind_param("s", $_GET['dni']);
  $stmt->execute();

   $resultado = $stmt->get_result();

      if (!$resultado)
      die("Operacion en base de datos fallida : ".$conn->error);

    echo "Se ha borrado con exito"  


    $conn = null;

   header("Location: index.php");

   ?>
   