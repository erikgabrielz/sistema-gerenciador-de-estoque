<?php
    class loginController extends Controller{
        public function index(){
            $data['title'] = "Login - ".APP_NAME;
            $this->loadView("login", $data);
        }

        public function auth(){
            $userInput = addslashes($_POST['user']);
            $pass = addslashes($_POST['pass']);

            $userModel = new User();

            $user = $userModel->getUser($userInput);

            $_SESSION['input-name'] = "";
            $_SESSION['user-message'] = "";
            $_SESSION['pass-message'] = "";

            if($user == false){
                $_SESSION['input-name'] = $userInput;
                $_SESSION['user-message'] = "Usuário não encontrado!";
                return header("Location: /login");
            }else if($user['status'] == 0){
                $_SESSION['input-name'] = $userInput;
                $_SESSION['user-message'] = "A conta está desativada!";
                return header("Location: /login");
            }

            if(password_verify($pass, $user['password'])){
                $_SESSION['user-logged'] = true;
                $_SESSION['user'] = $user['user'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['name'] = $user['name'];
                $_SESSION['level'] = $user['level'];
                header("Location: /");
            }else{
                $_SESSION['input-name'] = $userInput;
                $_SESSION['pass-message'] = "Senha incorreta!"; 
                header("Location: /login");
            }
        }

        public function logout(){
            $_SESSION = array();
            session_destroy();
            header("Location: /");
        }
    }
?>