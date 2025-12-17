<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
<h2>Clientes</h2>
<a href="<?= site_url('customers/new') ?>" class="btn btn-primary mb-3">Nuevo</a>

<?php if (session('msg')): ?>
    <div class="alert alert-success"><?= session('msg') ?></div>
<?php endif; ?>

<table class="table table-sm">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Email</th>
            <th width="20%"></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($customers as $c): ?>
            <tr>
                <td><?= $c['id'] ?></td>
                <td><?= esc($c['name']) ?></td>
                <td><?= esc($c['email']) ?></td>
                <td>
                    <a href="<?= site_url('customers/' . $c['id'] . '/edit') ?>" class="btn btn-sm btn-warning">Editar</a>
                    <form method="post" action="<?= site_url('customers/' . $c['id']) ?>" style="display:inline">
                        <input type="hidden" name="_method" value="DELETE">
                        <button class="btn btn-sm btn-danger" onclick="return confirm('¿Borrar?')">Borrar</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?= $this->endSection() ?>