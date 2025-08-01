<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>

    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>/assets/css/variables.css">
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>/assets/css/header.css">
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>/assets/css/home.css">
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>/assets/css/orders.css">
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>/assets/css/config.css">
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>/assets/css/add-items.css">
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>/assets/css/database-magement.css">
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>/assets/css/finance.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>/assets/css/select2.css">
    

    <link rel="shortcut icon" href="<?php echo BASE_URL; ?>/assets/media/tool.png" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <noscript>Você precisa habilitar o JavaScript para acessar a página</noscript>
</head>

<body>
    <header class="flex">
        <nav class="container flex center justify wrap">
            <section>
                <a href="<?php echo BASE_URL; ?>">
                    <article class="flex center" id="icon">
                        <img class="icon" src="<?php echo BASE_URL; ?>/assets/media/tool.png"/>
                        <p><?php echo APP_NAME; ?></p>
                    </article>
                </a>
            </section>

            <section>
                <article class="flex">
                    <?php if (isset($_SESSION['user-logged']) && !empty($_SESSION['user-logged'])): ?>
                        <a href="/"><img class="icon" src="<?php echo BASE_URL; ?>/assets/media/home.png"/></a>
                        <a href="/servicos"><img class="icon" src="<?php echo BASE_URL; ?>/assets/media/clipboard.png"/></a>
                        <a href="/clientes"><img class="icon" src="<?php echo BASE_URL; ?>/assets/media/client.png"/></a>
                        <a href="/financeiro"><img class="icon" src="<?php echo BASE_URL; ?>/assets/media/money.png"/></a>
                        <a href="/configuracoes"><img class="icon" src="<?php echo BASE_URL; ?>/assets/media/config.png"/></a>
                    <?php else: ?>
                        <section>
                            <article>
                                <a href="/login"><button class="button">Entrar</button></a>
                            </article>
                        </section>
                    <?php endif; ?>
                </article>
            </section>
        </nav>
    </header>