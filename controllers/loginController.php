<?php
    class loginController extends Controller{
        public function index(){

            if($this->validLogin()){
                header("Location: /");
                exit(); 
            }

            $data['title'] = "Login - ".APP_NAME;
            $this->loadView("login/login", $data);
        }

        public function auth(){

            if($this->validLogin()){
                header("Location: /");
                exit(); 
            }

            $userInput = addslashes($_POST['user']);
            $pass = addslashes($_POST['password']);

            $userModel = new User();
            $user = $userModel->getUser($userInput);

            $_SESSION['input-name'] = "";
            $_SESSION['user-message'] = "";
            $_SESSION['password-message'] = "";
            $_SESSION['input-name'] = $userInput;

            if($user == false){
                $_SESSION['user-message'] = "Usuário não encontrado!";
                return header("Location: /login");
            }else if($user['status'] == 0){
                $_SESSION['user-message'] = "A conta está desativada!";
                return header("Location: /login");
            }

            if(password_verify($pass, $user['password'])){
                $token = bin2hex(random_bytes(32));
                $expires_at = date("Y-m-d H:i:s", strtotime("+4 hours"));

                $session = new Session();
                $session = $session->add($user['id'], CLIENT_IP, $token, $expires_at);

                if($session){
                    setcookie("token", $token, time() + 14400, '/');
                    $_SESSION['id'] = $user['id'];
                    $_SESSION["user-logged"] = $user['user'];
                    $_SESSION["name"] = $user['name'];
                    $_SESSION["email"] = $user['email'];
                    $_SESSION["level"] = $user['level'];
                    
                }else{
                    $_SESSION['message'] = [
                        "status" => "error",
                        "text" => "Operação não realizada. Tente novamente!"
                    ];
                    header("Location:: /login");
                    exit();
                }

                header("Location: /");
            }else{
                $_SESSION['input-name'] = $userInput;
                $_SESSION['password-message'] = "Senha incorreta!"; 
                header("Location: /login");
            }
        }

        public function logout(){

            if(!$this->validLogin()){
                header("Location: /");
                exit(); 
            }

            $session = new Session();
            $session = $session->delete($_COOKIE['token']);

            if($session){
                setcookie("token", false, time() - 14400, '/');
                $_SESSION = array();
                session_destroy();
            }else{
                $_SESSION['message'] = [
                    "status" => "error",
                    "text" => "Operação não realizada. Tente novamente!"
                ];
            }

            header("Location: /");
        }

        public function isLogged(){
            echo json_encode($this->validLogin());
        }

    }
?>