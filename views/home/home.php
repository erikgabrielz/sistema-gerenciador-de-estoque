<?php
    require_once("views/header.php");
?>

<section class="container">
    <article class="title-container">
        <div class="flex justify center title">
            <h1>Estoque</h1>
            <?php if(isset($_COOKIE['user-logged']) && $_COOKIE['user-logged']): ?>
                <a href="/home/add"><button class="button"><img class="icon" src="<?php echo BASE_URL; ?>/assets/media/add.png" /></button></a>
            <?php endif; ?>
        </div>
    </article>

    <article class="flex center" id="home-search">
        <input class="input" id="search" type="search" placeholder="Pesquisar" />
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

        

        

    

    <article class="flex center column" id="home-items">
        <div class="item flex center justify">
            <div class="item-desc">
                <h3 id="item-title" class="item-title">Carregando<span id="loading"></span></h3>
            </div>
        </div>
    </article>
</section>

<?php
    require_once("views/footer.php");
?>