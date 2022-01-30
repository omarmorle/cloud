<?php

if (isset($_POST['ingresa']))
{
	include("con_db.php");
	
	$user = trim($_POST['user1']);
    $pass = trim($_POST['pass1']);
	$pass = md5($pass);
	
	$resul= "SELECT * FROM personas WHERE user = '$user' and pass = '$pass'";
	$final = mysqli_query($conex,$resul);

	$filas=mysqli_num_rows($final);

	if($filas)
	{
		session_start();
		$_SESSION["user"] = $user;
		?> 
		<script type="text/javascript">
			window.location.href = "../sesion/index.php";
		</script>
		<?php
	}
	else{
		
        echo "<script>alert('Usuario o contraseña incorrectos');</script>";
		
		?>
		<script type="text/javascript">
			window.location.href = "../index.html";
		</script>
		<?php
	}
        
	mysqli_free_result($final);
	mysqli_close($conex);
}

