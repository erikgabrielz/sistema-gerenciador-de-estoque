<?php

class Stock extends Model{

    public function getStock($id = ""){

        $response = false;

        $sql = "
        SELECT stock.id, brands.brand, categories.category, products.name, types.type, extras.text as extra, price, quantity
        FROM stock
        INNER JOIN brands on stock.brand = brands.id
        INNER JOIN categories on stock.category = categories.id
        INNER JOIN products on stock.product = products.id
        INNER JOIN types on stock.type = types.id
        INNER JOIN extras on stock.extra = extras.id
        ";

        if(!empty($id)){
            $sql = $sql." WHERE stock.id = ".$id;
        }

        $sql = $this->connect->prepare($sql);

        $sql->execute();

        if($sql->rowCount() > 0){
            $response = $sql->fetchAll();
        }else{
            $response = false;
        }

        return $response;
    }

    public function delete($id){
        $response = false;

        $sql = $this->connect->prepare("SELECT id FROM stock WHERE id = :id");
        $sql->bindParam(":id", $id);
        $sql->execute();

        if($sql->rowCount() > 0){
            $sql = $this->connect->prepare("DELETE FROM `stock` WHERE id = :id");
            $sql->bindParam(":id", $id);
            
            if($sql->execute()){
                $response = true;
            }
        }

        return $response;
    }

    public function sell($id){
        $response = false;

        $sql = $this->connect->prepare("UPDATE `stock` SET `quantity`-= 1 WHERE  id = :id");
        $sql->bindParam(":id", $id);
        

        if($sql->execute()){
            $response = "Operação realizada com sucesso!";
        }

        return $response;
    }

}