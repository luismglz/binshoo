<div class="container-fluid my-5">
  <div class="container">
    <div class="row">
      <div class="col-12 text-center">
        <h1>FORGOT YOUR PASSWORD?</h1>
      </div>
    </div>
    <?php
    if (isset($_GET["mensajeolvido"])) {
    ?>
      <div class="alert alert-warning">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        <strong>The registered email address was not found.</strong> Try again.
      </div>

    <?php } ?>
    <div class="row">
      <div class="col-12 p-3">
        <form id="formulario" class="ingresa" action="?seccion=acceso&accion=enviarContrasena" method="post">
          <fieldset>
            <div class="row p-2">
              <div class="col-12 col-md-4"></div>
              <div class="col-12 col-md-4 text-center">
                <p>Send my password to my email address:</p>
                <p><input type="email" name="usuario" id="usuario" required class="form-control" placeholder="Por favor ingrese su usuario"></p>
                <button type="submit" class="btn btn-danger hvr-grow">Send</button>
              </div>
              <div class="col-12 col-md-4"></div>
            </div>
          </fieldset>
        </form>
      </div>
    </div>

  </div>
</div>