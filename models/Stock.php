<?php

class Stock extends Model{

    public function getStock(){

        $return = false;

        $sql = $this->connect->prepare("
        SELECT stock.id, brands.brand, categories.category, products.name, types.type, extras.text as extra, price, quantity
        FROM stock
        INNER JOIN brands on stock.brand = brands.id
        INNER JOIN categories on stock.category = categories.id
        INNER JOIN products on stock.product = products.id
        INNER JOIN types on stock.type = types.id
        INNER JOIN extras on stock.extra = extras.id
        ");
        $sql->execute();

        if($sql->rowCount() > 0){
            $return = $sql->fetchAll();
        }else{
            $return = false;
        }

        return $return;
    }

}