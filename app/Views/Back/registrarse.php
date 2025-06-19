
<?php $validation = \Config\Services::validation(); ?>
<head>
    <link href="assets/css/miestiloBack.css" rel="stylesheet">
</head>
<body>
    

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 text-center mt-5">
                <h1 class="display-4">Registrarse</h1>
            </div>
        </div>
    </div>

   <form id="registroForm" method="post" action="<?= base_url('/enviar-form') ?>">
            <div class="container d-flex justify-content-center mt-4">
                <div class="mb-2" style="width: 500px; margin-top: -20px; color: white">
                     <label for="nombre" class="form-label">Apellido</label>
                     <input name="nombre" id="nombre" type="text" class="form-control" placeholder="Nombre">
                </div>
                <!-- Mostrar error si el campo "nombre" no es válido -->
                <?php if ($validation->getError('nombre')): ?>
                    <div class="alert alert-danger mt-2">
                        <?= $validation->getError('nombre'); ?>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Campo: Apellido -->
           <div class="container d-flex justify-content-center mt-4">
                <div class="mb-2" style="width: 500px; margin-top: -20px; color: white">
                     <label for="apellido" class="form-label">Apellido</label>
                     <input name="apellido" id="apellido" type="text" class="form-control" placeholder="Apellido">
                </div>
            
                <!-- Mostrar error si el campo "apellido" no es válido -->
                <?php if ($validation->getError('apellido')): ?>
                    <div class="alert alert-danger mt-2">
                        <?= $validation->getError('apellido'); ?>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Campo: Usuario -->
           <div class="container d-flex justify-content-center mt-4">
                <div class="mb-2" style="width: 500px; margin-top: -20px; color: white">
                     <label for="usuario" class="form-label">Usuario</label>
                     <input name="usuario" id="usuario" type="text" class="form-control" placeholder="@Usuario123">
                </div>
            
                <!-- Mostrar error si el campo "Usuario" no es válido -->
                <?php if ($validation->getError('usuario')): ?>
                    <div class="alert alert-danger mt-2">
                        <?= $validation->getError('usuario'); ?>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Campo: Correo -->
           <div class="container d-flex justify-content-center mt-4">
                <div class="mb-2" style="width: 500px; margin-top: -20px; color: white">
                     <label for="email" class="form-label">Correo Electrónico</label>
                     <input name="email" id="email" type="text" class="form-control" placeholder="Ejemplo@gmail.com">
                </div>
            
                <!-- Mostrar error si el campo "Correo" no es válido -->
                <?php if ($validation->getError('email')): ?>
                    <div class="alert alert-danger mt-2">
                        <?= $validation->getError('email'); ?>
                    </div>
                <?php endif; ?>
            </div>

             <!-- Campo: Contraseña -->
           <div class="container d-flex justify-content-center mt-4">
                <div class="mb-2" style="width: 500px; margin-top: -20px; color: white">
                     <label for="pass" class="form-label">Contraseña</label>
                     <input name="pass" id="pass" type="text" class="form-control" >
                </div>
            
                <!-- Mostrar error si el campo "Contraseña" no es válido -->
                <?php if ($validation->getError('pass')): ?>
                    <div class="alert alert-danger mt-2">
                        <?= $validation->getError('pass'); ?>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Campo: Verificar contraseña -->
           <div class="container d-flex justify-content-center mt-4">
                <div class="mb-2" style="width: 500px; margin-top: -20px; color: white">
                     <label for="password2" class="form-label">Verificar Contraseña</label>
                     <input name="password2" id="pass" type="text" class="form-control" >
                </div>
            
                <!-- Mostrar error si el campo "Contraseña" no es válido -->
                <?php if ($validation->getError('password2')): ?>
                    <div class="alert alert-danger mt-2">
                        <?= $validation->getError('password2'); ?>
                    </div>
                <?php endif; ?>
            </div>

             <!-- Botón de enviar -->
            <div class="boton-registro">
                <button type="submit" class="btn btn-success">Registrarse</button>
            </div>
            
    </form>

   

</body>

