<div style="background-color: #ded8ca; min-height: 70vh;" class="py-4">
  <main class="d-flex justify-content-center px-2">
    <div class="w-100 w-md-75 w-lg-50">

      <h2 class="text-center mb-4"><?= $titulo ?> - ID #<?= $venta_id ?></h2>

      <div class="table-responsive">
        <table class="table table-bordered align-middle text-center">
          <thead class="table-light">
            <tr>
              <th>Producto</th>
              <th>Precio Unitario</th>
              <th>Cantidad</th>
              <th>Subtotal</th>
            </tr>
          </thead>
          <tbody>
            <?php 
              $total = 0;
              foreach ($detalles as $item): 
              $subtotal = $item['cantidad'] * $item['precio'];
              $total += $subtotal;
            ?>
              <tr>
                <td><?= $item['producto_nombre'] ?></td>
                <td>$<?= number_format($item['precio'], 2) ?></td>
                <td><?= $item['cantidad'] ?></td>
                <td>$<?= number_format($subtotal, 2) ?></td>
              </tr>
            <?php endforeach ?>
          </tbody>
        </table>
      </div>

      <div class="text-end mt-3">
        <h4>Total de la Venta: <strong>$<?= number_format($total, 2) ?></strong></h4>
        <a href="<?= base_url('ventas') ?>" class="btn btn-secondary">Volver</a>
      </div>
      
      
    </div>
  </main>
</div>
