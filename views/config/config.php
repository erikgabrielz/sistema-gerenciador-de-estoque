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
        <form method="POST" id="email-from" action="<?php echo BASE_URL; ?>/configuracoes/updateUser">
            <input type="hidden" name="id" value="<?php echo $_COOKIE['id']; ?>" />
            
            <label class="label" for="user">Nome de usuário</label>
            <input class="input" type="text" name="user" id="user" placeholder="Nome de usuário" disabled value="<?php echo $_COOKIE['user']; ?>"/>
            
            <label class="label" for="email">E-mail</label>
            <input class="input" type="email" name="email" id="email" placeholder="E-mail" value="<?php echo $_COOKIE['email']; ?>"/>
            <div class="validate-message" id="email-message"></div>
            
            <input class="button" type="submit" value="Alterar e-mail" />
        </form>

        <form method="POST" id="password-from" action="<?php echo BASE_URL; ?>/configuracoes/updateUser">
            <input type="hidden" name="id" value="<?php echo $_COOKIE['id']; ?>" />
            
            <label class="label" for="password">Nova senha</label>
            <input class="input" type="password" name="password" id="password" maxlength="8"/>
            <div class="validate-message" id="password-message"></div>
            
            <label class="label" for="confirm-password">Confirme a nova senha</label>
            <input class="input" type="password" name="confirm-password" id="confirm-password" maxlength="8" />
            <div class="validate-message" id="confirm-password-message"></div>
            
            <input class="button" type="submit" value="Alterar senha" />
        </form>
    </article>

    <article class="logout-button">
        <a href="<?php echo BASE_URL; ?>/login/logout"><button class="button">Sair</button></a>
    </article>
</section>

<?php
    require_once("views/footer.php");
?>

