<?php $validation = \Config\Services::validation(); ?>

<div class="d-flex justify-content-center mt-4 mb-5 px-3">
  <div class="col-11 col-sm-10 col-md-8 col-lg-10 col-xl-8 p-4 rounded shadow">
    <h2 class="text-center mb-4">Alta de Productos</h2>

    <?php if (session()->getFlashdata('fail')): ?>
        <div class="alert alert-danger text-center"><?= session()->getFlashdata('fail'); ?></div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success text-center"><?= session()->getFlashdata('success'); ?></div>
    <?php endif; ?>

    <form action="<?= base_url('/enviar-prod'); ?>" method="post" enctype="multipart/form-data">
      <?= csrf_field(); ?>

      <!-- Nombre -->
      <div class="mb-3">
        <label for="nombre_prod" class="form-label">Nombre del producto</label>
        <input type="text" class="form-control" name="nombre_prod" id="nombre_prod"
               value="<?= set_value('nombre_prod'); ?>" placeholder="Nombre del producto" required>
        <?= $validation->showError('nombre_prod', 'custom_error') ?>
      </div>

      <!-- Categoría -->
      <div class="mb-3">
        <label for="categoria" class="form-label">Categoría</label>
        <select class="form-select" name="categoria" id="categoria" required>
          <option value="">Seleccionar categoría</option>
          <?php foreach ($categorias as $categoria): ?>
              <option value="<?= $categoria['id']; ?>" <?= set_select('categoria', $categoria['id']); ?>>
                  <?= esc($categoria['descripcion']); ?>
              </option>
          <?php endforeach; ?>
        </select>
        <?= $validation->showError('categoria', 'custom_error') ?>
      </div>

      <!-- Precio de costo -->
      <div class="mb-3">
        <label for="precio" class="form-label">Precio de costo</label>
        <input type="number" step="0.01" class="form-control" name="precio" id="precio"
               value="<?= set_value('precio'); ?>" required>
        <?= $validation->showError('precio', 'custom_error') ?>
      </div>

      <!-- Precio de venta -->
      <div class="mb-3">
        <label for="precio_vta" class="form-label">Precio de venta</label>
        <input type="number" step="0.01" class="form-control" name="precio_vta" id="precio_vta"
               value="<?= set_value('precio_vta'); ?>" required>
        <?= $validation->showError('precio_vta', 'custom_error') ?>
      </div>

      <!-- Stock mínimo -->
      <div class="mb-3">
        <label for="stock_min" class="form-label">Stock mínimo</label>
        <input type="number" class="form-control" name="stock_min" id="stock_min"
               value="<?= set_value('stock_min'); ?>" required>
        <?= $validation->showError('stock_min', 'custom_error') ?>
      </div>

      <!-- Stock actual -->
      <div class="mb-3">
        <label for="stock" class="form-label">Stock actual</label>
        <input type="number" class="form-control" name="stock" id="stock"
               value="<?= set_value('stock'); ?>" required>
        <?= $validation->showError('stock', 'custom_error') ?>
      </div>

      <!-- Imagen -->
      <div class="mb-3">
        <label for="imagen" class="form-label">Imagen del producto</label>
        <input type="file" class="form-control" name="imagen" id="imagen" accept="image/*" required>
        <?= $validation->showError('imagen', 'custom_error') ?>
      </div>

      <!-- Botones -->
      <div class="text-center mt-4 d-flex flex-wrap justify-content-center gap-2">
        <button type="submit" class="btn btn-success">Guardar</button>
        <button type="reset" class="btn btn-danger">Cancelar</button>
        <a href="<?= base_url('producto'); ?>" class="btn btn-secondary">Volver</a>
      </div>
    </form>
  </div>
</div>

