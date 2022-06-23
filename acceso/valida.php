<?php

	$email=$_POST['email'];
  $contrasenia=$_POST['contrasenia'];

	$consulta  = " SELECT * FROM tb_usuarios WHERE email=? AND contrasenia=? ";
	$query = $conn->prepare($consulta);
	$query->bindParam(1, $email);
	$query->bindParam(2, $contrasenia);
	$query->execute();
	$cuenta=0;
	$cuenta = $query->rowCount();

	if ($cuenta)
	{
      $redireccionar="?seccion=acceso&accion=bienvenido";
	  $registro = $query->fetch();
      $_SESSION["id"]=  $registro["id_usuario"];
      $_SESSION["nombre"]=  $registro["nombre"];
	  $_SESSION["tipo"]=  $registro["tipo_usuario"];
    }
  else
    $redireccionar="?seccion=acceso&accion=ingresar&mensaje=novalido";
?>
<script>
  window.location.href = "<?=$redireccionar?>";
</script>
