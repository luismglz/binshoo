<?php

$nombre = $_POST["nombre"];
$email = $_POST["email"];
$contrasenia = $_POST["contrasenia"];

$consulta  = " INSERT INTO tb_usuarios (nombre,email,contrasenia,tipo_usuario) 
                VALUES (?,?,?,1) ";
$query = $conn->prepare($consulta);
$query->bindParam(1, $nombre);
$query->bindParam(2, $email);
$query->bindParam(3, $contrasenia);
$query->execute();

?>
<div class="parent-section-successful container py-5 ">
  <div class="row">
    <div class="col-12 text-center">
      <h1 id="successSignup">User successfully registered</h1>
    </div>
  </div>
  <div class="row">
    <div class="col-12 text-center">
      <img id='successImg' src='./res/success.png' alt='offer product'>
    </div>
  </div>
</div>