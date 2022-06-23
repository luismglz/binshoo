<div id="mainProductSection" class="container-fluid parent-section">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h2 class="title-section" data-aos="zoom-in-up"> PRODUCTS</h2>
            </div>
        </div>
        <div class="row">
            <?php
            if (isset($_GET["categoria"])) {
                $consulta  = " SELECT * FROM tb_productos, tb_categorias
                                       WHERE id_categoria = categoria AND categoria = ? ";
                $query = $conn->prepare($consulta);
                $query->bindParam(1, $_GET["categoria"]);
            } else {
                $consulta  = " SELECT * FROM tb_productos , tb_categorias
                                       WHERE id_categoria = categoria";
                if (isset($_POST["buscar"])) {
                    $consulta  .= " AND nombre_producto LIKE '%" . $_POST["buscar"] . "%'";
                }

                $query = $conn->prepare($consulta);
            }

            $query->execute();
            $contador = 0;
            while ($registro = $query->fetch()) {
                if (!$contador && !isset($_POST["buscar"]))
                    echo "<h3 class='text-center'>" . $registro["nombre_categoria"] . "</h3>";
                include("productos/tarjeta.php");
                $contador++;
            }

            if (!$contador)
                echo "
                <div id='noResultFound' class='row'>
                    <div class='col-12 text-center'>
                        <div >
                         <h4 class='text-center'>No products found</h4>
                         <img id='notfoundImg' src='./res/notfound.png' alt='offer product'>
                        </div>
                    </div>
                </div>";

            function checkCategoryList($categoryParam)
            {
                switch ($categoryParam["categoria"]) {
                    case 1:
                        return "Japanese Cuisine";
                        break;
                    case 2:
                        return "Chinese Cuisine";
                        break;
                    case 3:
                        return "Indian Cuisine";
                        break;
                    case 4:
                        return "Thai Cuisine";
                        break;
                    case 5:
                        return "Singaporean Cuisine";
                        break;
                    case 6:
                        return "Korean Cuisine";
                        break;
                }
                // return $category;
            }
            ?>
        </div>
    </div>
</div>