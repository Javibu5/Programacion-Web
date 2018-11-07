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


  $stmt = $conn->prepare("UPDATE empleados set dni=?, nombre=? ,apellido=? ,direccion=?, anoNacimiento=? ,departamento=?");

  $stmt->bind_param("s,s,s,s,s,s", $_POST['dni'] , $_POST['nombre'] ,$_POST['apellido'],$_POST['direccion'] , $_POST['anoNacimiento'], $_POST['departamento']);
  
    $stmt->execute();

   $resultado = $stmt->get_result();

      if (!$resultado)
      die("Operacion en base de datos fallida : " .$conn->error);

    


    $conn = null;

   header("Location: index.php");

   ?>
   