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
    <?php 
        if(isset($_COOKIE['user-logged'])){
            header("Location: /");
        }
    ?>

    <section class="flex center column container">
        <article class="flex center" id="icon">
            <img class="icon" src="<?php echo BASE_URL; ?>/assets/media/tool.png"/>
            <p><?php echo APP_NAME; ?></p>
        </article>

        <article id="form">
            <form id="form-updatePassword" action="<?php echo BASE_URL."/login/auth"?> " method="POST" valid="true">
                
                <input class="input" type="password" name="password" id="password" placeholder="Nova senha" maxlength="8" />
                <div class="validate-message" id="password-message">
                    <?php
                        if(isset($_SESSION['password-message'])){
                            echo $_SESSION['password-message'];
                        }
                    ?>
                </div>

                <input class="input" type="password" name="confirm-password" id="confirm-password" placeholder="Confirme a nova senha" maxlength="8" />
                <div class="validate-message" id="confirm-password-message">
                    <?php
                        if(isset($_SESSION['confirm-password-message'])){
                            echo $_SESSION['confirm-password-message'];
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
        <script src="<?php echo BASE_URL; ?>/assets/js/passwordValid.js"></script>
    </footer>
</body>
</html>