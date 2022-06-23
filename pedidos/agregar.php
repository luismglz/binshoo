<?php

$idProducto = $_GET["idProducto"];
$idUsuario = $_SESSION["id"];

$consulta  = " SELECT * FROM tb_productos WHERE id_producto = ? ";
$query = $conn->prepare($consulta);
$query->bindParam(1, $idProducto);
$query->execute();
$registro = $query->fetch();

if (!isset($_SESSION["idPedido"])) {
  $consulta2  = " INSERT INTO tb_pedidos 
            (id_usuario, total_pedido, fecha_pedido,
            estatus_pedido, latitud_pedido, longitud_pedido) 
            VALUES (?,?,NOW(),1,0,0) ";
  $query2 = $conn->prepare($consulta2);
  $query2->bindParam(1, $idUsuario);
  $query2->bindParam(2, $registro["precio_producto"]);
  $query2->execute();

  $consulta3  = " SELECT MAX(id_pedido) as maximo FROM tb_pedidos ";
  $query3 = $conn->prepare($consulta3);
  $query3->execute();
  $registro3 = $query3->fetch();
  $_SESSION["idPedido"] = $registro3["maximo"];
} else {
  $consulta2  = " INSERT INTO tb_detalle 
            (id_producto_fk ,precio_detalle , id_pedido, cantidad_detalle) 
            VALUES (?,?,?,1) ";
  $query2 = $conn->prepare($consulta2);
  $query2->bindParam(1, $registro["id_producto"]);
  $query2->bindParam(2, $registro["precio_producto"]);
  $query2->bindParam(3, $_SESSION["idPedido"]);
  $query2->execute();

  $consulta3  = " UPDATE tb_pedidos SET
                total_pedido = total_pedido + ?
                WHERE id_pedido = ? ";
  $query3 = $conn->prepare($consulta3);
  $query3->bindParam(1, $registro["precio_producto"]);
  $query3->bindParam(2, $_SESSION["idPedido"]);
  $query3->execute();
}

?>
<script>
  window.location.href = "?seccion=pedidos&accion=detalle&id=<?= $_SESSION["idPedido"] ?>";
</script>