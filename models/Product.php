<?php

class Product extends Model{

    public function getProducts(){

        $return = false;

        $sql = $this->connect->prepare("SELECT * FROM products");
        $sql->bindParam(":user", $user);
        $sql->execute();

        if($sql->rowCount() > 0){
            $return = $sql->fetch();
        }else{
            $return = false;
        }

        return $return;
    }

}