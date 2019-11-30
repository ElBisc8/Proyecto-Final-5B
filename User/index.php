<?php

session_start();

    if(isset($_SESSION['usuario'])){

        if($_SESSION['usuario']['tipo']=='0'){
            header("Location: ../Admin/");
        }

    } else {
        header('Location: ../');
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FairNutrition | Home</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#"><dt style="color: rgb(255,100,0,.800);">Fair Nutrition | Team <i style="color: rgb(0,255,0,.900);" class="fas fa-leaf"></i></dt></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav ml-auto">
      <a class="nav-item nav-link active ml-auto" id="User" href="#"><i class="far fa-user"></i> <?php echo $_SESSION['usuario']['nombre'].' '.$_SESSION['usuario']['apellidop']; ?> </a>
      <a class="nav-item nav-link active ml-auto" id="User" href="../includesphp/cerrarsesion.php"><i class="fas fa-sign-out-alt"></i>Log out</a>
    </div>
  </div>
</nav>


<div class="container-fluid py-2">
    <div class="row">
        <div class="col-md-5">
            <div class="card text-white bg-success mb-3">
                <div class="card-header"><h2>Add Patient</h2></div>
                <div class="card-body">
                    <form id='add-patient'>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label text-right">Name:</label>
                            <div class="col-sm-8">
                                <!--Id control -> Hidden--> <input type="hidden" id="patient-Id">
                                <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label text-right">Surenames:</label>
                            <div class="col-sm-8">
                                <input type="text" id="apellidos" name="apellidos" class="form-control" placeholder="Surenames">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label text-right">Age:</label>
                            <div class="col-sm-8">
                                <input type="number" id="edad" name="edad" class="form-control" placeholder="Age">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label text-right">Weight(kg):</label>
                            <div class="col-sm-8">
                                <input type="number" id="peso" name="peso" class="form-control" placeholder="Weight">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label text-right">Height (cm):</label>
                            <div class="col-sm-8">
                                <input type="number" id="estatura" name="estatura" class="form-control" placeholder="Height">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label text-right">Gender:</label>
                            <div class="col-sm-8">
                                <select id="genero" name="genero" class="form-control">
                                    <option value="h">Male</option>
                                    <option value="m">Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 mx-auto">
                                <button class="btn btn-primary form-control">Add</button>
                            </div>
                        </div>
                    </form>

                    

                </div>
            </div>
        </div>
        <div class="col-md-7">
        <table class="table table-hover">
            <thead class="bg-primary text-white">
                <tr>
                    <th scope="col" class="text-center">Name</th>
                    <th scope="col" class="text-center">Surename</th>
                    <th scope="col" class="text-center">Weight</th>
                    <th scope="col" class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody id="contenido-tabla">
                
            </tbody>
            </table> 
        </div>
    </div>
</div>


    <script src="../assets/js/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/7c16ed7041.js" crossorigin="anonymous"></script>
    <script>
      
        $(function(){

            fetchPatient();
            let edit = false;

            //Añadir y/o editar paciente
            $('#add-patient').submit(e => {
                e.preventDefault();
                const postData = {
                    nombre: $('#nombre').val(),
                    apellidos: $('#apellidos').val(),
                    edad: $('#edad').val(),
                    peso: $('#peso').val(),
                    estatura: $('#estatura').val(),
                    genero: $('#genero').val(),
                    id: $('#patient-Id').val()
                };
                const url = edit === false ? '../includesphp/patient-add.php' : '../includesphp/patient-edit.php';
                if (url == '../includesphp/patient-edit.php'){
                    edit = false;
                }
               // console.log(postData, url);
                $.post(url, postData, (response) => {
                    //console.log(response);
                    $('#add-patient').trigger('reset');
                    fetchPatient();
                });
            });


            //Lista de pacientes
            function fetchPatient(){
                $.ajax({
                    url: '../includesphp/patient-list.php',
                    type: 'GET',
                    success: function(response) {
                    //console.log(response);
                    const users = JSON.parse(response);
                    let template = '';
                    users.forEach(user => {
                        template += `
                        
                            <tr class="text-center" patientId="${user.id}">
                                <td>${user.nombre}</td>
                                <td>${user.apellidos} 
                                </td>
                                <td>${user.peso}</td>
                                <td>
                                    <button class="task-item-view btn btn-success">View</button>
                                    <button class="patient-edit btn btn-warning">Edit</button>
                                    <button class="patient-delete btn btn-danger">Delete</button>
                                </td>
                            </tr>
                        
                            `;
                    });
                    $('#contenido-tabla').html(template);
                    }
                });
            }


            //Editar paciente

            $(document).on('click', '.patient-edit', (e) => {
                const element = $(this)[0].activeElement.parentElement.parentElement;
                const id = $(element).attr('patientId');
                $.post('../includesphp/patient-single.php', {id}, (response) => {
                    console.log(response);
                    const paciente = JSON.parse(response);
                    $('#patient-Id').val(paciente.id);
                    $('#nombre').val(paciente.nombre);
                    $('#apellidos').val(paciente.apellidos);
                    $('#edad').val(paciente.edad);
                    $('#peso').val(paciente.peso);
                    $('#estatura').val(paciente.estatura);
                    $('#genero').val(paciente.genero);
                    
                    edit = true;
                });
                e.preventDefault();
            });

            //Eliminar Paciente
            $(document).on('click', '.patient-delete', (e) => {
                if(confirm('Are you sure you want to delete it?')) {
                const element = $(this)[0].activeElement.parentElement.parentElement;
                const id = $(element).attr('patientId');
                $.post('../includesphp/patient-delete.php', {id}, (response) => {
                    console.log(response);
                    fetchPatient();
                });
                }
            });

        })
  
  </script>
</body>
</html>