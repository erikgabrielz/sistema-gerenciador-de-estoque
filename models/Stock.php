<?php

class Stock extends Model{

    public function getStock($id = ""){

        $response = false;

        $sql = "
        SELECT stock.id, brands.brand, categories.category, products.product, types.type, extras.extra, suppliers.supplier, price, quantity
        FROM stock
        INNER JOIN brands on stock.brand = brands.id
        INNER JOIN categories on stock.category = categories.id
        INNER JOIN products on stock.product = products.id
        INNER JOIN types on stock.type = types.id
        INNER JOIN extras on stock.extra = extras.id
        INNER JOIN suppliers on stock.supplier = suppliers.id
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

    public function add($data){
        $response = false;

        $sql = $this->connect->prepare("INSERT INTO stock VALUES (:brand, :category, :extra, :product, :type, :category, :supplier, :quantity, :price)");
        
        foreach($data as $key => $value){
            $key = ":".strtolower($key);
            if($key == ":price"){
                $value = substr($value, 4);
                $value = str_replace(",", ".", $value);
            }
            $sql->bindValue($key, $value);
        }

        if($sql->execute()){
            $response = true;
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

        $sql = $this->connect->prepare("UPDATE `stock` SET `quantity` = `quantity` - 1 WHERE `id` = :id AND `quantity` > 0");
        $sql->bindParam(":id", $id);
        

        if($sql->execute()){
            $response = true;
            header("Location: /");
        }

        return $response;
    }

}