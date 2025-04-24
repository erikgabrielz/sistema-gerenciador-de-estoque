<?php

    class User extends Model{
        public function getUser($user){
            $response = false;

            $sql = $this->connect->prepare("SELECT * FROM users WHERE user = :user");
            $sql->bindParam(":user", $user);
            $sql->execute();

            if($sql->rowCount() > 0){
                $response = $sql->fetch();
            }else{
                $response = false;
            }

            return $response;
        }

        public function updateEmail($id, $email){
            $response = false;

            $sql = $this->connect->prepare("UPDATE users SET `email` = :email, modified = NOW() WHERE id = :id");

            $sql->bindParam(":id", $id);
            $sql->bindParam(":email", $email);

            if($sql->execute()){
                $response = true;
                
                $user = $_COOKIE["user"];
                $name = $_COOKIE["name"];

                setcookie("user-logged", false, time() - 7200, '/');
                setcookie('id', "", time() - 7200, "/");
                setcookie('user', "", time() - 7200, "/");
                setcookie('email', "", time() - 7200, "/");
                setcookie('name', "", time() - 7200, "/");

                unset($_COOKIE["user-logged"]);
                unset($_COOKIE["id"]);
                unset($_COOKIE["user"]);
                unset($_COOKIE["email"]);
                unset($_COOKIE["name"]);

                setcookie('user-logged', true, time() + 7200, "/");
                setcookie('id', $id, time() + 7200, "/");
                setcookie('user', $user, time() + 7200, "/");
                setcookie('email', $email, time() + 7200, "/");
                setcookie('name', $name, time() + 7200, "/");                
            }

            return $response;
        }

        public function updatePassword($id, $password){
            $response = false;

            $sql = $this->connect->prepare("UPDATE users SET `password` = :password, modified = NOW() WHERE id = :id");

            $sql->bindParam(":id", $id);
            $sql->bindParam(":password", $password);

            if($sql->execute()){
                $response = true;
            }

            return $response;
        }
    }