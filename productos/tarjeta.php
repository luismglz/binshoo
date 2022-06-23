<div class="col-12 col-md-6 col-lg-4 col-xl-3 p-4">
    <div id="card" class="card" data-aos="flip-up">
        <img id="imageProductCard" src="<?= $registro["foto_producto"] ?>" class="" alt="offer product">
        <div class="card-body text-center">
            <h5 id="productNameCard" class=""><?= $registro["nombre_producto"] ?></h5>

            <p class="row justify-content" id="categoryCard">
                <?= empty($registro["nombre_categoria"]) ? checkCategory($registro) : ($registro["nombre_categoria"] . " Cuisine") ?>
            </p>

            <strong class="row justify-content" id="priceCard"><?= "$ " . $registro["precio_producto"] ?></strong>
            <a href="?seccion=pedidos&accion=agregar&idProducto=<?= $registro["id_producto"] ?>" class="hvr-grow" id="btnAddToCartCard">
                <i id="iconCart" class="fa-solid fa-cart-shopping"></i>Add to cart
            </a>
        </div>
    </div>
</div>