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

                if(!empty($session) && $session["ip"] == CLIENT_IP){
                    $response = true;
                    $_SESSION['id'] = $session['user_id'];
                    $_SESSION["user-logged"] = $session['user'];
                    $_SESSION["name"] = $session['name'];
                    $_SESSION["email"] = $session['email'];
                    $_SESSION["level"] = $session['level'];
                }else{
                    setcookie("token", false, time() - 14400, '/');
                    $_SESSION = array();
                    session_destroy();

                    header("Location: /");
                    exit();
                }
            }

            return $response;
        }
    }
?>