<?php
    class financeiroController extends Controller{
        public function index(){
            $data['title'] = "Financeiro - ".APP_NAME;

            if(!$this->validLogin()){
                header("Location: /login");
                exit(); 
            }

            $start = date('Y-m-01');          // Primeiro dia do mês atual
            $end = date('Y-m-d 23:59:59');    // dia atual


            if(isset($_POST['start'])){
                
                if(empty($_POST['start'])){
                    $_SESSION['message'] = [
                        "status" => "error",
                        "text" => "A data inicial não pode ficar em branco."
                    ];
                    
                    header("Location: /financeiro");
                }else{
                    $start = addslashes($_POST["start"]);
                }
            }

            if(isset($_POST['end'])){
                if(empty($_POST['end'])){
                    $_SESSION['message'] = [
                        "status" => "error",
                        "text" => "A data final não pode ficar em branco."
                    ];

                    header("Location: /financeiro");
                }else{
                    $end = addslashes($_POST["end"]." 23:59:59");
                }
            }

            if($start > $end){
                $_SESSION['message'] = [
                    "status" => "error",
                    "text" => "A data inicial não pode ser maior do que a data final."
                ];

                header("Location: /financeiro");
                exit();
            }

            if($end > date('Y-m-d 23:59:59')){
                $_SESSION['message'] = [
                    "status" => "error",
                    "text" => "A data final não pode ser maior do que o dia atual."
                ];

                header("Location: /financeiro");
                exit();
            }

            $stock = new Stock();
            $sale = new Sale();

            $data['statistics']["stock"] = $stock->getStatistics();
            $data['statistics']['sales'] = $sale->getSale($start, $end);

            $this->loadView("finance/finance", $data);
        }

    }
