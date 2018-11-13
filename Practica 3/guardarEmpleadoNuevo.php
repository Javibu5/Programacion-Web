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


  $stmt = $conn->prepare("INSERT INTO empleados (dni, nombre , apellido , direccion , anoNacimiento , departamento) values (?, ? , ? , ? , ? , ?)");

  $stmt->bind_param("ssssis", $_POST['dni'] , $_POST['nombre'] ,$_POST['apellido'],$_POST['direccion'] , $_POST['anoNacimiento'], $_POST['departamento']);
  
    $stmt->execute();

   $resultado = $stmt->get_result();

      if ($resultado){
      die("Operacion en base de datos fallida : " .$conn->error);
    }

    echo "Operacion realizada con exito";
    
    $conn = null;

   header("Location:/index.php");
   
   ?>
   