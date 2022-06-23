<nav class="navbar navbar-expand-lg" id="mainNavbar" style="z-index: 1000;" data-aos="zoom-in-up">
  <div class="container-fluid">
    <a class="navbar-brand" href="?seccion=inicio">
      <img src="imagenes/binshoLettermarkCutted.png" alt="Logo" id="mainLogoNavbar" class="">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav m-auto">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="?seccion=inicio">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#offersSection">Offers</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Cuisines
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <?php

            $consulta  = " SELECT * FROM tb_categorias";
            $query = $conn->prepare($consulta);
            $query->execute();
            while ($registro = $query->fetch()) {

              /* $consulta2  = " SELECT COUNT(*) as total FROM tb_productos 
                                WHERE categoria = ? ";*/
              $consulta2  = " SELECT * FROM tb_productos, tb_categorias WHERE id_categoria = ? ";
              $query2 = $conn->prepare($consulta2);
              $query2->bindParam(1, $registro["categoria"]);
              $query2->execute();
              $registro2 = $query2->fetch();

            ?>
              <li><a class="dropdown-item" href="?seccion=productos&accion=lista&categoria=<?= $registro["id_categoria"] ?>"><?= $registro["nombre_categoria"], " cuisine" ?></a></li>
            <?php
            }
            ?>
          </ul>
        </li>
        <?php
        if (isset($_SESSION["id"])) {
        ?>
          <li class="nav-item">
            <a class="nav-link" href="?seccion=pedidos&accion=lista">My orders</a>
          </li>
        <?php
        }
        ?>
        <?php
        if (!isset($_SESSION["id"])) {
        ?>
          <li class="nav-item">
            <a class="nav-link" href="?seccion=acceso">Login</a>
          </li>
        <?php
        }
        ?>
        <?php
        if (isset($_SESSION["id"])) {
        ?>
          <li class="nav-item">
            <a class="nav-link" href="?seccion=acceso&accion=micuenta">My account</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?seccion=acceso&accion=salir">Logout</a>
          </li>
        <?php
        }
        ?>
      </ul>
      <form class="d-flex" action="?seccion=productos&accion=lista" method="post">
        <input class="form-control me-2" type="search" name="buscar" placeholder="buscar..." aria-label="Search">
        <button class="btnForm" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>