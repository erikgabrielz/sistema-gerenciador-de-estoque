<?php
    define("ENVIRONMENT", "development");
    define("APP_NAME", "ManutençãoPro");

    //tables

    define("TABLES", ["Brand", "Category", "Extra", "Product", "Type", "Supplier"]);
    define("TABLES_PT", ["Marca", "Categoria", "Adicionais", "Modelo do celular", "Tipo", "Fornecedor"]);

    global $config;
    $config = array();

    if(ENVIRONMENT == 'development'){
        define("BASE_URL", "http://localhost:8080");
        $config['dbname'] = 'stock';
        $config['host'] = 'localhost';
        $config['dbuser'] = 'root';
        $config['dbpass'] = '';
    }elseif(ENVIRONMENT == 'production'){
        define("BASE_URL", "http://estoque.unaux.com");
        $config['dbname'] = 'ezyro_38718018_stock';
        $config['host'] = 'sql210.ezyro.com';
        $config['dbuser'] = 'ezyro_38718018';
        $config['dbpass'] = 'f7817e91ff';
    }
?>