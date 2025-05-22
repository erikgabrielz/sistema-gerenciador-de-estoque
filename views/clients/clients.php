<?php
    require_once("views/header.php");
?>

<section class="container">
    <article class="title-container">
        <div class="flex justify center title">
            <h1>Clientes</h1>
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
        <form method="POST" id="form-clients" action="<?php echo BASE_URL; ?>/clientes/addCliente" valid="true">
            
            <label class="label" for="name">Nome completo do cliente</label>
            <input class="input" type="text" name="name" id="name"/>
            
            <label class="label" for="email">E-mail</label>
            <input class="input" type="email" name="email" id="email"/>
            <div class="validate-message" id="email-message"></div>

            <label class="label" for="phone">Telefone de contato</label>
            <input class="input" type="tel" name="phone" id="phone"/>
            <div class="validate-message" id="phone-message"></div>

            <div class="address">
                <label class="label" for="street">Rua</label>
                <input class="input" type="text" name="street" id="street"/>

                <label class="label" for="number">Número</label>
                <input class="input" type="number" name="number" id="number"/>

                <label class="label" for="district">Bairro</label>
                <input class="input" type="text" name="district" id="district"/>

                <label class="label" for="city">Município</label>
                <select class="input" name="city" id="city">

                </select>

                <label class="label" for="state">Estado</label>
                <select class="input" name="state" id="state">

                </select>

                <label class="label" for="cep">CEP</label>
                <input class="input" type="number" name="cep" id="cep" maxlength="9"/>
            </div>
            
            <input class="button" type="submit" value="Cadastrar cliente" />
        </form>
    </article>
</section>

<?php
    require_once("views/footer.php");
?>

