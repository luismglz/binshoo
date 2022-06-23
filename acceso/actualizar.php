<?php

$nombre = $_POST["nombre"];
$email = $_POST["email"];
$contrasenia = $_POST["contrasenia"];
$id = $_SESSION["id"];

$consulta  = " UPDATE tb_usuarios SET
                        nombre=?,
                        email=?,
                        contrasenia=?
                        WHERE id_usuario=? ";
$query = $conn->prepare($consulta);
$query->bindParam(1, $nombre);
$query->bindParam(2, $email);
$query->bindParam(3, $contrasenia);
$query->bindParam(4, $id);
$query->execute();

?>
<div class="container-fluid py-5">
  <div class="row">
    <div class="col-12 text-center">
      <h1 id="successUpdateUser">My Account</h1>
    </div>
  </div>
  <div class="row">
    <div class="col-12 text-center">
      <h2>Changes successfully updated</h2>
          <img id='successImg' src='./res/success.png' alt='offer product'>
    </div>
  </div>
</div>