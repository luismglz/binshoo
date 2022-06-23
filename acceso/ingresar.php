<div class="container-fluid">
	<div class="container my-5">
		<div class="row">
			<div class="col-12 text-center">
				<h1>Login</h1>
			</div>
		</div>
		<?php
		if (isset($_GET["mensaje"])) {
		?>
			<div class="row">
				<div class="col-12">
					<div class="alert alert-danger">
						<a href="#" class="close" data-dismiss="alert">&times;</a>
						<strong>Incorrect data. Please provide a valid email address and password.</strong> Try again.
					</div>
				</div>
			</div>
		<?php } ?>
		<div class="row">
			<div class="col-12 p-3 p-md-5">
				<form id="formulario" class="ingresa" action="?seccion=acceso&amp;accion=valida" method="post">
					<fieldset>
						<div class="row">
							<div class="col-12 text-center">
								<p>
									Please enter your credentials
								</p>
							</div>
						</div>
						<div class="row p-2">
							<div class="col-md-4"></div>
							<div class="col-12 col-md-4">
								<label for="email">Email</label>
								<input type="text" required name="email" id="correo" class="form-control shadow-sm" placeholder="Enter your email" />
							</div>
							<div class="col-md-4"></div>
						</div>
						<div class="row p-2">
							<div class="col-md-4"></div>
							<div class="col-12 col-md-4">
								<label for="contrasenia">Password</label>
								<input type="password" required name="contrasenia" id="contrasena" class="form-control shadow-sm" placeholder="Enter your password">
							</div>
							<div class="col-md-4"></div>
						</div>
						<div class="row p-2">
							<div class="col-md-4"></div>
							<div class="col-12 col-md-4 text-center">
								<button class="btnForm hvr-shrink" type=" submit" class="hvr-grow">Login</button>
							</div>
							<div class="col-md-4"></div>
						</div>
					</fieldset>
				</form>
				<div class="row mt-5">
					<div class="col-md-12 text-center">
						<p class="mt-3"><a class="link-login" href="?seccion=acceso&accion=recordar" class="text-danger">Forgot your password?</a></p>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 text-center">
						<p class="mt-3"><a class="link-login" href="?seccion=acceso&accion=registrar" class="text-danger">Don't have an account?<strong> Sign up</strong></a></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>