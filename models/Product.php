<?php

    class Product extends Model{

        private $table = "products";

        public function getProduct($id = ""){
            $response = false;

            $sql = $this->connect->prepare("SELECT * FROM ".$this->table);

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

            $sql = $this->connect->prepare("INSERT INTO ".$this->table." VALUES (default, :product)");
            $sql->bindValue(":product", $product);

            if($sql->execute()){
                $response = true;
            }

            return $response;
        }

        public function update($value, $id){
            $response = false;

            $sql = $this->connect->prepare("UPDATE ".$this->table." SET `extra` = :extra, modified = NOW() WHERE id = :id");
            $sql->bindParam(":id", $id);
            $sql->bindParam(":extra", $value);

            if($sql->execute()){
                $response = true;
            }

            return $response;
        }

        public function delete($id){
            $response = false;

            $sql = $this->connect->prepare("SELECT id FROM ".$this->table." WHERE id = :id");
            $sql->bindParam(":id", $id);
            $sql->execute();

            if($sql->rowCount() > 0){
                $sql = $this->connect->prepare("DELETE FROM ".$this->table." WHERE id = :id");
                $sql->bindParam(":id", $id);

                if($sql->execute()){
                    $response = true;
                }
            }

            return $response;
        }
    }