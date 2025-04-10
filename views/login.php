<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>

    <link rel="shortcut icon" href="<?php echo BASE_URL; ?>/assets/media/tool.png" />

    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>/assets/css/variables.css">
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>/assets/css/login.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>
    <section class="flex center column container">
        <article class="flex center" id="icon">
            <img class="icon" src="<?php echo BASE_URL; ?>/assets/media/tool.png"/>
            <p><?php echo APP_NAME; ?></p>
        </article>

        <article id="form">
            <form method="POST">
                <input class="input" type="text" name="user" id="user" placeholder="Nome de usuário" />
                <input class="input"type="password" name="pass" id="pass" placeholder="Senha" />
                <input class="button"type="submit" value="Iniciar sessão" />
                <p class="link"><a href="/redefinir">Esqueceu a senha?</a></p>
            </form>
        </article>
    </section>
</body>
</html>