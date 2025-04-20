<?php
    require_once("views/header.php");
?>

<section class="container">
    <article class="title-container">
        <div class="flex justify center title">
            <h1>Editar item</h1>
        </div>
    </article>

    <article id="form">
        <form id="form-items" action="<?php echo BASE_URL."/home/update"?>" method="POST">
            <input style="display: none;" class="input" type="number" id="id" name="id" value="<?php echo $item[0]["id"]; ?>" />
            <?php for($i = 0; $i < count(TABLES); $i++): ?>
                <label class="label" for="<?php echo TABLES[$i]; ?>"><?php echo TABLES_PT[$i]; ?></label>
                <select class="input" id="<?php echo TABLES[$i]; ?>" name="<?php echo TABLES[$i]; ?>">
                    <option value="0" >Selecione uma opção</option>
                    <?php for($c = 0; $c < count($items[TABLES[$i]]); $c++): ?>
                        <option value="<?php echo $items[TABLES[$i]][$c]["id"]; ?>" <?php if($items[TABLES[$i]][$c][STOCK_COLUMNS[$i]] == $item[0][STOCK_COLUMNS[$i]]) { echo "selected"; }; ?>><?php echo $items[TABLES[$i]][$c][strtolower(TABLES[$i])]; ?></option>  
                    <?php endfor; ?>
                </select>
                <div class="message" id="<?php echo TABLES[$i]; ?>-message"></div>
            <?php endfor; ?>
            <label class="label" for="quantity">Quantidade</label>
            <input class="input" type="number" id="quantity" name="quantity" min="0" max="1000" value="<?php echo $item[0]["quantity"]; ?>" />
            <label class="label" for="price">Valor unitário</label>
            <input class="input" type="tel" id="price" name="price" value="R$ <?php echo number_format($item[0]["price"], 2, ",", ".") ?>" />

            <div class="flex justify add-button">
                <input class="button" type="submit" value="Salvar" />
            </div>
        </form>
    </article>
</section>

<?php
    require_once("views/footer.php");
?>