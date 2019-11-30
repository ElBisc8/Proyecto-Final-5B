  
<?php
    include('conexion.php');
    session_start();
    
    if(isset($_POST['nombre'])) {
        # echo $_POST['name'] . ', ' . $_POST['description'];
        $nombre = $_POST['nombre'];
        $apellidos = $_POST['apellidos'];
        $edad = $_POST['edad'];
        $peso = $_POST['peso'];
        $estatura = $_POST['estatura'];
        $genero = $_POST['genero'];
        $id_usuario = $_SESSION['usuario']['id'];
        $query = "INSERT into paciente VALUES ('','$nombre', '$apellidos','$edad','$peso','$estatura','$genero','$id_usuario')";
        $result = mysqli_query($connection, $query);

        if (!$result) {
            die('Query Failed.');
        }
        echo "Patient Added Successfully";  
    }
?>