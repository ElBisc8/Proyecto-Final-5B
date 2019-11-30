<?php

    include('conexion.php');
    session_start();

    if(isset($_POST['email']) && isset($_POST['password'])){
        $query = "SELECT id,nombre, apellidop, tipo FROM user WHERE correo='".$_POST['email']."' AND contra='".$_POST['password']."'";
        $result = mysqli_query($connection,$query);
        
        if (!$result){
            die("Query error" . mysqli_error($connection));
        }

        if ($result -> num_rows == 1){
            $row = mysqli_fetch_assoc($result);
            $_SESSION['usuario'] = $row;
            echo json_encode(array('error'=> false, 'tipo' => $row['tipo']));
        }else{
            echo json_encode(array('error' => true));
        }

        

    }

    mysqli_close($connection);
?>