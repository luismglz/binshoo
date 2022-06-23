<div class="container-fluid py-5">
    <div class="row">
        <div class="col-12 text-center">
            <h1>Sign Up</h1>
        </div>
    </div>
    <div class="row" id="formSignup">
        <div class="col-5 p-3 p-md-5">
            <form action="?seccion=acceso&accion=insertar" id="form1" method="post">
                <fieldset>
                    <div class="row" id="mainRowFormMyAccount">
                        <div class="row pt-2">
                            <div class="col-md-4"></div>
                            <label for="name">Full Name</label>
                            <input placeholder="e.g Elio Matsuda" type="text" required name="nombre" id="nombre" class="form-control" size="80" maxlength="80">
                        </div>
                        <div class="row pt-4">
                            <div class="col-md-4"></div>
                            <label for="email">Email</label>
                            <input placeholder="e.g elio@yahoo.co.jp" type="email" required name="email" id="email" class="form-control">
                        </div>
                        <div class="row pt-4">
                            <div class="col-md-4"></div>
                            <label for="contrasenia">Password</label>
                            <input placeholder="Enter your password" type="password" required name="contrasenia" id="contrasenia" class="form-control" size="80" maxlength="80">
                        </div>
                    </div>
                    <div class="row pt-4">
                        <div class="col-12 text-center">
                            <button type="submit" class="btnForm hvr-shrink">Sign up</button>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
</div>