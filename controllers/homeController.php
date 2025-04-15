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
            $this->loadView("home/addProduct", $data);
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

            $stock = new Stock();
            $stock = $stock->sell($id);

            if($stock == false){
                return json_encode([
                    "status" => "error",
                    "message" => "Operação não realizada. Tente novamente!"
                ]);
            }else{
                return json_encode([
                    "status" => "success",
                    "message" => $stock
                ]);
            }
        }
    }
?>