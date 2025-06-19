<div class="container mt-4 mb-4 p-4">

    <h2 class="text-center mb-4 display-4">Usuarios Dados de Baja</h2>

    <?php if(session()->getFlashdata('success')): ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>

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
            <?php if (!empty($usuarios)): ?>
            <?php foreach($usuarios as $usuario): ?>
            <tr>
                <td><?= esc($usuario['perfil']) ?></td>
                <td><?= esc($usuario['nombre']) ?></td>
                <td><?= esc($usuario['apellido']) ?></td>
                <td><?= esc($usuario['email']) ?></td>
                <td>
                    <a href="<?= base_url('dar_alta/'.$usuario['id_usuario']) ?>" class="btn btn-sm btn-success">Dar de alta</a>
                </td>
            </tr>

            <?php endforeach; ?>
            <?php else: ?>
            <tr>
                <td colspan="5" class="text-center py-4 text-muted">
                    No hay usuarios dados de baja.
                </td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>
    <div class="text-end mt-3">
        <a href="<?= base_url('usuarios') ?>" class="btn btn-secondary">Volver</a>
      </div>
    <!-- mantiene al footer al pie de pagina aunque este vacia la lista -->
    <?php if (empty($usuarios) || count($usuarios) < 4): ?>
        <div style="height: 23vh;"></div>
    <?php endif; ?>


</div>
