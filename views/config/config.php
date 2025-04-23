<?php
    require_once("views/header.php");
?>

<section class="container">
    <article class="title-container">
        <div class="flex justify center title">
            <h1>Configurações</h1>
        </div>
    </article>

    <?php if(isset($_SESSION['message']) && !empty($_SESSION['message']) && $_SESSION['message']['status'] == "success"): ?>
        <article id="home-msg" class="alert-msg success">
            <div><?php echo $_SESSION['message']['text']; unset($_SESSION['message']); ?></div>
        </article>
    <?php elseif(isset($_SESSION['message']) && !empty($_SESSION['message']) && $_SESSION['message']['status'] == "error"): ?>
        <article id="home-msg" class="alert-msg error">
            <div><?php echo $_SESSION['message']['text']; unset($_SESSION['message']); ?></div>
        </article>
    <?php endif; ?>

    <article id="config-form">
        <form method="POST" action="<?php echo BASE_URL; ?>/configuracoes/updateUser">
            <input type="hidden" name="id" id="id" value="<?php echo $_COOKIE['id']; ?>" />
            <input class="input" type="text" name="user" id="user" placeholder="Nome de usuário" disabled value="<?php echo $_COOKIE['user']; ?>"/>
            
            <input class="input" type="email" name="email" id="email" placeholder="E-mail" value="<?php echo $_COOKIE['email']; ?>"/>
            <div id="email-message"></div>
            
            <input class="input" type="password" name="password" id="password" placeholder="Nova senha" maxlength="8"/>
            <div id="pass-message"></div>
            
            <input class="input" type="password" name="confirm-password" id="confirm-password" placeholder="confirme a nova senha" maxlength="8" />
            <div id="confirm-pass-message"></div>
            
            <input class="button" type="submit" value="Salvar" />
        </form>
    </article>

    <article class="logout-button">
        <a href="<?php echo BASE_URL; ?>/login/logout"><button class="button">Sair</button></a>
    </article>
</section>

<?php
    require_once("views/footer.php");
?>

