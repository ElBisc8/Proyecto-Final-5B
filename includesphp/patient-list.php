<?php
  session_start();
    $user_id = $_SESSION['usuario']['id'];

    include('conexion.php');
    $query = "SELECT * from paciente where id_user='$user_id'";
    $result = mysqli_query($connection, $query);
    if(!$result) {
        die('Query Failed'. mysqli_error($connection));
    }
    $json = array();
    while($row = mysqli_fetch_array($result)) {
        $json[] = array(
            'nombre' => $row['nombre'],
            'apellidos' => $row['apellidos'],
            'edad' => $row['edad'],
            'peso' => $row['peso'],
            'estatura' => $row['estatura'],
            'genero' => $row['genero'],
            'id' => $row['id'],
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
?>