<?php

    include('conexion.php');
    
    $nombre = $_POST['Nombre'];
    $apellidop = $_POST['ApellidoPaterno'];
    $apellidom = $_POST['ApellidoMaterno'];
    $email = $_POST['Email'];
    $contra = $_POST['Contra'];
    $tipo = '1';

    $queryVerifica = "SELECT * FROM user WHERE correo='$email'";
    $resultVerifica = mysqli_query($connection,$queryVerifica);

    if (mysqli_num_rows($resultVerifica)>0){
        echo "Existe";
    } else {
        $query = "INSERT INTO user(nombre,apellidop,apellidom,correo,contra,tipo) VALUES ('$nombre','$apellidop','$apellidom','$email','$contra','$tipo')";
        $result = mysqli_query($connection,$query);

        if(!$result){
            die ("Error de insercion a BDD.");
        }

        echo "Registrado"; 
    }
    
        
    mysqli_close($connection);



    

    

?>