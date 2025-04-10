<?php
    require_once("views/header.php");
?>

<section class="container">
    <article class="flex justify center" id="home-title">
        <h1>Estoque</h1>
        <a href="#"><button class="button"><img class="icon" src="<?php echo BASE_URL; ?>/assets/media/add.png" /></button></a>
    </article>

    <article class="flex center" id="home-search">
        <input class="input" type="search" placeholder="Pesquisar" />
    </article>

    <article class="flex center column" id="home-items">
        <div class="item flex center justify">
            <div class="item-desc">
                <h3 class="item-title">Item A</h3>
                <p class="item-amount">Quantidade: 20</p>
                <p class="item-price">Valor: R$ 200,00</p>
            </div>
            <div class="item-action">
                <a href="#"><button class="button"><img class="icon" src="<?php echo BASE_URL; ?>/assets/media/edit.png" /></button></a>
                <a href="#"><button class="button"><img class="icon" src="<?php echo BASE_URL; ?>/assets/media/trash.png" /></button></a>
            </div>
        </div>

        <div class="item flex center justify">
            <div class="item-desc">
                <h3 class="item-title">Item A</h3>
                <p class="item-amount">Quantidade: 20</p>
                <p class="item-price">Valor: R$ 200,00</p>
            </div>
            <div class="item-action">
                <a href="#"><button class="button"><img class="icon" src="<?php echo BASE_URL; ?>/assets/media/edit.png" /></button></a>
                <a href="#"><button class="button"><img class="icon" src="<?php echo BASE_URL; ?>/assets/media/trash.png" /></button></a>
            </div>
        </div>
    </article>
</section>

<?php
    require_once("views/footer.php");
?>