<?php

$id = $_GET["id"];

$lat = $_POST["lat"];
$lng = $_POST["lng"];

$consulta = " UPDATE tb_pedidos SET
                    estatus_pedido = 3,
                    latitud_pedido = ?,
                    longitud_pedido = ?
                    WHERE id_pedido = ? ";
$query = $conn->prepare($consulta);
$query->bindParam(1, $lat);
$query->bindParam(2, $lng);
$query->bindParam(3, $id);
$query->execute();

?>
<div class="container-fluid py-5">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h1 id="successOrder" class="text-center">Your order has been shipped</h1>
        <img id='successImg' src='./res/success.png' alt='offer product'>
      </div>
    </div>
  </div>
</div>