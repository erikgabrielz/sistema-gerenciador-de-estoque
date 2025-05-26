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
        <script src="<?php echo BASE_URL; ?>/assets/js/alerts.js"></script>
        <script src="<?php echo BASE_URL; ?>/assets/js/loading.js"></script>
        <script src="<?php echo BASE_URL; ?>/assets/js/hideNotifications.js"></script>
        <script src="<?php echo BASE_URL; ?>/assets/js/formatPrice.js"></script>
        <script src="<?php echo BASE_URL; ?>/assets/js/ValidateInputs.js"></script>
        <script src="<?php echo BASE_URL; ?>/assets/js/ValidateFormAddStock.js"></script>
        <script src="<?php echo BASE_URL; ?>/assets/js/database_population.js"></script>
    </footer>
</body>
</html>