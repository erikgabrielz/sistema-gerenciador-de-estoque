<?php include('header.php'); ?>

<section class="container">
    <article id="config-title">
        <h1>Configurações</h1>
    </article>

    <article id="config-form">
        <form method="POST">
<<<<<<< HEAD
            <input class="input" type="text" name="user" id="user" placeholder="Nome de usuário" disabled value="erik"/>
=======
            <input class="input" type="text" name="user" id="user" placeholder="Nome de usuário" disabled value="<?php echo $_SESSION['user']; ?>"/>
>>>>>>> 32fdd5b31010be748fa36e8104f172f2fb13d5ed
            <input class="input"type="password" name="pass" id="pass" placeholder="Nova senha" />
            <input class="input"type="password" name="confirm-pass" id="confirm-pass" placeholder="confirme a nova senha" />
            <div></div>
            <input class="button"type="submit" value="Salvar" />
        </form>
    </article>
<<<<<<< HEAD
=======
    <a href="<?php echo BASE_URL; ?>/login/logout"><button class="button">Sair</button></a>
>>>>>>> 32fdd5b31010be748fa36e8104f172f2fb13d5ed
</section>

<?php include('footer.php'); ?>