<?php

    include('conexion.php');
    session_start();
    $id_user = $_SESSION['usuario']['id'];
    if (isset($_POST['id'])){
        $id = $_POST['id'];
        $query = "DELETE FROM paciente WHERE id=$id and id_user=$id_user";
        
        $result = mysqli_query($connection,$query);
        if (!$result){
            Die("Error...");
        }

        echo "Task Deleted Successfully";  
    }

?>
