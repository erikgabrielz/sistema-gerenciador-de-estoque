<?php
    class configuracoesController extends Controller{
        public function index(){
            $data['title'] = "Configurações - ".APP_NAME;
            $this->loadView("config/config", $data);
        }

        public function updateUser(){
            $response = false;
            
            $_SESSION['message'] = [
                "status" => "error",
                "text" => "Operação não realizada. Tente novamente!"
            ];

            if(isset($_POST['id']) && !empty($_POST['id']) && $_POST['id'] == $_COOKIE['id']){
                $id = addslashes($_POST['id']);
            }else{
                header("Location: /configuracoes");
                exit();
            }

            if(isset($_POST['email']) && !empty($_POST['email'])){
                $email = addslashes($_POST['email']);
            }

            if(isset($_POST['password']) && !empty($_POST['password'])){
                $password = addslashes($_POST['password']);

                if(isset($_POST['confirm-password']) && !empty($_POST['confirm-password'])){
                    $confirm_password = addslashes($_POST['confirm-password']);
                }
            }else{
                header("Location: /configuracoes");
                exit();
            }


            if($password != $confirm_password){
                $_SESSION['message']['text'] = "As senhas não conferem.";
                header("Location: /configuracoes");
                exit();
            }

            $password = password_hash(addslashes($_POST['password']), PASSWORD_DEFAULT);

            $user = new User();
            $return = $user->updateUser($id, $email, $password);

            if($return){
                $_SESSION['message'] = [
                    "status" => "success",
                    "text" => "Operação realizada com sucesso!"
                ];
            }

            header("Location: /configuracoes");

            return $response;
        }
    }
?>