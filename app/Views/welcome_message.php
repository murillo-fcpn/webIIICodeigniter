<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
<div class="text-center mt-5">
    <h2>Sistema de gestion de Construcciones</h2>
    <img src="<?= base_url('assets/img/Logo UMSA.png') ?>" alt="Logo" width="200" class="my-4">
    <p class="lead">Desarrollado por:</p>
    <ul class="list-unstyled">
        <li>Eidan Leonel Condori Villca</li>
        <li>Israel Elias Murillo Flores</li>
        <li>Marioly Giselle Tolay Candia</li>
    </ul>
    <p class="mt-4 text-muted">Fecha: <?= date('Y-m-d') ?> </p>
</div>

<?= $this->endSection() ?>