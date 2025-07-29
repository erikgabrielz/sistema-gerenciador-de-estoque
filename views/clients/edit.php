<?php
    require_once("views/header.php");
?>



<section class="container">
    <article class="title-container">
        <div class="flex justify center title">
            <h1>Editar cliente</h1>
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
        <form method="POST" id="form-clients" action="<?php echo BASE_URL; ?>/clientes/update/<?php echo $client[0]["id"]; ?>" valid="true">
            
            <label class="label" for="name">Nome completo do cliente</label>
            <input class="input" type="text" name="name" id="name" autocomplete="off" value="<?php echo $client[0]['name']; ?>" required-input/>
            <div class="validate-message" id="name-message"></div>

            <label class="label" for="cpf">CPF/CPNJ</label>
            <input class="input" type="text" name="cpf" id="cpf" autocomplete="off" value="<?php echo $client[0]['cpf']; ?>" required-input/>
            <div class="validate-message" id="cpf-message"></div>
            
            <label class="label" for="email">E-mail</label>
            <input class="input" type="email" name="email" id="email" autocomplete="off" value="<?php echo $client[0]['email']; ?>"/>
            <div class="validate-message" id="email-message"></div>

            <label class="label" for="phone">Telefone de contato</label>
            <input class="input" type="tel" name="phone" id="phone" autocomplete="off" value="<?php echo $client[0]['phone']; ?>" required-input/>
            <div class="validate-message" id="phone-message"></div>

            <div class="address">
                <label class="label" for="cep">CEP</label>
                <input class="input" type="text" name="cep" id="cep" oninput="validarCEP(this)" maxlength="9" autocomplete="off" value="<?php echo $client[0]['cep']; ?>" />

                <label class="label" for="street">Rua</label>
                <input class="input" type="text" name="street" id="street" autocomplete="off" value="<?php echo $client[0]['street']; ?>"/>

                <label class="label" for="number">Número</label>
                <input class="input" type="text" name="number" id="number" autocomplete="off" value="<?php echo $client[0]['number']; ?>"/>

                <label class="label" for="district">Bairro</label>
                <input class="input" type="text" name="district" id="district" autocomplete="off" value="<?php echo $client[0]['district']; ?>"/>

                <label class="label" for="state">Estado</label>
                <select class="input" name="uf" id="uf" onchange="getCities(event)">
                    <option value="<?php echo $client[0]["uf"]; ?>"><?php echo $client[0]["uf"]; ?></option>
                </select>

                <label class="label" for="city">Município</label>
                <select class="input" name="city" id="city">
                    <option value="<?php echo $client[0]['city']; ?>"><?php echo $client[0]['city']; ?></option>
                </select>
            </div>
            
            <input class="button" type="submit" value="Atualizar cadastro" />
        </form>
    </article>
</section>

<?php
    require_once("views/footer.php");
?>

