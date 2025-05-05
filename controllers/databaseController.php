<?php

    class databaseController extends Controller{
        public function index(){

            if(!$this->validLogin()){
                header("Location: /login");
                exit(); 
            }

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

            if(!$this->validLogin()){
                header("Location: /login");
                exit(); 
            }

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

        public function edit($table, $id){

            if(!$this->validLogin()){
                header("Location: /login");
                exit(); 
            }

            $_SESSION['message'] = [
                "status" => "error",
                "text" => "Operação não realizada. Tente novamente!"
            ];

            // if(!isset($table) || !empty($table)){
            //     header("Location: /database");
            //     exit();
            // }

            // if(!isset($id) || !empty($id)){
            //     header("Location: /database");
            //     exit();
            // }

            // $table = addslashes($table);
            // $id = addslashes($id);

            // $table = new $table();

            // echo "$id";

            header("Location: /");
        }

    }