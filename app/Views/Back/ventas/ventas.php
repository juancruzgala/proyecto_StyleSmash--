<div class="py-4" style="background-color: #ded8ca; min-height: 100vh;">
  <div class="container">
    <h2 class="text-center mb-4 display-4">Ventas</h2>

    <!-- Tabla responsive -->
    <div class="table-responsive">
      <table class="table table-bordered text-center align-middle table-sm">
        <thead class="table-dark">
          <tr>
            <th scope="col">ID Venta</th>
            <th scope="col">Fecha</th>
            <th scope="col">Cliente</th>
            <th scope="col">Total</th>
            <th scope="col">Acciones</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($ventas as $venta): ?>
            <tr>
              <td><?= $venta['venta_id'] ?></td>
              <td><?= date('d/m/Y H:i', strtotime($venta['fecha'])) ?></td>
              <td><?= esc($venta['nombre'] . ' ' . $venta['apellido']) ?></td>
              <td>$<?= number_format($venta['total_venta'], 2, ',', '.') ?></td>
              <td>
                <a href="<?= base_url('/ventas/detalle/' . $venta['venta_id']) ?>" 
                   class="btn btn-success btn-sm w-100 w-md-auto">
                  <span class="d-none d-md-inline">Ver Detalle</span>
                  <span class="d-inline d-md-none">Detalle</span>
                </a>
              </td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </div>

    <!-- Separador inferior en móviles -->
    <?php if (count($ventas) < 5): ?>
      <div style="height: 20vh;"></div>
    <?php endif; ?>
  </div>
</div>


