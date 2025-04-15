<?php
    require_once("views/header.php");
?>

<article id="config-title">
        <h1>Adicionar ao estoque</h1>
    </article>

<section class="flex center column container">
    <article id="form">
        <form id="form-items" action="<?php echo BASE_URL."/home/addProduct"?>" method="POST">
            <input class="input" type="text" name="user" id="user" placeholder="Nome de usuário" value="<?php echo isset($_SESSION['input-name']) ? $_SESSION['input-name'] : ""; ?>" maxlength="4" autofocus />
            <input class="input" type="password" name="pass" id="pass" placeholder="Senha" maxlength="8" />
            
            <div class="flex justify add-button">
                <input class="button" type="reset" value="Limpar formulário" />
                <input class="button" type="submit" value="Adicionar" />
            </div>
        </form>
    </article>
</section>

<?php
    require_once("views/footer.php");
?>