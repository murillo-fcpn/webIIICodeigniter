<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
<h2><?= isset($customer) ? 'Editar' : 'Nuevo' ?> Cliente</h2>

<?php if (session('errors')): ?>
    <div class="alert alert-danger">
        <?= implode('<br>', session('errors')) ?>
    </div>
<?php endif; ?>

<form method="post" action="<?= site_url('customers' . (isset($customer) ? '/' . $customer['id'] : '')) ?>">
    <?= csrf_field() ?>
    <?php if (isset($customer)): ?>
        <input type="hidden" name="_method" value="PUT">
    <?php endif; ?>

    <div class="mb-3">
        <label>Nombre</label>
        <input type="text" name="name" class="form-control" value="<?= old('name', $customer['name'] ?? '') ?>"
            required>
    </div>

    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" value="<?= old('email', $customer['email'] ?? '') ?>"
            required>
    </div>

    <button class="btn btn-primary">Guardar</button>
    <a href="<?= site_url('customers') ?>" class="btn btn-secondary">Cancelar</a>
</form>
<?= $this->endSection() ?>