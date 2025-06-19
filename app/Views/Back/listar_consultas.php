<style>
    nav{
        background-color:rgb(39, 39, 38);
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    body{
    background-color:rgb(223, 215, 197);
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}
</style>
<main class="container my-5 display-4">
  <h2 class="mb-4 display-4">Consultas Recibidas</h2>

  <?php if (session()->getFlashdata('mensaje')): ?>
    <div class="alert alert-success"><?= session()->getFlashdata('mensaje') ?></div>
  <?php endif; ?>

  <table class="table table-bordered">
    <thead class="table-dark">
      <tr>
        <th>ID</th>
        <th>Usuario</th>
        <th>Mensaje</th>
        <th>Fecha</th>
        <th>Respondida</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($consultas as $consulta): ?>
        <tr>
  <td><?= $consulta['id_consulta'] ?></td>
  <td><?= esc($consulta['nombre']) . ' ' . esc($consulta['apellido']) ?></td>
  <td><?= esc($consulta['mensaje']) ?></td>
  <td><?= $consulta['fecha'] ?? 'N/A' ?></td>
  <td><?= $consulta['respuesta'] ?></td>
  <td>
    <?php if ($consulta['respuesta'] === 'NO'): ?>
      <a href="<?= base_url('/consulta/atender/' . $consulta['id_consulta']) ?>" class="btn btn-success btn-sm">Marcar como Atendida</a>
    <?php endif; ?>
    <a href="<?= base_url('/consulta/eliminar/' . $consulta['id_consulta']) ?>" class="btn btn-danger btn-sm">Eliminar</a>
  </td>
</tr>

      <?php endforeach; ?>
    </tbody>
  </table>
</main>
