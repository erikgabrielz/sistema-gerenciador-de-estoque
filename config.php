<?php
    define("ENVIRONMENT", "development_2");
    define("APP_NAME", "ManutençãoPro");

    //tables
    define("TABLES", ["Brand", "Category", "Extra", "Product", "Type", "Supplier"]);
    define("TABLES_PT", ["Marca", "Categoria", "Adicionais", "Modelo do celular", "Tipo", "Fornecedor"]);
    define("STOCK_COLUMNS", ["brand", "category", "extra", "product", "type", "supplier", "price", "quantity"]);
    DEFINE("CLIENT_IP", isset($_SERVER['HTTP_CLIENT_IP']) ? $_SERVER['HTTP_CLIENT_IP'] : (isset($_SERVER['HTTP_X_FORWARDED_FOR']) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR']));

    global $config;
    $config = array();

    if(ENVIRONMENT == 'development_1'){
        define("BASE_URL", "http://localhost");
        $config['dbname'] = 'warehouse';
        $config['host'] = 'localhost';
        $config['dbuser'] = 'root';
        $config['dbpass'] = '';
    }elseif(ENVIRONMENT == 'development_2'){
        define("BASE_URL", "http://localhost:8080");
        $config['dbname'] = 'warehouse';
        $config['host'] = 'localhost';
        $config['dbuser'] = 'root';
        $config['dbpass'] = '';
    }elseif(ENVIRONMENT == 'production'){
        define("BASE_URL", "http://estoque.unaux.com");
        $config['dbname'] = 'ezyro_38718018_warehouse';
        $config['host'] = 'sql210.ezyro.com';
        $config['dbuser'] = 'ezyro_38718018';
        $config['dbpass'] = 'f7817e91ff';
    }
?>