    <footer>
        <script>
            const ENVIRONMENT = "<?php echo ENVIRONMENT; ?>";

            const URLS = {
                development_1: "http://localhost",
                development_2: "http://localhost:8080",
                production: "https://estoque.unaux.com"
            };

            const BASE_URL = URLS[ENVIRONMENT];
        </script>
        <script src="<?php echo BASE_URL; ?>/assets/js/auth.js"></script>
        <script src="<?php echo BASE_URL; ?>/assets/js/getStock.js"></script>
        <script src="<?php echo BASE_URL; ?>/assets/js/getClients.js"></script>
        <script src="<?php echo BASE_URL; ?>/assets/js/alerts.js"></script>
        <script src="<?php echo BASE_URL; ?>/assets/js/loading.js"></script>
        <script src="<?php echo BASE_URL; ?>/assets/js/hideNotifications.js"></script>
        <script src="<?php echo BASE_URL; ?>/assets/js/formatPrice.js"></script>
        <script src="<?php echo BASE_URL; ?>/assets/js/ValidateInputs.js"></script>
        <script src="<?php echo BASE_URL; ?>/assets/js/ValidateFormAddStock.js"></script>
        <script src="<?php echo BASE_URL; ?>/assets/js/get_uf_and_city.js"></script>
        <script src="<?php echo BASE_URL; ?>/assets/js/verifyCPF.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script src="https://unpkg.com/imask"></script>
        <script src="<?php echo BASE_URL; ?>/assets/js/select2.js"></script>
    </footer>
</body>
</html>