<div style="background-color: #ded8ca; min-height: 100vh;" class="py-4">
  <div class="container">
    <h2 class="text-center mb-4 display-4">Consultas</h2>

    <div class="table-responsive">
      <table class="table table-bordered table-striped align-middle text-center table-sm">
        <thead class="table-warning">
          <tr>
            <th>Nombre</th>
            <th>Email</th>
            <th>Mensaje</th>
            <th>Respondido</th>
            <th>Acción</th>
          </tr>
        </thead>
        <tbody>
          <?php if (!empty($consultas)): ?>
            <?php foreach ($consultas as $consulta): ?>
              <tr>
                <td><?= esc($consulta['nombre']) ?></td>
                <td><?= esc($consulta['email']) ?></td>
                <td class="text-break"><?= esc($consulta['mensaje']) ?></td>
                <td>
                  <span class="<?= $consulta['respondido'] === 'SI' ? 'text-success' : 'text-danger' ?>">
                    <?= esc($consulta['respondido']) ?>
                  </span>
                </td>
                <td>
                  <div class="d-flex flex-column flex-md-row justify-content-center gap-2">
                    <?php if ($consulta['respondido'] === 'NO'): ?>
                      <a href="<?= base_url('consulta/responder/' . $consulta['id_consulta']) ?>" class="btn btn-success btn-sm">
                        <span class="d-none d-md-inline">Atender</span>
                        <span class="d-inline d-md-none"><i class="bi bi-envelope-fill"></i></span> 
                      </a>
                    <?php else: ?>
                      <a href="<?= base_url('consulta/eliminar/' . $consulta['id_consulta']) ?>" class="btn btn-danger btn-sm">
                        <span class="d-none d-md-inline">Eliminar</span>
                        <span class="d-inline d-md-none">🗑️</span>
                      </a>
                    <?php endif; ?>
                  </div>
                </td>
              </tr>
            <?php endforeach; ?>
          <?php else: ?>
            <tr>
              <td colspan="5" class="text-center">No hay consultas registradas.</td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

