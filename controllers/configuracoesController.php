<?php
    class configuracoesController extends Controller{
        public function index(){
            if(!$this->validLogin()){
                header("Location: /login");
                exit(); 
            }

            $data['title'] = "Configurações - ".APP_NAME;
            $this->loadView("config/config_account", $data);
        }

        public function updateUser(){

            if(!$this->validLogin()){
                header("Location: /login");
                exit(); 
            }

            $_SESSION['message'] = [
                "status" => "error",
                "text" => "Operação não realizada. Tente novamente!"
            ];

            if(isset($_POST['email']) && !empty($_POST['email'])){
                $email = addslashes($_POST['email']);
            }

            if(isset($_POST['password']) && !empty($_POST['password'])){
                $password = addslashes($_POST['password']);

                if(isset($_POST['confirm-password']) && !empty($_POST['confirm-password'])){
                    $confirm_password = addslashes($_POST['confirm-password']);
                }

                if($password != $confirm_password){
                    $_SESSION['message']['text'] = "As senhas não conferem.";
                    header("Location: /configuracoes");
                    exit();
                }
    
                $password = password_hash(addslashes($_POST['password']), PASSWORD_DEFAULT);
            }
            

            $user = new User();
            
            if(!empty($email)){
                $return = $user->updateEmail($_SESSION['id'], $email);
            }

            if(!empty($password)){
                $return = $user->updatePassword($_SESSION['id'], $password);
            }

            if($return){
                $_SESSION['message'] = [
                    "status" => "success",
                    "text" => "Operação realizada com sucesso!"
                ];
            }

            header("Location: /configuracoes");
        }
    }
?>