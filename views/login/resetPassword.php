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

    <noscript>Você precisa habilitar o JavaScript para acessar a página</noscript>
</head>
<body>
    <?php 
        if(isset($_SESSION['user-logged'])){
            header("Location: /");
        }
    ?>

    <section class="flex center column container">
        <article class="flex center" id="icon">
            <img class="icon" src="<?php echo BASE_URL; ?>/assets/media/tool.png"/>
            <p><?php echo APP_NAME; ?></p>
        </article>

        <article id="form">
            <form id="form-reset" action="<?php echo BASE_URL."/login/auth"?> " method="POST" valid="true">
                
                <input class="input" type="text" name="user" id="user" placeholder="Nome de usuário" value="<?php echo isset($_SESSION['input-name']) ? $_SESSION['input-name'] : ""; ?>" maxlength="4" />
                <div class="validate-message" id="user-message">
                    <?php
                        if(isset($_SESSION['user-message'])){
                            echo $_SESSION['user-message'];
                        }
                    ?>
                </div>

                <input class="input" type="email" name="email" id="email" placeholder="E-mail" autocomplete="off" />
                <div class="validate-message" id="email-message">
                    <?php
                        if(isset($_SESSION['email-message'])){
                            echo $_SESSION['email-message'];
                        }
                    ?>
                </div>
                
                <input class="button"type="submit" value="Alterar senha" />

                <p class="link"><a href="/login">Entrar</a></p>
            </form>
        </article>
    </section>

    <footer>
        <script src="<?php echo BASE_URL; ?>/assets/js/config.js"></script>
        <script src="<?php echo BASE_URL; ?>/assets/js/ValidateInputs.js"></script>
    </footer>
</body>
</html>