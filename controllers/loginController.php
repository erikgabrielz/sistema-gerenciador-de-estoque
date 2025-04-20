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
                setcookie('user-logged', true, time() + 7200, "/");
                setcookie('user', $user['user'], time() + 7200, "/");
                setcookie('email', $user['email'], time() + 7200, "/");
                setcookie('name', $user['name'], time() + 7200, "/");
                header("Location: /");
            }else{
                $_SESSION['input-name'] = $userInput;
                $_SESSION['pass-message'] = "Senha incorreta!"; 
                header("Location: /login");
            }
        }

        public function logout(){
            setcookie("user-logged", false, time() - 7200, '/');
            setcookie('user', false, time() - 7200, "/");
            setcookie('email', false, time() - 7200, "/");
            setcookie('name', false, time() - 7200, "/");
            unset($_COOKIE["user-logged"]);
            unset($_COOKIE["level"]);
            header("Location: /");
        }
    }
?>