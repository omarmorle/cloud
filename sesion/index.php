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

    $carpeta = "./../$user/";
    $archivos = scandir($carpeta);
    unset($archivos[0]);
    unset($archivos[1]);
    sort($archivos);
    $num_archivos = count($archivos);

    //Recibir via get el nombre del archivo a eliminar
    if(isset($_GET["archivo"]))
    {
        $archivo = $_GET["archivo"];
        echo $archivo;
        $archivo = $carpeta.$archivo;
        unlink($archivo);
        //redireccionar a la misma pagina
        header("location:./index.php");
    }
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Mis archivos</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="assets/bootstrap/css/mysta.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="icon" type="image/x-icon" href="./../cloud.ico">
</head>

<body id="page-top">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion text-wrap p-0">
            <div class="container-fluid d-flex flex-column p-0"><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                    <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-cloud"></i></div>
                    <div class="sidebar-brand-text mx-3"><span>CLOUD</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item"><a class="nav-link active" href="index.php"><i class="fa fa-folder-open"></i><span>Mis archivos</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="profile.php"><i class="fa fa-user"></i>Perfil</a></li>
                    <li class="nav-item"><a class="nav-link" href="logout.php"><i class="fa fa-sign-out"></i>Cerrar sesión</a></li>
                    <li class="nav-item"></li>
                </ul>
                <div class="text-center d-none d-md-inline"></div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle me-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                            <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-folder-open"></i></div>
                            <div class="sidebar-brand-text mx-3"><span>Mis archivos</span></div>
                        </a></div>
                </nav>
                <div class="container-fluid">
                
                    <div class="row">
                    
                    <?php
                        for($i=0, $contador=1; $i<$num_archivos; $i++, $contador++)
                        {
                            if($contador == 5)
                            {
                                echo "</div>";
                                echo "<div class='row'>";
                            }

                            $inicio = strrpos($archivos[$i], ".") + 1;
                            $extension = substr($archivos[$i], $inicio);
                            $imagen = "";
                            if($extension == "jpg" || $extension == "png" || $extension == "jpeg" || $extension == "gif" || $extension == "bmp") 
                            {
                                $imagen = $carpeta.$archivos[$i];
                            }
                            else if($extension == "xlsx" || $extension == "csv" || $extension == "xls")
                            {
                                $imagen = "./assets/iconos/excel.svg";
                            }
                            else if($extension == "txt")
                            {
                                $imagen = "./assets/iconos/notepad.svg";
                            }
                            else if($extension == "c" || $extension == "cpp")
                            {
                                $imagen = "./assets/iconos/c.svg";
                            }
                            else if($extension == "py")
                            {
                                $imagen = "./assets/iconos/python.svg";
                            }
                            else if($extension == "doc" || $extension == "docx" || $extension == "dick")
                            {
                                $imagen = "./assets/iconos/word.svg";
                            }
                            else if($extension == "ppt" || $extension == "pptx")
                            {
                                $imagen = "./assets/iconos/powerpoint.svg";
                            }
                            else if($extension == "pdf")
                            {
                                $imagen = "./assets/iconos/pdf.svg";
                            }
                            else if($extension == "mp3" || $extension == "wav" || $extension == "ogg")
                            {
                                $imagen = "./assets/iconos/sound.svg";
                            }
                            else if($extension == "mp4" || $extension == "avi" || $extension == "mkv")
                            {
                                $imagen = "./assets/iconos/video.svg";
                            }
                            else if($extension == "zip" || $extension == "rar")
                            {
                                $imagen = "./assets/iconos/archivocomprimido.png";
                            }
                            else if($extension == "pdf")
                            {
                                $imagen = "./assets/iconos/pdf.svg";
                            }
                            else if($extension == "psd" || $extension == "psdt")
                            {
                                $imagen = "./assets/iconos/photoshop.svg";
                            }
                            else
                            {
                                $imagen = "./assets//iconos/document.svg";
                            }

                            echo "<div class='col-md-4 mt-4 col-xl-3'>";
                                echo "<div class='card profile-card-5'>";
                                    echo "<div class='card-img-block' style='background:white' >";
                                        echo "<img class='card-img-top cinco' src='$imagen' alt='Card image cap' height='250'>";
                                    echo "</div>";
                                    echo "<div class='card-body pt-0'>";
                                    echo "<h5 class='card-title'>$archivos[$i]</h5>";
                                    echo "<a href='$carpeta$archivos[$i]' class='btn btn-primary btn-sm' download>Descargar</a>";
                                    echo "<a href='./index.php?archivo=$archivos[$i]' class='btn btn-danger btn-sm'>Eliminar</a>";
                                    echo "<a id='$archivos[$i]' onClick='copy(this)' class='btn btn-success btn-sm' style='color:white'>Compartir</a>";
                    
                                echo "</div>";
                                echo "</div>";
                            echo "</div>";
                        }
                    ?>

                    </div>

                    <div class="row">
                        <div class="col-md-6 col-xl-3 mb-4"></div>
                        <div class="col-md-6 col-xl-3 mb-4"></div>
                        <div class="col-md-6 col-xl-3 mb-4"></div>
                    </div>
                </div>
            </div>
            <footer class="bg-white sticky-footer">
                <form id="formup" action="./upfile.php" method="post" enctype="multipart/form-data" style="display:none" >
                    <div class="ml-2" id="">
                        <input id="uploadFile" placeholder="Nombre del archivo" disabled="disabled" />
                        <div class="fileUpload btn btn-primary">
                            <span>Seleccionar</span>
                            <input name="file" id="file" type="file" class="upload" />
                        </div>
                        <input type="submit" class="btn btn-primary" value="Subir" id="botup" style="display:none" />
                    </div>
                </form>
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span>Copyright © Omar Moreno 2022</span></div>
                </div>
            </footer>
        </div>
        
            <a class="border rounded d-inline scroll-to-top" onClick="Activa()">
                <i class="fa fa-cloud-upload"></i>
            </a>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/theme.js"></script>
    <script src="assets/bootstrap/js/myja.js"></script>
    <script>
        function Activa(){
            document.getElementById('formup').style.display = 'inline';
        }
        //Funcion para copiar al portapapeles
        function copy(name){
            name = name.id;
            console.log(name);

            user = <?php echo json_encode($_SESSION['user']); ?>;
            
            //copiar el contenido del elemento al portapapeles
            var aux = document.createElement("input");
            aux.setAttribute("value", "http://localhost/cloud/"+user+"/"+name);
            document.body.appendChild(aux);
            aux.select();
            document.execCommand("copy");
            document.body.removeChild(aux);

        }
    </script>
</body>

</html>