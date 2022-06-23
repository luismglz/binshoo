<?php

$idUsuario = $_SESSION["id"];
$consulta  = " SELECT * FROM tb_pedidos WHERE id_usuario = ? ORDER BY id_pedido DESC ";
$query = $conn->prepare($consulta);
$query->bindParam(1, $idUsuario);
$query->execute();
?>
<div class="container-fluid py-5">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h1 class="text-center">My orders</h1>
      </div>
    </div>
    <div class="row text-center">
      <div class="col-12 col-md-2 border p-2">
        Order number
      </div>
      <div class="col-12 col-md-2 border p-2">
        Date
      </div>
      <div class="col-12 col-md-2 border p-2">
        Total
      </div>
      <div class="col-12 col-md-2 border p-2">
        Status
      </div>
      <div class="col-12 col-md-4 border p-2">
        Action
      </div>
    </div>
    <?php
    while ($registro = $query->fetch()) {
    ?>
      <div class="row text-center">
        <div class="col-12 col-md-2 border p-2">
          <?= $registro["id_pedido"]; ?>
        </div>
        <div class="col-12 col-md-2 border p-2">
          <?= $registro["fecha_pedido"] ?>
        </div>
        <div class="col-12 col-md-2 border p-2">
          <?= $registro["total_pedido"] ?>
        </div>
        <div class="col-12 col-md-2 border p-2">
          <?php
          $estatus = "";
          switch ($registro["estatus_pedido"]) {
            case 1:
              $estatus = "Pending";
              break;
            case 2:
              $estatus = "Confirmed";
              break;
            case 3:
              $estatus = "Delivered";
          }
          ?>
          <?= $estatus ?>
        </div>
        <div class="col-12 col-md-4 border p-2">
          <a href="?seccion=pedidos&accion=detalle&id=<?= $registro["id_pedido"] ?>">
            <button class="btn btn-sm btn-success">Show details</button>
          </a>
          <?php
          if ($registro["estatus_pedido"] == 1) {
          ?>
            <a href="?seccion=pedidos&accion=modificar&id=<?= $registro["id_pedido"] ?>">
              <button class="btn btn-sm btn-warning">Update</button>
            </a>
            <a href="?seccion=pedidos&accion=borrarPedido&id=<?= $registro["id_pedido"] ?>">
              <button class="btn btn-sm btn-danger">Delete</button>
            </a>
            <a href="?seccion=pedidos&accion=confirmar&id=<?= $registro["id_pedido"] ?>">
              <button class="btn btn-sm btn-primary">Confirm</button>
            </a>
          <?php
          }
          ?>
        </div>
      </div>
    <?php
    }
    ?>
  </div>
</div>