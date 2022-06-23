<?php
$id = $_GET["id"];

$consulta  = " SELECT * FROM tb_detalle, tb_productos 
                    WHERE id_pedido = ? 
                    AND id_producto_fk = id_producto ORDER BY id_detalle DESC ";
$query = $conn->prepare($consulta);
$query->bindParam(1, $id);
$query->execute();
?>
<form id="formulario" class="ingresa" action="?seccion=pedidos&accion=finalizar&id=<?= $id ?>" method="post">
  <div class="container-fluid py-5">
    <div class="container">
      <div class="row">
        <div class="col-12 col-md-6">
          <div class="row text-center">
            <div class="col-12 border p-2">
              <h3>Order summary</h3>
            </div>
          </div>
          <div class="row text-center">
            <div class="col-12 col-md-4 border p-2">
              Producto
            </div>
            <div class="col-12 col-md-4 border p-2">
              Price
            </div>
            <div class="col-12 col-md-4 border p-2">
              Amount
            </div>
          </div>
          <?php
          $totalPrecio = 0;
          $totalCantidad = 0;
          while ($registro = $query->fetch()) {
          ?>
            <div class="row text-center">
              <div class="col-12 col-md-4 border p-2">
                <?= $registro["nombre_producto"] ?>
              </div>
              <div class="col-12 col-md-4 border p-2">
                $<?= $registro["precio_detalle"] ?>
              </div>
              <div class="col-12 col-md-4 border p-2">
                <?= $registro["cantidad_detalle"] ?>
              </div>
            </div>
          <?php
            $totalPrecio += $registro["precio_detalle"];
            $totalCantidad += $registro["cantidad_detalle"];
          }
          ?>
          <div class="row text-center">
            <div class="col-12 col-md-4 border p-2">
            </div>
            <div class="col-12 col-md-4 border p-2">
              $<?= $totalPrecio ?>
            </div>
            <div class="col-12 col-md-4 border p-2">
              <?= $totalCantidad ?>
            </div>
          </div>
        </div>
        <div class="col-12 col-md-6">
          <div class="row text-center">
            <div class="col-12 border p-2">
              <h3>Delivery address</h3>
              <?php include("pedidos/mapa.php"); ?>
            </div>
          </div>
        </div>
      </div>
      <div class="row py-5">
        <div class="col-12 text-center">
          <input id="btnSubmitDelivery" type="submit" class="btn btn-lg btn-primary" value="Confirm order">
        </div>
      </div>
    </div>
  </div>
</form>