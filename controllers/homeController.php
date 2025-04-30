<?php
    class homeController extends Controller{
        public function index(){
            $data['title'] = "Home - ".APP_NAME;         
            $this->loadView("home/home", $data);
        }

        public function getStock(){
            $return = [
                "status" => 204,
                "data" => "Nenhum produto encontrado!"
            ];

            $stock = new Stock();
            $stock = $stock->getStock();

            if(!empty($stock)){
                $return = $stock;
            }

            echo json_encode($return);
        }

        public function add(){

            if(!$this->validLogin()){
                header("Location: /login");
                exit(); 
            }

            $data['title'] = "Adicionar produto - ".APP_NAME;
            $data['items'] = [];

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

            $this->loadView("home/addProduct", $data);
        }

        public function addProduct(){

            if(!$this->validLogin()){
                header("Location: /login");
                exit(); 
            }

            $_SESSION['message'] = [
                "status" => "error",
                "text" => "Operação não realizada. Tente novamente!"
            ];

            $data = [];

            $keys = array_keys($_POST);
            $lowerKeys = array_map(function($key) {
                return lcfirst($key);
            }, $keys);

            $_POST = array_combine($lowerKeys, $_POST);

            for($i = 0; $i < count(STOCK_COLUMNS); $i++){
                if(isset($_POST[STOCK_COLUMNS[$i]]) && !empty($_POST[STOCK_COLUMNS[$i]])){
                    $data[STOCK_COLUMNS[$i]] = addslashes($_POST[STOCK_COLUMNS[$i]]);
                }

                if($_POST[STOCK_COLUMNS[$i]] == 0){
                    $data[STOCK_COLUMNS[$i]] = 1;
                }
            }

            $stock = new Stock();
            $return = $stock->add($data);

            if($return){
                $_SESSION['message'] = [
                    "status" => "success",
                    "text" => "Operação realizada com sucesso!"
                ];
            }

            header("Location: /");
        }

        public function edit($id = ""){

            if(!$this->validLogin()){
                header("Location: /login");
                exit(); 
            }

            $data['title'] = "Editar item - ".APP_NAME;

            if(empty($id)){
                header("Location: index.php");
            }

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

            $stock = new Stock();
            $data["item"] = $stock->getStock($id);

            $this->loadView("home/editProduct", $data);
        }

        public function update(){

            if(!$this->validLogin()){
                header("Location: /login");
                exit(); 
            }

            $_SESSION['message'] = [
                "status" => "error",
                "text" => "Operação não realizada. Tente novamente!"
            ];

            $data = [];
            $data["id"] = addslashes($_POST['id']);

            $keys = array_keys($_POST);
            $lowerKeys = array_map(function($key) {
                return lcfirst($key);
            }, $keys);

            $_POST = array_combine($lowerKeys, $_POST);

            for($i = 0; $i < count(STOCK_COLUMNS); $i++){ 
                if(isset($_POST[STOCK_COLUMNS[$i]]) && !empty($_POST[STOCK_COLUMNS[$i]])){
                    $data[STOCK_COLUMNS[$i]] = addslashes($_POST[STOCK_COLUMNS[$i]]);
                }

                if($_POST[STOCK_COLUMNS[$i]] == 0){
                    $data[STOCK_COLUMNS[$i]] = 1;
                }
            }

            $stock = new Stock();
            $return = $stock->save($data);            

            if($return){
                $_SESSION['message'] = [
                    "status" => "success",
                    "text" => "Operação realizada com sucesso!"
                ];
            }

            header("Location: /");
        }

        public function delete($id = ""){

            if(!$this->validLogin()){
                header("Location: /login");
                exit(); 
            }

            $_SESSION['message'] = [
                "status" => "error",
                "text" => "Operação não realizada. Tente novamente!"
            ];

            if(!empty($id)){
                $stock = new Stock();
                $return = $stock->delete($id);

                if($return){
                    $_SESSION['message'] = [
                        "status" => "success",
                        "text" => "Operação realizada com sucesso!"
                    ];
                }
            }

            header("Location: /");
        }

        public function sell($id = ""){

            if(!$this->validLogin()){
                header("Location: /login");
                exit(); 
            }

            if(empty($id)){
                header("Location: index.php");
            }

            $_SESSION['message'] = [
                "status" => "error",
                "text" => "Operação não realizada. Tente novamente!"
            ];

            $stock = new Stock();
            $return = $stock->sell($id);

            if($return){
                $_SESSION['message'] = [
                    "status" => "success",
                    "text" => "Operação realizada com sucesso!"
                ];
            }

            header("Location: /");
        }
    }
?>