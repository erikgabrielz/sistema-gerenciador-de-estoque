<?php
    class Controller{
        public function loadView($viewName, $viewData = array()){
            extract($viewData);
            require_once("views/".$viewName.".php");
        }

        public function validLogin(){
            $response = false;

            if(isset($_COOKIE["token"]) && !empty($_COOKIE["token"])){
                $session = new Session();
                $session = $session->getSession($_COOKIE["token"]);

                if($session && $session["ip"] == CLIENT_IP){
                    $response = true;
                    $_SESSION['id'] = $session['id'];
                    $_SESSION["user-logged"] = $session['user'];
                    $_SESSION["name"] = $session['name'];
                    $_SESSION["email"] = $session['email'];
                    $_SESSION["level"] = $session['level'];
                }
            }

            return $response;
        }
    }
?>