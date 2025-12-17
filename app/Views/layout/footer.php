</main><!-- cierra <main> abierto en header -->

<footer class="bg-light text-center py-3 mt-5">
    <div class="container">
        <small class="text-muted">
            &copy; <?= date('Y') ?> Gestión de Proyectos | CodeIgniter 4
        </small>
    </div>
</footer>

<!-- Bootstrap JS bundle (con Popper) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- Helpers CSRF para forms AJAX (opcional) -->
<script>
    // Envía token CSRF en cada petición fetch (si usas AJAX)
    const csrfName = '<?= csrf_token() ?>';
    const csrfHash = '<?= csrf_hash() ?>';
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
</script>
</body>

</html>