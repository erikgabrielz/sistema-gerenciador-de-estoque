<?php
    require_once("views/header.php");
?>

<section class="container">
    <article class="title-container">
        <div class="flex justify center title">
            <h1>Adicionar ao estoque</h1>
            <a href="/database"><button class="button"><img class="icon" src="<?php echo BASE_URL; ?>/assets/media/data-management.png" /></button></a>
        </div>
    </article>

    <article id="form">
        <form id="form-items" action="<?php echo BASE_URL."/home/addProduct"?>" method="POST">
            <?php for($i = 0; $i < count(TABLES); $i++): ?>
                <label class="label" for="<?php echo TABLES[$i]; ?>"><?php echo TABLES_PT[$i]; ?></label>
                <select class="input" id="<?php echo TABLES[$i]; ?>" name="<?php echo TABLES[$i]; ?>">
                    <option value="0" selected>Selecione uma opção</option>
                    <?php for($c = 0; $c < count($items[TABLES[$i]]); $c++): ?>
                        <option value="<?php echo $items[TABLES[$i]][$c]["id"]; ?>"><?php echo $items[TABLES[$i]][$c][strtolower(TABLES[$i])]; ?></option>  
                    <?php endfor; ?>
                </select>
                <div class="message" id="<?php echo TABLES[$i]; ?>-message"></div>
            <?php endfor; ?>
            <label class="label" for="quantity">Quantidade</label>
            <input class="input" type="number" id="quantity" name="quantity" min="0" max="1000" />
            <label class="label" for="price">Valor unitário</label>
            <input class="input" type="tel" id="price" name="price" value="R$ 0,00"/>

            <div class="flex justify add-button">
                <input class="button" type="reset" value="Limpar formulário" />
                <input class="button" type="submit" value="Adicionar" />
            </div>
        </form>
    </article>
</section>

<?php
    require_once("views/footer.php");
?>