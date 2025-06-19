<div class="container mt-4 mb-5 p-4 bg-light rounded shadow">
    <h2 class="text-center mb-4 display-5">Productos Eliminados</h2>

    <?php if(session()->getFlashdata('success')): ?>
        <div class="alert alert-success text-center"><?= session()->getFlashdata('success'); ?></div>
    <?php endif; ?>

    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-dark text-center">
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
                <?php foreach($producto as $prod): ?>
                    <?php if($prod['eliminado'] == 'SI'): ?>
                        <tr class="text-center">
                            <td><?= $prod['id'] ?></td>
                            <td><?= esc($prod['nombre_prod']) ?></td>
                            <td>$<?= number_format($prod['precio'], 2, ',', '.') ?></td>
                            <td>$<?= number_format($prod['precio_vta'], 2, ',', '.') ?></td>
                            <td><?= $prod['stock'] ?></td>
                            <td>
                                <img src="<?= base_url('assets/img/' .$prod['imagen']) ?>" class="img-fluid rounded" style="max-width: 60px;">
                            </td>
                            <td>
                                <div class="d-flex flex-column flex-md-row justify-content-center gap-2">
                                    <a href="<?= base_url('activar_pro/'.$prod['id']) ?>" class="btn btn-success btn-sm">
                                        <span class="d-none d-md-inline">Activar</span>
                                        <span class="d-inline d-md-none">✔</span>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div class="mt-4 text-center">
        <a href="<?= base_url('/producto') ?>" class="btn btn-secondary">Volver</a>
    </div>
</div>
