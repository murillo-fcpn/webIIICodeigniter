<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>

<?php if (session('errors')): ?>
    <div class="alert alert-danger">
        <?= implode('<br>', session('errors')) ?>
    </div>
<?php endif; ?>

<form method="post" action="<?= site_url('tasks' . (isset($task) ? '/' . $task['id'] : '')) ?>">
    <?= csrf_field() ?>
    <?php if (isset($task)): ?>
        <input type="hidden" name="_method" value="PUT">
    <?php endif; ?>

    <div class="row mb-3">
        <label class="col-sm-2 col-form-label">Proyecto *</label>
        <div class="col-sm-6">
            <select name="project_id" class="form-select" required>
                <option value="">— Seleccione —</option>
                <?php foreach ($projects as $p): ?>
                    <option value="<?= $p['id'] ?>" <?= old('project_id', $task['project_id'] ?? '') == $p['id'] ? 'selected' : '' ?>>
                        <?= esc($p['name']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>

    <div class="row mb-3">
        <label class="col-sm-2 col-form-label">Nombre *</label>
        <div class="col-sm-10">
            <input type="text" name="name" class="form-control" required
                value="<?= old('name', $task['name'] ?? '') ?>">
        </div>
    </div>

    <div class="row mb-3">
        <label class="col-sm-2 col-form-label">Fecha inicio *</label>
        <div class="col-sm-4">
            <input type="date" name="start_date" class="form-control" required
                value="<?= old('start_date', $task['start_date'] ?? '') ?>">
        </div>
    </div>

    <div class="row mb-3">
        <label class="col-sm-2 col-form-label">Fecha fin</label>
        <div class="col-sm-4">
            <input type="date" name="end_date" class="form-control"
                value="<?= old('end_date', $task['end_date'] ?? '') ?>">
        </div>
    </div>

    <div class="row mb-3">
        <label class="col-sm-2 col-form-label">Estado *</label>
        <div class="col-sm-4">
            <select name="status_task_id" class="form-select" required>
                <option value="">— Seleccione —</option>
                <?php foreach ($statuses as $s): ?>
                    <option value="<?= $s['id'] ?>" <?= old('status_task_id', $task['status_task_id'] ?? '') == $s['id'] ? 'selected' : '' ?>>
                        <?= esc($s['name']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>

    <div class="text-end">
        <button class="btn btn-primary">Guardar</button>
        <a href="<?= site_url('tasks') ?>" class="btn btn-secondary">Cancelar</a>
    </div>
</form>
<?= $this->endSection() ?>