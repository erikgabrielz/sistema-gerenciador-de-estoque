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
            $data['title'] = "Adicionar produto - ".APP_NAME;
            $data['items'] = [];
            
            $columns = ["Brand", "Category", "Extra", "Product", "Type"];

            for($i = 0; $i < count($columns); $i ++){
                // Instancia a classe dinamicamente
                $instances[$i] = new $columns[$i];

                // Constrói o nome do método dinamicamente
                $functionName = "get" . $columns[$i];

                // Chama o método na instância
                $result = $instances[$i]->$functionName();

                // Opcional: Armazene o resultado se necessário
                $data["items"][$columns[$i]] = $result;
            }

            $this->loadView("home/addProduct", $data);
        }

        public function addProduct(){
            
            header("Location: /");
        }

        public function edit($id = ""){
            
            if(empty($id)){
                header("Location: index.php");
            }

            $stock = new Stock();
            $stock = $stock->getStock($id);

            print_r($stock);
        }

        public function delete($id = ""){
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