<?php
    define("ENVIRONMENT", "development");
    define("APP_NAME", "ManutençãoPro");

    global $config;
    $config = array();

    if(ENVIRONMENT == 'development'){
        define("BASE_URL", "http://localhost");
        $config['dbname'] = 'stock';
        $config['host'] = 'localhost';
        $config['dbuser'] = 'root';
        $config['dbpass'] = '';
    }else{
        define("BASE_URL", "http://estoque.unaux.com");
        $config['dbname'] = 'ezyro_38718018_stock';
        $config['host'] = 'sql210.ezyro.com';
        $config['dbuser'] = 'ezyro_38718018';
        $config['dbpass'] = 'f7817e91ff';
    }
?>