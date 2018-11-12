<head>
<title>La web</title>
</head>

<style>
td, th {
       border: 1px solid #dddddd;
       text-align: left;
       padding: 8px;
        }
</style>

<?php
    //require_once('queryFunctions.php');
 
   $host = "127.0.0.1";
   $username = "root";
   $password = "secret";
   $database = "EjemploPW";
   
$conn = new mysqli ($host, $username, $password, $database);
if ($conn->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    echo $mysqli->host_info . "\n";
}

$sql = "SELECT nombre, dni from empleados"

?>


<h1>Empleados</h1>
<table>
  <tr>
    <th>Nombre</th>
    <th>Enlaces</th>
  </tr>


<?php
   $rows = $conn->query($sql);
   if (!$rows)
    die ($conn->error);
   foreach ($rows as $row)
    {
    echo '<tr>
            <td>'.$row["nombre"].'</td>
            <td><a href="detallesEmpleados.php?dni='.urlencode($row["dni"]).'">Ver detalles</a></td>
            <td><a href="borrarEmpleado.php?dni='.urlencode($row["dni"]).'">Borrar </a></td>
            <td><a href="editarEmpleado.php?dni='.urlencode($row["dni"]).'">Editar </a></td>

      </tr>';
    }
   echo "</table>";
   $conn = null;
  ?>

  <br/></br> 
  <form method="post" action="editarEmpleado.php">
    <input type="submit" value="reistrar nuevo libro"/>
  </form>

