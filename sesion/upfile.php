<?php

    session_start();
    if(isset($_SESSION["user"]))
    {
        $user = $_SESSION["user"];
        include("../php/con_db.php");
        $consulta = "SELECT * FROM personas WHERE user = '$user'";
        $resul = mysqli_query($conex, $consulta);
        $filas = mysqli_fetch_row($resul);
    }
    else
    {
        header("location:./../index.html");
    }

    copy($_FILES['file']['tmp_name'], "./../$user/".$_FILES['file']['name']);
    $nombre = $_FILES['file']['name'];
    $servernam = $_SERVER['SERVER_NAME'];
    $link = "www.example.com/$user/$nombre";

    $acbd = "INSERT INTO $user (nombre, link, compartido) VALUES ('$nombre', '$link', '0')";
    $resultado = mysqli_query($conex, $acbd);
    if(!$resultado)
    {
        header("location:./index.php");
    }
    else
    {
        //Redireccionar al index
        header("location:./index.php");
    }

?>