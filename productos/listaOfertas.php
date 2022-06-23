<div id="offersSection" class="container-fluid parent-section">
  <div class="container">
    <div class="row">
      <div class="col-12 text-center mt-3">
        <h2 class="title-section" data-aos="zoom-in-up">OFFERS</h2>
      </div>
    </div>
    <div class="row">
      <?php
      $consulta  = "SELECT * FROM tb_productos WHERE is_top_selling = 1";
      $query = $conn->prepare($consulta);
      $query->execute();
      while ($registro = $query->fetch()) {
        include("productos/tarjeta.php");
      }

      function checkCategory($categoryParam)
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