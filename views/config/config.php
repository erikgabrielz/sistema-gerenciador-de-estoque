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
        <form method="POST" action="<?php echo BASE_URL; ?>/configuracoes/save">
            <label class="label" for="user">Nome de usuário</label>
            <input class="input" type="text" name="user" id="user" disabled value="<?php echo $_COOKIE['user']; ?>"/>
            <label class="label" for="email">E-mail</label>
            <input class="input" type="email" name="email" id="email" value="<?php echo $_COOKIE['email']; ?>"/>
            <label class="label" for="pass">Nova Senha</label>
            <input class="input"type="password" name="password" id="pass" />
            <label class="label" for="confirm-pass">Confirme a nova senha</label>
            <input class="input"type="password" name="confirm-pass" id="confirm-pass" />
            <div></div>
            <input class="button"type="submit" value="Salvar" />
        </form>
    </article>
    
    <article class="logout-button">
        <a href="<?php echo BASE_URL; ?>/login/logout"><button class="button">Sair</button></a>
    </article>

</section>

<?php
    require_once("views/header.php");
?>
