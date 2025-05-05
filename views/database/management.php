<?php
    require_once("views/header.php");
?>

<section class="container">
    <article class="title-container">
        <div class="flex justify center title">
            <h1>Gerenciar Banco de dados</h1>
        </div>
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

    <article id="form">
        <form id="form-items" action="<?php echo BASE_URL."/database/add"?>" method="POST">
            <label class="label" for="table">Tabela</label>
            <select class="input" id="table" name="table">
                <option value="0" selected>Selecione uma opção</option>
                <?php for($i = 0; $i < count(TABLES); $i++): ?>
                    <option value="<?php echo TABLES[$i]; ?>"><?php echo TABLES_PT[$i]; ?></option>
                <?php endfor; ?>
            </select>
            <label class="label" for="value">Valor</label>
            <input class="input" type="text" id="value" name="value" minlength="4"/>
            
            <div class="flex justify add-button">
                <input class="button" type="submit" value="Adicionar valor na tabela" />
            </div>
        </form>
    </article>

    <article id="data-tables">
        
        <?php foreach($items as $key => $item): ?>
            <table>            
                <caption>
                    <?php 
                        for($i = 0; $i < count(TABLES); $i++): 
                            if($key == TABLES[$i]):
                                echo TABLES_PT[$i];
                            endif;
                        endfor;
                    ?>
                </caption>
                <thead>
                    <tr>
                      <th>Valor</th>
                      <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        for($i = 0; $i < count($item); $i++): 
                            foreach($item[$i] as $value):
                                if(!is_numeric($value)): 
                    ?>
                                    <tr>
                                        <td><?php echo $value; ?></td>
                                        <td><button class="button">Editar</button><button class="button">Apagar</button></td>
                                    </tr>
                    <?php   
                                endif;
                            endforeach; 
                        endfor; 
                    ?>
                </tbody>
            </table>
        <?php endforeach; ?>
    
        

            
        
    </article>
</section>

<?php

    require_once("views/footer.php");

?>