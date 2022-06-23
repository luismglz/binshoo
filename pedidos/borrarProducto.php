<?php
$id = $_GET["id"];
$idDetalle = $_GET["idDetalle"];
$idProducto = $_GET["idProducto"];

$consulta  = " SELECT * FROM tb_productos WHERE id_producto = ? ";
$query = $conn->prepare($consulta);
$query->bindParam(1, $idProducto);
$query->execute();
$registro = $query->fetch();

$consulta3  = " UPDATE tb_pedidos SET
                    total_pedido = total_pedido - ?
                    WHERE id_pedido = ? ";
$query3 = $conn->prepare($consulta3);
$query3->bindParam(1, $registro["precio_producto"]);
$query3->bindParam(2, $id);
$query3->execute();

$consulta2  = " DELETE FROM tb_detalle 
                    WHERE id_detalle = ?";
$query2 = $conn->prepare($consulta2);
$query2->bindParam(1, $idDetalle);
$query2->execute();
?>
<script>
  window.location.href = "?seccion=pedidos&accion=detalle&id=<?= $id ?>";
</script>