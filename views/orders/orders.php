<?php
    require_once("views/header.php");
?>

<section class="container">
    <article class="title-container">
        <div class="flex justify center title">
            <h1>Ordens de Serviço</h1>
            <a href="/servicos/newOrder"><button class="button"><img class="icon" src="<?php echo BASE_URL; ?>/assets/media/add.png" /></button></a>
        </div>
    </article>

    <article id="orders-items">
        <div class="item">
            <div class="item-desc">
                <h3 class="item-title">Ordem de serviço #111</h3>
                <p class="item-amount">troca de microfone</p>
                <p class="item-price">valor do orçamento: R$ 70,00</p>
            </div>
            <div class="item-action">
                <a href="#"><button class="button"><img class="icon" src="<?php echo BASE_URL; ?>/assets/media/edit.png" /></button></a>
                <a href="#"><button class="button"><img class="icon" src="<?php echo BASE_URL; ?>/assets/media/verification.png" /></button></a>
            </div>
        </div>

        <div class="item">
            <div class="item-desc">
                <h3 class="item-title">Ordem de serviço #222</h3>
                <p class="item-amount">Troca de tela</p>
                <p class="item-price">valor do orçamento: R$ 250,00</p>
            </div>

            <div class="item-action">
                <a href="#"><button class="button"><img class="icon" src="<?php echo BASE_URL; ?>/assets/media/eye.png" alt="Visualizar ordem de serviço" title="Visualizar ordem de serviço" /></button></a>
                <a href="#"><button class="button"><img class="icon" src="<?php echo BASE_URL; ?>/assets/media/verification.png" alt="Marcar como concluída" title="Marcar como concluída" /></button></a>
                <a><button class="button"><img class="icon" src="/assets/media/close.png" alt="Cancelar/suspender ordem de serviço" title="Cancelar/suspender ordem de serviço" /></button></a>
                <a><button class="button"><img class="icon" src="/assets/media/trash.png" alt="Excluír ordem de serviço" title="Excluír ordem de serviço" /></button></a>
                <a href="#"><button class="button"><img class="icon" src="<?php echo BASE_URL; ?>/assets/media/edit.png" alt="Editar ordem de serviço" title="Editar ordem de serviço" /></button></a>
            </div>
        </div>
    </article>
</section>

<?php
    require_once("views/footer.php");
?>