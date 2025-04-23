<?php

    class Product extends Model{
        public function getProduct($id = ""){
            $response = false;

            $sql = $this->connect->prepare("SELECT * FROM products");

            if(!empty($id)){
                $sql = $sql." WHERE id = ".$id;
            }

            $sql->execute();

            if($sql->rowCount() > 0){
                $response = $sql->fetchAll();
            }

            return $response;
        }

        public function add($product){
            $response = false;

            $sql = $this->connect->prepare("INSERT INTO products VALUES (default, :product)");
            $sql->bindValue(":product", $product);

            if($sql->execute()){
                $response = true;
            }

            return $response;
        }



        public function delete($id){
            $response = false;

            $sql = $this->connect->prepare("SELECT id FROM products WHERE id = :id");
            $sql->bindParam(":id", $id);
            $sql->execute();

            if($sql->rowCount() > 0){
                $sql = $this->connect->prepare("DELETE FROM products WHERE id = :id");
                $sql->bindParam(":id", $id);

                if($sql->execute()){
                    $response = true;
                }
            }

            return $response;
        }
    }