<?php

    class Client extends Model{

        private $table = "clients";

        public function getClient($client = "", $user_id){
            $response = false;

            $sql = "SELECT * FROM ".$this->table. " WHERE user_created = ".$user_id;

            
            if(!empty($client)){
                $sql = $sql." AND id = ".$client;
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

        public function addClient($data){
            $response = false;

            $sql = $this->connect->prepare("INSERT INTO ".$this->table." VALUES(default, :name, :cpf, :email, :phone, :cep, :street, :number, :district, :uf, :city, :user_created, default)");

            foreach($data as $item => $value){
                $sql->bindValue(":$item", $value);
            }

            $sql->bindValue(":user_created", $_SESSION['id']);

            if($sql->execute()){
                $response = true;
            }

            return $response;
        }

        public function save($data, $id){
            $response = false;

            $sql = $this->connect->prepare("UPDATE ".$this->table." SET name=:name, email=:email, phone=:phone, cep=:cep, street=:street, number=:number, district=:district, uf=:uf, city=:city WHERE id = :id");

            foreach($data as $key => $value){
                $key = ":".strtolower($key);
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

        public function consultCPF($cpf){
            $response = false;

            $sql = $this->connect->prepare("SELECT cpf from ".$this->table." WHERE cpf = :cpf");
            $sql->bindParam(":cpf", $cpf);

            $sql->execute();

            if($sql->rowCount() > 0){
                $response = true;
            }

            return $response;
        }
    }