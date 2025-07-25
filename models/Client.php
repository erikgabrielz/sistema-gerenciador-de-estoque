<?php

    class Client extends Model{

        private $table = "clients";

        public function getClient($client = "", $user_id){
            $response = false;

            $sql = $this->connect->prepare("SELECT * FROM ".$this->table);
            if(!empty($client)){
                $sql = $sql." WHERE id = ".$client;
            }
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
    }