<main class="container my-5">
  <h2 class="mb-4 display-4 text-center">Nuestros Productos</h2>

  <?php foreach ($productos_por_categoria as $categoria => $productos): ?>
    <h3 class="mt-5 mb-3"><?= esc(ucfirst($categoria)) ?></h3>
    <div class="row">
      <?php foreach ($productos as $p): ?>
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 mb-4">
          <div class="card h-100 d-flex flex-column">
            <img src="<?= base_url('assets/img/' . $p['imagen']) ?>" class="card-img-top" alt="<?= esc($p['nombre_prod']) ?>">

            <div class="card-body flex-grow-1">
              <h5 class="card-title"><?= esc($p['nombre_prod']) ?></h5>
              <p class="card-text">$<?= number_format($p['precio_vta'], 0, ',', '.') ?></p>
            </div>

            <div class="card-footer bg-transparent border-0">
              <form action="<?= base_url('carrito/agregar/' . $p['id']) ?>" method="post">
                <?= csrf_field() ?>
                <button type="submit" class="btn btn-outline-dark btn-sm w-100">Agregar al carrito</button>
              </form>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  <?php endforeach; ?>
</main>

