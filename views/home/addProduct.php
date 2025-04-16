<?php
    require_once("views/header.php");
?>

<article id="config-title">
    <h1>Adicionar ao estoque</h1>
</article>

<section class="flex center column container">
    <article id="form">
        <form id="form-items" action="<?php echo BASE_URL."/home/addProduct"?>" method="POST">
            <?php for($i = 0; $i < count($columns); $i++): ?>
                <label class="label" for="<?php echo $columns[$i]; ?>"><?php echo $columns_pt[$i]; ?></label>
                <select class="input" id="<?php echo $columns[$i]; ?>" name="<?php echo $columns[$i]; ?>">
                    <option value="0" selected>Selecione uma opção</option>
                    <?php for($c = 0; $c < count($items[$columns[$i]]); $c++): ?>
                        <option value="<?php echo $items[$columns[$i]][$c]["id"]; ?>"><?php echo $items[$columns[$i]][$c][strtolower($columns[$i])]; ?></option>  
                    <?php endfor; ?>
                </select>
                <div class="message" id="<?php echo $columns[$i]; ?>-message"></div>
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