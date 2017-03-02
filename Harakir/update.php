 <?php
$nombre = $_POST['nombre'];
$puntos =$_POST['puntos'];
$clave = $_POST['clave'];
$servername = "localhost";
$username = "root";
$password = "root114";
$dbname = "harakiri";

//echo $nombre." ".$clave." ".$puntos;
//exit();
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE usuarios SET puntos=$puntos WHERE clave=$clave;";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
exit();
//header("location: http://localhost/Harakir");
?> 