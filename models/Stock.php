<?php

    class Stock extends Model{

        private $table = "stock";

        public function getStock($id = "", $user_id = ""){

            $response = false;
            $sql = "
            SELECT ".$this->table.".id, brands.brand, categories.category, products.product, types.type, extras.extra, suppliers.supplier, price, quantity
            FROM ".$this->table."
            INNER JOIN brands on stock.brand = brands.id
            INNER JOIN categories on stock.category = categories.id
            INNER JOIN products on stock.product = products.id
            INNER JOIN types on stock.type = types.id
            INNER JOIN extras on stock.extra = extras.id
            INNER JOIN suppliers on stock.supplier = suppliers.id
            ";

            if(!empty($id)){
                $sql = $sql."WHERE ".$this->table.".id = ".$id;
            }

            if(!empty($user_id)){
                $sql = $sql."WHERE ".$this->table.".user_created = ".$user_id;
            }

            if(!empty($id) && !empty($user_id)){
                $sql = $sql." WHERE ".$this->table.".id = ".$id." AND ".$this->table.".user_created = ".$user_id;
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

        public function getstatistics(){
            $response = false;

            $sql = $this->connect->prepare("SELECT COUNT(quantity) as total_quantity, SUM(price) as total_price FROM ".$this->table." WHERE user_created = :user_created");
            $sql->bindValue(":user_created", $_SESSION["id"]);
            $sql->execute();
            
            if($sql->rowCount() > 0){
                $response = $sql->fetch();
            }

            return $response;
        }

        public function add($data){
            $response = false;

            $sql = $this->connect->prepare("INSERT INTO ".$this->table." VALUES (default, :brand, :category, :product, :supplier, :type, :extra, :price, :quantity, :user_created)");

            foreach($data as $key => $value){
                $key = ":".strtolower($key);
                if($key == ":price"){
                    $value = substr($value, 4);
                    $value = str_replace(",", ".", $value);
                }

                $sql->bindValue($key, $value);
            }

            $sql->bindValue(":user_created", $_SESSION['id']);

            if($sql->execute()){
                $response = true;
            }

            return $response;
        }

        public function save($data){
            $response = false;

            $id = $data['id'];
            array_shift($data);

            $sql = $this->connect->prepare("UPDATE ".$this->table." SET brand=:brand, category=:category, product=:product, supplier=:supplier, type=:type, extra=:extra, price=:price, quantity=:quantity WHERE id = :id");

            foreach($data as $key => $value){
                $key = ":".strtolower($key);
                if($key == ":price"){
                    $value = substr($value, 4);
                    $value = str_replace(",", ".", $value);
                }

                $sql->bindValue($key, $value);
            }

            $sql->bindParam(":id", $id);

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

        public function sell($id){
            $response = false;
            $price = "";

            $sql = $this->connect->prepare("SELECT price FROM ".$this->table." WHERE id = :id");
            $sql->bindParam(":id", $id);
            $sql->execute();

            if($sql->rowCount() > 0){
                $price = $sql->fetch();
            }

            $sql = $this->connect->prepare("INSERT INTO sales VALUES (default, :price, default, :user_sale)");
            $sql->bindValue(":price", $price["price"]);
            $sql->bindValue(":user_sale", $_SESSION['id']);

            if($sql->execute()){
                $response = 1;
            }

            $sql = $this->connect->prepare("UPDATE ".$this->table." SET `quantity` = `quantity` - 1 WHERE `id` = :id AND `quantity` > 0");
            $sql->bindParam(":id", $id);

            if($sql->execute()){
                $response += 1;
                
            }

            if($response == 2){
                header("Location: /");
            }

            return $response;
        }
    }