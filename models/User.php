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

    public function update($data){
        $response = false;

        print_r($data);
        exit();
        
        // $sql = $this->connect->prepare("UPDATE users SET `password` = :pass, email = :email, updated_at = NOW() WHERE user = :user");
        
        // $sql->bindValue("");
    
        // if($sql->execute()){
        //     $response = true;
        // }

        return $response;
    }
}