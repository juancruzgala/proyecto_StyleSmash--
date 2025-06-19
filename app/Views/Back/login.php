<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión | StyleSmash</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap y tu hoja de estilo -->
    <link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/miestiloBack.css') ?>" rel="stylesheet">
</head>
<body class="body-login">

<div class="container-login">
    <div class="card-login">
        <h3 class="titulo-login">Iniciar Sesión</h3>

        <!-- Mensaje de error (si lo hay) -->
        <?php if(session()->getFlashdata('msg')): ?>
            <div class="alert alert-danger text-center">
                <?= session()->getFlashdata('msg') ?>
            </div>
        <?php endif; ?>

        <!-- Formulario -->
        <form action="<?= base_url('/enviarlogin') ?>" method="post">
            <?= csrf_field() ?>

            <div class="form-group-login">
                <label for="email" class="form-label">Correo electrónico</label>
                <input type="email" name="email" id="email" class="form-control-login" placeholder="usuario@ejemplo.com" required>
            </div>

            <div class="form-group-login">
                <label for="pass" class="form-label">Contraseña</label>
                <input type="password" name="pass" id="pass" class="form-control-login" placeholder="********" required>
            </div>

            <div class="boton-login">
                <button type="submit" class="btn btn-login">Ingresar</button>
            </div>
        </form>

        <div class="text-center mt-3">
            <a class="link-registro" href="<?= base_url('/registro') ?>">¿No tenés cuenta? Registrate</a>
        </div>
    </div>
</div>

</body>
</html>
