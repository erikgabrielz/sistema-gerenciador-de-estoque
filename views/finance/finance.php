<?php
    require_once("views/header.php");
?>

<section class="container">
    <article class="title-container">
        <div class="flex justify center title">
            <h1>Financeiro</h1>
        </div>
    </article>

    <article class="flex" id="statistics">
        <div class="item flex center column">
            <p>Produtos no estoque:</p>
            <span class="numbers"><?php echo $statistics["stock"]["total_quantity"]; ?></span>
        </div>

        <div class="item flex center column">
            <p>Total investido:</p>
            <span class="numbers"><?php echo "R$ ".number_format($statistics["stock"]["total_price"], 2, ",", "."); ?></span>
        </div>

        <div class="item flex center column">
            <p>Vendas no mês:</p>
            <span class="numbers"><?php echo $statistics["sales"]["total_sales"]; ?></span>
        </div>

        <div class="item flex center column">
            <p>Total vendido no mês:</p>
            <span class="numbers"><?php echo "R$ ".number_format($statistics["sales"]["total_price"], 2, ",", "."); ?></span>
        </div>
    </article>
</section>

<?php

    require_once("views/footer.php");

?>

