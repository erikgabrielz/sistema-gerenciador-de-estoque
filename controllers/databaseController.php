<?php

    class databaseController extends Controller{
        public function index(){
            $data['title'] = "Gerenciar banco de dados - ".APP_NAME;   

            for($i = 0; $i < count(TABLES); $i ++){
                // Instancia a classe dinamicamente
                $className = TABLES[$i];
                $instances[$i] = new $className();
                // Constrói o nome do método dinamicamente
                $functionName = "get" . TABLES[$i];
                // Chama o método na instância
                $result = $instances[$i]->$functionName();
                // Opcional: Armazene o resultado se necessário
                $data["items"][TABLES[$i]] = $result;
            }
            
            $this->loadView("database/management", $data);
        }

        public function add(){
            $_SESSION['message'] = [
                "status" => "error",
                "text" => "Operação não realizada. Tente novamente!"
            ];

            if(isset($_POST["table"]) && !empty($_POST["table"]) && isset($_POST["value"]) && !empty($_POST["value"])){
                $table = addslashes($_POST["table"]);
                $value = addslashes($_POST["value"]);

                $table = new $table();
                $return = $table->add($value);
            }else{
                header("Location: /database");
            }

            if($return){
                $_SESSION['message'] = [
                    "status" => "success",
                    "text" => "Operação realizada com sucesso!"
                ];
            }
            header("Location: /database");
        }

    }