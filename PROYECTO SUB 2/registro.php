<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "buscat";

$conn = new mysqli($servername, $username, $password, $db);
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $nombre = $_POST['nombre'];
    $fecha = $_POST['fecha'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $estado = $_POST['estado'];
    $genero = $_POST['genero'];
    $usuario = $_POST['usuario'];
    $contraseña = $_POST['contraseña'];

    // Consulta SQL para insertar los datos
    $sql = "INSERT INTO usuarios (NOMBRE, FECHA, EMAIL, TELEFONO, ESTADO, GENERO, USUARIO, CONTRASEÑA) 
            VALUES ('$nombre', '$fecha', '$email', '$telefono', '$estado', '$genero', '$usuario', '$contraseña')";

    // Ejecutar la consulta
    if ($conn->query($sql) === TRUE) {
        header("Location: Cuenta.html");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
// Cerrar la conexión
$conn->close();
?>
