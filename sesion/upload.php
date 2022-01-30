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
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Subir archivos</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
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
                    <li class="nav-item"><a class="nav-link" href="index.php"><i class="fa fa-folder-open"></i><span>Mis archivos</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="shared.php"><i class="fa fa-share"></i>Compartidos</a></li>
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
                            <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-cloud-upload-alt"></i></div>
                            <div class="sidebar-brand-text mx-3"><span>Subir archivos</span></div>
                        </a></div>
                </nav>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">

                            <div id="dropContainer" style="border:1px solid black;height:100px;">
                            Drop Here
                            </div>
                            Should update here:
                            <input type="file" id="fileInput" />
                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span>Copyright © Omar Moreno 2022</span></div>
                </div>
            </footer>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/theme.js"></script>
    <script>
        dropContainer.ondragover = dropContainer.ondragenter = function(evt) {
        evt.preventDefault();
        };

        dropContainer.ondrop = function(evt) {
        // pretty simple -- but not for IE :(
        fileInput.files = evt.dataTransfer.files;

        // If you want to use some of the dropped files
        const dT = new DataTransfer();
        dT.items.add(evt.dataTransfer.files[0]);
        dT.items.add(evt.dataTransfer.files[3]);
        fileInput.files = dT.files;

        evt.preventDefault();
        };
    </script>
</body>

</html>