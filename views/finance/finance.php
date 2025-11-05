<?php
    require_once("views/header.php");
?>

<section class="container">
    <article class="title-container">
        <div class="flex justify center title">
            <h1>Financeiro</h1>
        </div>
    </article>

    <article class="finance-filter">
        <h3>Buscar por datas: (inicial / final)</h3>
        <form class="flex wrap" method="POST">
            <input class="input" type="date" name="start" value="<?php echo isset($_POST['start']) ? $_POST['start'] : "" ?>" />
            <input class="input" type="date" name="end" value="<?php echo isset($_POST['end']) ? $_POST['end'] : "" ?>" />
            <input type="submit" class="button" value="Buscar"/>
            <?php echo isset($_POST['start'])  && isset($_POST['end']) ? '<a href="/financeiro/limparFiltros" class="button">Limpar filtros</a>' : "" ?>
        </form>
        
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

    <article class="flex wrap center" id="statistics">
        <?php if(!isset($_POST['start']) && !isset($_POST['end'])): ?>
            <div class="item flex center column">
                <p>Produtos no estoque:</p>
                <span class="numbers"><?php echo $statistics["stock"]["total_quantity"]; ?></span>
            </div>

            <div class="item flex center column">
                <p>Total investido:</p>
                <span class="numbers"><?php echo "R$ ".number_format($statistics["stock"]["total_price"], 2, ",", "."); ?></span>
            </div>
        <?php endif; ?>
        
        <div class="item flex center column">
            <p>Vendas no período:</p>
            <span class="numbers"><?php echo $statistics["sales"]["total_sales"]; ?></span>
        </div>

        <div class="item flex center column">
            <p>Total vendido no período:</p>
            <span class="numbers"><?php echo "R$ ".number_format($statistics["sales"]["total_price"], 2, ",", "."); ?></span>
        </div>
    </article>
</section>

<?php

    require_once("views/footer.php");

?>

