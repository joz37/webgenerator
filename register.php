<?php 
	session_start();
	if (isset($_SESSION["id"])) {
		header("location: panel.php");
	}
	$msg = "";
	$sql = mysqli_connect("loalhost","adm_webgenerator","webgenerator2020","webgenerator");
	$aux = "";
	if (isset($_POST["btnSubmitReg"])) {
		if ($_POST["password"]!=$_POST["repassword"]) {
			$msg = "Las contraseñas no coinciden";
		} else {
			$query = "SELECT * FROM `usuarios`";
			$res = mysqli_query($sql,$query);
			while ($fila = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
				if ($fila["email"] == $_POST["email"]) {
					$aux = 1;
					$msg =  "email ya registrado";
				}
			}

			if ($aux!=1) {
				$query = "INSERT INTO `usuarios` (`idUsuario`, `email`, `password`, `fechaRegistro`) VALUES (NULL, '".$_POST["email"]."', '".$_POST["password"]."', CURRENT_TIMESTAMP)";

				$res = mysqli_query($sql,$query);

				var_dump($res);
				header("location: login.php");
			
			}
		}
	}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<form action="" method="POST">
		<label>Email:</label>
		<input type="email" name="email" required>
		<br> <br>
		<label>Password:</label>
		<input type="password" name="password" required>
		<br> <br>
		<label>Confirmar Password</label>
		<input type="password" name="repassword" required>
		<input type="submit" name="btnSubmitReg" value="ingresar">
		<br>
			<?php 
	echo $msg; ?>
	</form>
</body>
</html>