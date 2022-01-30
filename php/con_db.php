<?php
    $servidor="localhost";
    $usuario = "root";
    $clave="";
    $db="cloud";
    $conex = mysqli_connect($servidor,$usuario,$clave,$db); 

    if(!$conex)
    {
        echo'<script languaje="javascript">alert("Mori");</script>';
    }
?>