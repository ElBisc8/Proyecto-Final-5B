<?php
    
    include('conexion.php');
    session_start();
    $id_user = $_SESSION['usuario']['id'];

    if(isset($_POST['id'])){
        $id = mysqli_real_escape_string($connection,$_POST['id']);

        $query = "SELECT * FROM paciente WHERE id=$id and id_user=$id_user";

        $result = mysqli_query($connection,$query);

        if (!$result){
            Die('Error...');
        }

        $json = array();
        while ($row = mysqli_fetch_array($result)){
            $json[] = array(

                'nombre' => $row['nombre'],
                'apellidos' => $row['apellidos'],
                'edad' => $row['edad'],
                'peso' => $row['peso'],
                'estatura' => $row['estatura'],
                'genero' => $row['genero'],
                'id' => $row['id']

            );

        }

        $jsonstring = json_encode($json[0]);
        echo $jsonstring;
    }

?>