<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>

<?php if (session('errors')): ?>
    <div class="alert alert-danger">
        <?= implode('<br>', session('errors')) ?>
    </div>
<?php endif; ?>

<form method="post" action="<?= site_url('projects' . (isset($project) ? '/' . $project['id'] : '')) ?>">
    <?= csrf_field() ?>
    <?php if (isset($project)): ?>
        <input type="hidden" name="_method" value="PUT">
    <?php endif; ?>

    <div class="row mb-3">
        <label class="col-sm-2 col-form-label">Nombre *</label>
        <div class="col-sm-10">
            <input type="text" name="name" class="form-control" required
                value="<?= old('name', $project['name'] ?? '') ?>">
        </div>
    </div>

    <div class="row mb-3">
        <label class="col-sm-2 col-form-label">Ubicación</label>
        <div class="col-sm-10">
            <input type="text" name="location" class="form-control"
                value="<?= old('location', $project['location'] ?? '') ?>" placeholder="Ciudad, dirección, país…">
        </div>
    </div>

    <div class="row mb-3">
        <label class="col-sm-2 col-form-label">Cliente *</label>
        <div class="col-sm-4">
            <select name="customer_id" class="form-select" required>
                <option value="">— Seleccione —</option>
                <?php foreach ($customers as $c): ?>
                    <option value="<?= $c['id'] ?>" <?= old('customer_id', $project['customer_id'] ?? '') == $c['id'] ? 'selected' : '' ?>>
                        <?= esc($c['name']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>

    <div class="row mb-3">
        <label class="col-sm-2 col-form-label">Tipo *</label>
        <div class="col-sm-4">
            <select name="project_type_id" class="form-select" required>
                <option value="">— Seleccione —</option>
                <?php foreach ($types as $t): ?>
                    <option value="<?= $t['id'] ?>" <?= old('project_type_id', $project['project_type_id'] ?? '') == $t['id'] ? 'selected' : '' ?>>
                        <?= esc($t['name']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>

    <div class="text-end">
        <button class="btn btn-primary">Guardar</button>
        <a href="<?= site_url('projects') ?>" class="btn btn-secondary">Cancelar</a>
    </div>
</form>
<?= $this->endSection() ?>