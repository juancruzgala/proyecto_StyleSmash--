<!-- productos.php - Vista de listado de productos -->
<main class="container my-5">
  <div class="container mt-3 mb-4 p-4 bg-cream rounded shadow">

    <h2 class="text-center mb-4 display-4">Lista de Productos</h2>

    <?php if(session()->getFlashdata('success')): ?>
      <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>

    <div class="row justify-content-end mb-3">
  <div class="col-12 col-md-auto d-flex flex-column flex-md-row justify-content-end gap-2">
    <a href="<?= base_url('crear') ?>" class="btn btn-success px-4">Agregar</a>
    <a href="<?= base_url('eliminados') ?>" class="btn btn-danger px-4">Eliminados</a>
  </div>
</div>


    <div class="table-responsive">
      <table class="table table-bordered table-hover table-light table-sm text-center" id="tablaProductos">
        <thead class="thead-dark">
          <tr>
            <th>ID</th>
            <th>Producto</th>
            <th>Precio</th>
            <th>Precio Venta</th>
            <th>Stock</th>
            <th>Imagen</th>
            <th>Acción</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($producto as $row): ?>
            <tr>
              <td><?= $row['id']; ?></td>
              <td><?= esc($row['nombre_prod']); ?></td>
              <td>$<?= number_format($row['precio'], 2, ',', '.'); ?></td>
              <td>$<?= number_format($row['precio_vta'], 2, ',', '.'); ?></td>
              <td><?= $row['stock']; ?></td>
              <td>
                <?php
                  $ruta = 'assets/img/' . $row['imagen'];
                  if (is_file($ruta)): ?>
                    <img src="<?= base_url($ruta) ?>" width="60" height="60" class="img-thumbnail">
                <?php else: ?>
                    <span class="text-muted">Sin imagen</span>
                <?php endif; ?>
              </td>
              <td>
                <div class="d-flex flex-column flex-md-row justify-content-center gap-1">
                  <a href="<?= base_url('editar/' . $row['id']) ?>" class="btn btn-success btn-sm">Editar</a>
                  <a href="<?= base_url('borrar/' . $row['id']) ?>" class="btn btn-secondary btn-sm"
                     onclick="return confirm('¿Estás seguro de eliminar este producto?')">
                    <span class="d-none d-md-inline">Borrar</span>
                    <span class="d-inline d-md-none">🗑️</span>
                  </a>
                </div>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>

  </div>
</main>

