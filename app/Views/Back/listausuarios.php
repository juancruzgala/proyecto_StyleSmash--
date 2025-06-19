<!-- Inicio del cuerpo -->
<main class="container my-5">

  <div class="row justify-content-center">
    <div class="col-12 col-lg-60">

      <div class="mt-4 mb-4 p-4">

        <h2 class="text-center mb-4 display-4">Lista de Usuarios</h2>

        <?php if(session()->getFlashdata('success')): ?>
          <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
        <?php endif; ?>

        <!-- Botones superiores responsivos -->
        <div class="d-flex flex-column flex-md-row justify-content-md-end align-items-md-center gap-2 mb-3">
          <a href="<?= base_url('nuevo_usuario') ?>" class="btn btn-success">Agregar Usuario</a>
          <a href="<?= base_url('usuarios_baja') ?>" class="btn btn-secondary">Ver dados de baja</a>
        </div>

        <!-- Tabla con scroll horizontal en pantallas chicas -->
        <div class="table-responsive">
          <table class="table table-striped table-bordered text-center">
            <thead class="table-dark">
              <tr>
                <th>Perfil</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Email</th>
                <th>Acción</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($usuarios as $usuario): ?>
                <tr>
                  <td><?= esc($usuario['perfil']) ?></td>
                  <td><?= esc($usuario['nombre']) ?></td>
                  <td><?= esc($usuario['apellido']) ?></td>
                  <td><?= esc($usuario['email']) ?></td>
                  <td>
                    <?php 
                    $usuario_actual_id = session()->get('id_usuario');
                    ?>
                  
                    <?php if ($usuario['id_usuario'] != $usuario_actual_id): ?>
                      <div class="d-flex flex-column flex-md-row gap-1 justify-content-center">
                        <a href="<?= base_url('editar_usuario/'.$usuario['id_usuario']) ?>" class="btn btn-sm btn-success">Editar</a>
                        <a href="<?= base_url('dar_baja/'.$usuario['id_usuario']) ?>" class="btn btn-sm btn-danger">
                          <span class="d-none d-md-inline">Dar de baja</span>
                          <span class="d-inline d-md-none">Baja</span>
                        </a>
                      </div>
                    <?php else: ?>
                      <span class="text-muted">Sesión activa</span>
                    <?php endif; ?>
                  

                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>

        <!-- Espacio forzado si hay pocos usuarios -->
        <?php if (empty($usuarios) || count($usuarios) < 4): ?>
          <div style="height: 23vh;"></div>
        <?php endif; ?>

      </div>

    </div>
  </div>

</main>
