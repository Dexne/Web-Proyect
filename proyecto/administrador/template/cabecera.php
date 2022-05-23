<!--        CRERAR EL LOGIN, ESTO ESTA EN LA CABECERA SEGUN EL VIDEO -->
<?php 
session_start();

    if(!isset($_SESSION['usuario'])){
        header("location:./index.php");
    }else{
        if($_SESSION['usuario'] == "ok"){
            $nombreUsuario=$_SESSION["nombreUsuario"];
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>base de datos</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css" />
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <ul class="nav navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="inicio.php">INICIO</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="empleados.php">EMPLEADOS</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="clientes.php">CLIENTES</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="productos.php">PRODUCTOS</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="ventas.php">VENTAS</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="log_out.php">SALIR</a>
            </li>
        </ul>
    </nav>
    
    <div class="container">
        <br/><br/>
        <div class="row">
