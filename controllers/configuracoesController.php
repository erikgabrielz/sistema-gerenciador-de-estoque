<?php
    class configuracoesController extends Controller{
        public function index(){
            $data['title'] = "Configurações - ".APP_NAME;
            $this->loadView("config/config", $data);
        }

        public function save(){
            $_SESSION['message'] = [
                "status" => "error",
                "text" => "Operação não realizada. Tente novamente!"
            ];

            $data = [];

            foreach($_POST as $key => $value){
                if(isset($value) && !empty($value)){
                    $data[$key] = addslashes($value);
                }
            }

            if($data["password"] != $data["confirm-pass"]){
                header("Location: /configuracoes");
                $_SESSION['message']['text'] = "As senhas não conferem. Tente novamente!";
            }

            $user = new User();
            $return = $user->update($data);
            
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