<?php

session_start();

define("ENVIRONMENT", "development");
global $config;

if(ENVIRONMENT == "development"){
    $config['dbname'] = "stock";
    $config['dbhost'] = "localhost";
    $config['dbuser'] = "root";
    $config['dbpass'] = "";
}else if (ENVIRONMENT == "production"){
    // $config['dbname'] = "";
    // $config['dbhost'] = "localhost";
    // $config['dbuser'] = "root";
    // $config['dbpass'] = "";
}else{
    print("Erro na configuração com o banco de dados.");
}