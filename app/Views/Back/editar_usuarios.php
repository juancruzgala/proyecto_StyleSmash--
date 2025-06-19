<div class="container mt-5 mb-5 p-4 rounded shadow">

    <h2 class="text-center display-4">Editar Perfil de Usuario</h2>

    <?php if(session()->getFlashdata('success')): ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>

    <form action="<?= base_url('actualizar_usuario/'.$usuario['id_usuario']) ?>" method="post">
        <?= csrf_field() ?>

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" value="<?= esc($usuario['nombre']) ?>" disabled>
        </div>

        <div class="mb-3">
            <label for="apellido" class="form-label">Apellido</label>
            <input type="text" class="form-control" id="apellido" value="<?= esc($usuario['apellido']) ?>" disabled>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" value="<?= esc($usuario['email']) ?>" disabled>
        </div>

        <div class="mb-4">
    <label for="id_perfil" class="form-label">Rol / Perfil</label>
    <?php if ($usuario['id_usuario'] == session()->get('id_usuario')): ?>
        <!-- No editable si es el usuario actual -->
         
        <input type="text" class="form-control" value="<?= esc($usuario['perfil']) ?>" disabled>
        <input type="hidden" name="id_perfil" value="<?= esc($usuario['id_perfil']) ?>">
    <?php else: ?>
        <select name="id_perfil" id="id_perfil" class="form-select" required>
            <?php foreach ($perfiles as $perfil): ?>
                <option value="<?= $perfil['id_perfil'] ?>" <?= ($usuario['id_perfil'] == $perfil['id_perfil']) ? 'selected' : '' ?>>
                    <?= esc($perfil['descripcion']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    <?php endif; ?>
</div>


        <div class="text-end">
            <a href="<?= base_url('usuarios') ?>" class="btn btn-secondary">Cancelar</a>
            <button type="submit" class="btn btn-success">Actualizar</button>
        </div>
    </form>
</div>
