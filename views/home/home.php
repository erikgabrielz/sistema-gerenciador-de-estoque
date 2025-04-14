<?php
    require_once("views/header.php");
?>

<section class="container">
    <article class="flex justify center" id="home-title">
        <h1>Estoque</h1>
        <a href="/home/add"><button class="button"><img class="icon" src="<?php echo BASE_URL; ?>/assets/media/add.png" /></button></a>
    </article>

    <article class="flex center" id="home-search">
        <input class="input" id="search" type="search" placeholder="Pesquisar" />
    </article>

    <article class="flex center column" id="home-items">
        <div class="item flex center justify">
            <div class="item-desc">
                <h3 class="item-title">Carregando...</h3>
                <p class="item-amount">Carregando...</p>
                <p class="item-price">Carregando...</p>
            </div>
        </div>
    </article>
</section>

<?php
    require_once("views/footer.php");
?>