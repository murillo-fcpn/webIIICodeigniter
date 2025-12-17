<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
<h2>Proyectos</h2>
<a href="<?= site_url('projects/new') ?>" class="btn btn-primary mb-3">Nuevo proyecto</a>

<div class="table-responsive">
    <table class="table table-hover align-middle">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Ubicación</th>
                <th>Cliente</th>
                <th>Tipo</th>
                <th width="1%"></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($projects as $p): ?>
                <tr>
                    <td><?= $p['id'] ?></td>
                    <td><?= esc($p['name']) ?></td>
                    <td><?= esc($p['location']) ?: '—' ?></td>
                    <td><?= esc($p['customer_name']) ?></td>
                    <td><?= esc($p['type_name']) ?></td>
                    <td>
                        <div class="d-flex gap-1">
                            <a href="<?= site_url('projects/' . $p['id'] . '/edit') ?>"
                                class="btn btn-sm btn-warning">Editar</a>
                            <form method="post" action="<?= site_url('projects/' . $p['id']) ?>"
                                onsubmit="return confirm('¿Borrar proyecto?')">
                                <input type="hidden" name="_method" value="DELETE">
                                <button class="btn btn-sm btn-danger">Borrar</button>
                            </form>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?= $this->endSection() ?>