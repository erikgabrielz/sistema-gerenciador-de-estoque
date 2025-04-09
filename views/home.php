<?php
    require_once("views/header.php");
?>

<section class="container">
    <article class="flex justify center" id="home-title">
        <h1>Estoque</h1>
        <a href="#"><button class="button"><img class="icon" src="../assets/media/add.png" /></button></a>
    </article>

    <article class="flex center" id="home-search">
        <input class="input" type="search" placeholder="Pesquisar" />
    </article>

    <article class="flex center column" id="home-items">
        <div class="home-item flex center justify">
            <div class="home-item-desc">
                <h3 class="home-item-title">Item A</h3>
                <p class="home-item-amount">Quantidade: 20</p>
                <p class="home-item-price">Valor: R$ 200,00</p>
            </div>
            <div class="home-item-action">
                <a href="#"><button class="button"><img class="icon" src="../assets/media/edit.png" /></button></a>
                <a href="#"><button class="button"><img class="icon" src="../assets/media/trash.png" /></button></a>
            </div>
        </div>
    </article>
</section>

<?php
    require_once("views/footer.php");
?>