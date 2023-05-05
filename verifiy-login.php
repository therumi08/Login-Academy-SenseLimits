<?php 

// Datos de conexión a la base de datos
$servername = "localhost"; // Nombre/IP del servidor
$database = "db"; // Nombre de la BBDD
$username = "root"; // Nombre del usuario
$password = ""; // Contraseña del usuario

// Crear conexión
$conn = mysqli_connect($servername, $username, $password, $database);


// Obtener el nombre de usuario y la contraseña ingresados por el usuario
$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];

// Verificar si el nombre de usuario y la contraseña son válidos
$query = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND contrasena = '$contrasena'";
$resultado = $conn->query($query);

if ($resultado->num_rows > 0) {
  // El usuario es válido, redirigir a la página de inicio de sesión exitosa
  header('Location: admin/index.php');
} else {
  // Las credenciales son incorrectas, mostrar un mensaje de error
  header('Location: error-login/datosinvalidos.html');
}

?>