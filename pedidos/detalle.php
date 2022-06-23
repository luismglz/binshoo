<?php
$id = $_GET["id"];
$fullname = $_SESSION["nombre"];
$consulta  =
  $consulta  = " SELECT * FROM tb_detalle, tb_productos WHERE id_pedido = ? AND id_producto_fk = id_producto ORDER BY  id_detalle DESC";
$query = $conn->prepare($consulta);
$query->bindParam(1, $id);
$query->execute();
?>
<div id="orderDetailSection" class="container-fluid py-5">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h1 class="text-center">Order details</h1>
        <h3 class="fullnameLabelGreet text-center"><?= $fullname; ?></h3>
      </div>
    </div>
    <div class="row text-center">
      <div class="order-det-tb-h col-12 col-md-3 border p-2">
        <p class="order-det-tb-h-p">Product</p>
      </div>
      <div class="order-det-tb-h col-12 col-md-3 border p-2">
        <p class="order-det-tb-h-p">Price</p>
      </div>
      <div class="order-det-tb-h col-12 col-md-3 border p-2">
        <p class="order-det-tb-h-p">Amount</p>
      </div>
      <div class="order-det-tb-h col-12 col-md-3 border p-2">
        <p class="order-det-tb-h-p">Action</p>
      </div>
    </div>
    <?php
    $totalPrecio = 0;
    $totalCantidad = 0;
    while ($registro = $query->fetch()) {
    ?>
      <div class="row text-center order-det-tb-row">
        <div class=" col-12 col-md-3 border p-2">
          <p class="order-det-tb-row-p"><?= $registro["nombre_producto"] ?></p>
        </div>
        <div class=" col-12 col-md-3 border p-2">
          <p class="order-det-tb-row-p">$<?= $registro["precio_detalle"] ?></p>
        </div>
        <div class=" col-12 col-md-3 border p-2">
          <p class="order-det-tb-row-p"><?= $registro["cantidad_detalle"] ?></p>
        </div>
        <div class="col-12 col-md-3 border p-2">
          <a href="?seccion=pedidos&accion=borrarProducto&id=<?= $id ?>&idDetalle=<?= $registro["id_detalle"] ?>&idProducto=<?= $registro["id_producto"] ?>">
            <button class="btn btn-danger">Delete</button>
          </a>
        </div>
      </div>
    <?php
      $totalPrecio += $registro["precio_detalle"];
      $totalCantidad += $registro["cantidad_detalle"];
    }
    ?>
    <div class="row text-center">
      <div class="col-12 col-md-3 p-2">
      </div>
      <div class="col-12 col-md-3 border p-2">
        <p id="totalTb"><span>Total: </span>$<?= $totalPrecio ?></p>
      </div>
      <div class="col-12 col-md-3 border p-2">
        <p id="totalAmountTb"><span>Items: </span><?= $totalCantidad ?></p>
      </div>
      <div class="col-12 col-md-3 p-2">
      </div>
    </div>
  </div>
</div>
<?php
include("pedidos/mapaEntrega.php");
?>
