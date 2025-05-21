<?php

    class City extends Model{

        private $table = "cities";

        public function getCity($city = ""){
            $response = false;

            $sql = $this->connect->prepare("SELECT * FROM ".$this->table);
            $sql->execute();

            if($sql->rowCount() > 0){
                $response = $sql->fetchAll();
            }

            return $response;
        }

        public function add($state, $city){

            $sql = $this->connect->prepare("INSERT INTO ".$this->table." VALUES (default, :city, :state)");
            $sql->bindValue(":city", $city);
            $sql->bindValue(":state", $state);

            $sql->execute();
        }
    }