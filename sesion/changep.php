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

    //Recibir via post los datos del formulario

    if (isset($_POST['enviar']))
    {
	
        $pass = trim($_POST['pass']);
	    $pass = md5($pass);

        //Actualizar pass en la base de datos
        $consulta = "UPDATE personas SET pass = '$pass' WHERE user = '$user'";
        $resul = mysqli_query($conex, $consulta);

        //Check if the query was successful
        if($resul)
        {
            echo "<script>window.location.href='success.php';</script>";
        }
        else
        {
            echo "<script>alert('Error al actualizar contraseña');</script>";
            echo "<script>window.location.href='profile.php';</script>";
        }
    }

?>