<?php

class User extends Model{
    public function getUser($user){
        $return = "";

        $sql = $this->connect->prepare("SELECT * FROM users WHERE user = :user");
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