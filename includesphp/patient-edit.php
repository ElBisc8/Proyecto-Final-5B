  
<?php

    session_start();

    include('conexion.php');

    if(isset($_POST['id'])) {
        $nombre = $_POST['nombre'];
        $apellidos = $_POST['apellidos'];
        $edad = $_POST['edad'];
        $peso = $_POST['peso'];
        $estatura = $_POST['estatura'];
        $genero = $_POST['genero'];
        $id_usuario = $_SESSION['usuario']['id'];
        $id = $_POST['id'];

        $query = "UPDATE paciente SET nombre = '$nombre', apellidos = '$apellidos', edad = '$edad', peso = '$peso', estatura = '$estatura', genero = '$genero' WHERE id = '$id' and id_user='$id_usuario'";
        $result = mysqli_query($connection, $query);
        if (!$result) {
            die('Query Failed.');
        }
        echo "Patient Update Successfully";  
    }
?>