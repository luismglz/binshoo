<?php
if (isset($_SESSION["id"])) {
  $id = $_SESSION["id"];
  $consulta  = "SELECT * FROM tb_usuarios WHERE id_usuario=? ";
  $query = $conn->prepare($consulta);
  $query->bindParam(1, $id);
  $query->execute();
  $registro = $query->fetch();
?>
  <section class="parent-section" id="myAccountSection">
    <div class="container-fluid py-5">
      <div class="row">
        <div class="col-12 text-center">
          <h1>My Account</h1>
        </div>
      </div>
    </div>

    <div class="container-fluid mb-5">

      <div class="container">
        <div class="row" id="mainRowFormMyAccount">
          <div class="col-md-6">
            <form action="?seccion=acceso&accion=actualizar" id="myAccountForm" method="post">
              <fieldset>
                <div class="row mt-2">
                  <div class="col-12 form-input-row">
                    <label class="label-form" for="nombre">Full Name:</label>
                    <input type="text" required name="nombre" id="nombre" class="form-control input-form" size="80" maxlength="80" value="<?php echo $registro['nombre']; ?>" />
                  </div>
                  <div class="col-12 form-input-row">
                    <label class="label-form" for="email">Email:</label>
                    <input type="email" required name="email" id="usuario" class="form-control input-form" value="<?php echo $registro['email']; ?>">
                  </div>
                  <div class="col-12 form-input-row">
                    <label class="label-form" for="contrasenia">Password:</label>
                    <input type="password" required name="contrasenia" id="contrasenia" class="form-control input-form" size="80" maxlength="80" value="<?= $registro['contrasenia'] ?>">
                  </div>
                </div>
                <div class="row mt-2">
                  <div class="col-12 text-center">
                    <button type="submit" class="btnForm">Update settings</button>
                  </div>
                </div>
              </fieldset>
            </form>
          </div>
        </div>
      </div>
    </div>
  <?php
} else {
  ?>
    <div class="container-fluid py-5">
      <div class="row">
        <div class="col-12 text-center">
          <h1>Unauthorized access</h1>
        </div>
      </div>
    </div>
    <div class="container-fluid">
      <div class="container">
        <div class="row">
          <div class="col-12 py-3">
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
              <strong>User credentials error! </strong>You do not have access to this module..
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

<?php
}
?>