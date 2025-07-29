<?php
    require_once("views/header.php");
?>

<section class="container">
    <article class="title-container">
        <div class="flex justify center title">
            <h1>Cadastrar novo cliente</h1>
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
            <input class="input" type="text" name="name" id="name" autocomplete="off" required-input/>
            <div class="validate-message" id="name-message"></div>

            <label class="label" for="cpf">CPF/CPNJ</label>
            <input class="input" type="text" name="cpf" id="cpf" autocomplete="off" required-input/>
            <div class="validate-message" id="cpf-message"></div>
            
            <label class="label" for="email">E-mail</label>
            <input class="input" type="email" name="email" id="email" autocomplete="off"/>
            <div class="validate-message" id="email-message"></div>

            <label class="label" for="phone">Telefone de contato</label>
            <input class="input" type="tel" name="phone" id="phone" autocomplete="off" required-input/>
            <div class="validate-message" id="phone-message"></div>

            <div class="address">
                <label class="label" for="cep">CEP</label>
                <input class="input" type="text" name="cep" id="cep" oninput="validarCEP(this)" maxlength="9" autocomplete="off" />

                <label class="label" for="street">Rua</label>
                <input class="input" type="text" name="street" id="street" autocomplete="off"/>

                <label class="label" for="number">Número</label>
                <input class="input" type="number" name="number" id="number" autocomplete="off"/>

                <label class="label" for="district">Bairro</label>
                <input class="input" type="text" name="district" id="district" autocomplete="off"/>

                <label class="label" for="state">Estado</label>
                <select class="input" name="uf" id="uf" onchange="getCities(event)">
                    <option>Selecione uma opção</option>
                </select>

                <label class="label" for="city">Município</label>
                <select class="input" name="city" id="city">
                    <option>Selecione uma opção</option>
                </select>
            </div>
            
            <input class="button" type="submit" value="Cadastrar cliente" />
        </form>
    </article>
</section>

<?php
    require_once("views/footer.php");
?>

