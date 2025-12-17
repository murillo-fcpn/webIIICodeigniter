<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
<h2>Tareas</h2>
<a href="<?= site_url('tasks/new') ?>" class="btn btn-primary mb-3">Nueva tarea</a>

<div class="table-responsive">
    <table class="table table-hover align-middle">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Tarea</th>
                <th>Proyecto</th>
                <th>Cliente</th>
                <th>Inicio</th>
                <th>Fin</th>
                <th>Estado</th>
                <th width="1%"></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tasks as $t): ?>
                <tr>
                    <td><?= $t['id'] ?></td>
                    <td><?= esc($t['name']) ?></td>
                    <td><?= esc($t['project_name']) ?></td>
                    <td><?= esc($t['customer_name']) ?></td>
                    <td><?= $t['start_date'] ?></td>
                    <td><?= $t['end_date'] ?: '—' ?></td>
                    <td>
                        <span class="badge bg-secondary"><?= esc($t['status_name']) ?></span>
                    </td>
                    <td>
                        <div class="d-flex gap-1">
                            <a href="<?= site_url('tasks/' . $t['id'] . '/edit') ?>"
                                class="btn btn-sm btn-warning">Editar</a>
                            <form method="post" action="<?= site_url('tasks/' . $t['id']) ?>"
                                onsubmit="return confirm('¿Borrar tarea?')">
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