<?php

    class Sale extends Model{
        private $table = "sales";

        public function getSale($month = "CURDATE()", $year = "CURDATE()"){
            $response = false;

            $sql = $this->connect->prepare("SELECT COUNT(*) AS total_sales, SUM(price) as total_price FROM ".$this->table." WHERE user_sale = :user_sale AND MONTH(sale_date) = MONTH(".$month.") AND YEAR(sale_date) = YEAR(".$year."); GROUP BY sale_date ORDER BY sale_date");
            $sql->bindValue(":user_sale", $_SESSION["id"]);

            $sql->execute();

            if($sql->rowCount() > 0){
                $response = $sql->fetch();
            }

            return $response;
        }



        public function add(){

        }
    }