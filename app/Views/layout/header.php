<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $this->renderSection('title') ?: 'Gestión de Proyectos' ?></title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?= site_url('/') ?>">Gestión</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mainNav">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="<?= site_url('customers') ?>">Clientes</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= site_url('projects') ?>">Proyectos</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= site_url('tasks') ?>">Tareas</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="container py-4">
        <!-- Título opcional que puede sobre-escribir cada vista -->
        <h1 class="mb-4"><?= $this->renderSection('title') ?: '' ?></h1>

        <!-- Mensajes genéricos -->
        <?php if (session('msg')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= session('msg') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <!-- Contenido específico de cada vista -->