<?php

    class Sale extends Model{
        private $table = "sales";

        public function getSale($start, $end){
            $response = false;

            $sql = $this->connect->prepare(
                "SELECT COUNT(*) AS total_sales, SUM(price) as total_price
                 FROM ".$this->table." 
                 WHERE user_sale = :user_sale 
                 AND sale_date BETWEEN :start AND :end; 
                 GROUP BY sale_date 
                 ORDER BY sale_date"
            );

            $sql->bindValue(":user_sale", $_SESSION["id"]);
            $sql->bindValue("start", $start);
            $sql->bindValue("end", $end);

            $sql->execute();

            if($sql->rowCount() > 0){
                $response = $sql->fetch();
            }

            return $response;
        }



        public function add(){

        }
    }