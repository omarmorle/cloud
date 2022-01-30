<?php 

if (isset($_POST['register'])) {
	
	include("con_db.php");

	$user = trim($_POST['user']);
	$pass = trim($_POST['pass']);
	$code = trim($_POST['code']);

	$pass = md5($pass);
	$code = md5($code);

	$conscode = "SELECT * FROM codigo";
	$resultcode = mysqli_query($conex, $conscode);
	$rowcode = mysqli_fetch_array($resultcode);

	if ($rowcode['code'] == $code) {
		
		$consulta = "INSERT INTO personas(user, pass) VALUES ('$user','$pass')";
		$resultado = mysqli_query($conex,$consulta);
		
		if ($resultado) {

			$consulta = "CREATE TABLE $user (
				id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
				nombre VARCHAR(200) NOT NULL,
				link VARCHAR(200) NOT NULL,
				compartido int(2) NOT NULL
			)";
			$resultado = mysqli_query($conex,$consulta);

			if ($resultado) {
				
				$carpeta = "../".$user;
				mkdir($carpeta);

				?> 
					<script type="text/javascript">
						window.location.href = "../index.html";
					</script>
				<?php
			}
			else{
				echo "Error al crear la tabla";
			}
		} else {
			?> 
				echo'<script languaje="javascript">alert("Mori");</script>';
				<h3 class="bad">¡Ups ha ocurrido un error!</h3>
			<?php
		}

	} else {
		echo "<script>alert('Codigo incorrecto');</script>";
		?>
		<script type="text/javascript">
			window.location.href = "../index.html";
		</script>
		<?php
	}
}


?>