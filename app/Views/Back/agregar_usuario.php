<div class="container py-4">
  <div class="row justify-content-center">
    <div class="col-12 col-sm-10 col-md-10 col-lg-10 col-xl-10 p-4 rounded shadow">

      <h2 class="text-center mb-4 display-4">Agregar Usuario</h2>

      <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
      <?php endif; ?>

      <form action="<?= base_url('guardar_usuario') ?>" method="post">
        <div class="mb-3">
          <label for="nombre" class="form-label">Nombre</label>
          <input type="text" name="nombre" class="form-control" required>
        </div>

        <div class="mb-3">
          <label for="apellido" class="form-label">Apellido</label>
          <input type="text" name="apellido" class="form-control" required>
        </div>

        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" name="email" class="form-control" required>
        </div>

        <div class="mb-3">
          <label for="usuario" class="form-label">Usuario</label>
          <input type="text" name="usuario" class="form-control" required>
        </div>

        <div class="mb-3">
          <label for="pass" class="form-label">Contraseña</label>
          <input type="password" name="pass" class="form-control" required>
        </div>

        <div class="mb-3">
          <label for="id_perfil" class="form-label">Perfil</label>
          <select name="id_perfil" class="form-select" required>
            <?php foreach ($perfiles as $perfil): ?>
              <option value="<?= $perfil['id_perfil'] ?>"><?= esc($perfil['descripcion']) ?></option>
            <?php endforeach; ?>
          </select>
        </div>

        <div class="d-flex justify-content-end">
          <a href="<?= base_url('usuarios') ?>" class="btn btn-secondary me-2">Cancelar</a>
          <button type="submit" class="btn btn-success">Guardar</button>
        </div>
      </form>
    </div>
  </div>
</div>
