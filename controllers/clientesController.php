<?php
    class clientesController extends Controller{

        public function index(){
            if(!$this->validLogin()){
                header("Location: /login");
                exit(); 
            }

            $data['title'] = "Clientes - ".APP_NAME;
            $this->loadView("clients/clients", $data);
        }

        public function getClients($id = ""){
            $return = [
                "status" => 204,
                "data" => "Nenhum Cliente cadastrado!"
            ];

            $user_id = "";

            if(isset($_SESSION['id']) && !empty($_SESSION['id'])){
                $user_id = $_SESSION['id'];
            }

            $client = new Client();
            $client = $client->getClient($id, $user_id);

            if(!empty($client)){
                $return = $client;
            }

            echo json_encode($return);
        }

        public function add(){
            if(!$this->validLogin()){
                header("Location: /login");
                exit(); 
            }

            $data['title'] = "Adicionar Cliente - ".APP_NAME;
            $this->loadView("clients/add", $data);
        }

        public function addCliente(){
            if(isset($_POST['name']) && !empty($_POST['name'])){
                if(isset($_POST['phone']) && !empty($_POST['phone'])){
                    if(isset($_POST['cpf']) && !empty($_POST['cpf'])){
                        
                        $data = [
                            "name" => addslashes($_POST['name']),
                            "cpf" => addslashes($_POST['cpf']),
                            "phone" => addslashes($_POST['phone']),
                            "uf" => "PR",
                            "city" => "Virmond",
                            "email" => "Não consta",
                            "cep" => "Não Consta",
                            "street" => "Não Consta",
                            "number" => "s/nº",
                            "district" => "Não consta"
                        ];

                        if(isset($_POST['city']) && !empty($_POST['city'])){
                            $data['city'] = addslashes($_POST['city']);
                        }

                        if(isset($_POST['uf']) && !empty($_POST['uf'])){
                            addslashes($_POST['uf']);
                        }

                        if(!empty($_POST['email'])){
                            $data['email']= addslashes($_POST['email']);
                        }

                        if(!empty($_POST['cep'])){
                            $data['cep'] = addslashes($_POST['cep']);
                        }
                        if(!empty($_POST['street'])){
                            $data['street'] = addslashes($_POST['street']);
                        }
                        if(!empty($_POST['number'])){
                            $data['number'] = addslashes($_POST['number']);
                        }
                        if(!empty($_POST['district'])){
                            $data['district'] = addslashes($_POST['district']);
                        }

                        $client = new Client();

                        if($client->addClient($data)){
                            $_SESSION['message'] = [
                                "status" => "success",
                                "text" => "Operação realizada com sucesso!"
                            ];

                            header("Location: /clientes");
                            exit();
                        }
                    }else{
                        $_SESSION['message']['text'] = "Campo CPF não pode ficar em branco.";
                        header("Location: /clientes");
                        exit();
                    }
                }else{
                    $_SESSION['message']['text'] = "Campo telefone não pode ficar em branco.";
                    header("Location: /clientes");
                    exit();
                }
            }else{
                $_SESSION['message']['text'] = "Campo nome não pode ficar em branco.";
                header("Location: /clientes");
                exit();
            }
        }

        public function edit($id = ""){
            if(!$this->validLogin()){
                header("Location: /login");
                exit(); 
            }
            $user_id = "";
            $data['title'] = "Editar cliente - ".APP_NAME;

            if(empty($id)){
                header("Location: /clientes");
            }

            if(isset($_SESSION['id']) && !empty($_SESSION['id'])){
                $user_id = $_SESSION['id'];
            }

            $client = new Client();
            $data["client"] = $client->getClient($id, $user_id);

            $this->loadView("clients/edit", $data);
        }

        public function delete($id){
            if(!$this->validLogin()){
                header("Location: /login");
                exit(); 
            }

            $_SESSION['message'] = [
                "status" => "error",
                "text" => "Operação não realizada. Tente novamente!"
            ];

            if(!empty($id)){
                $client = new Client();
                $return = $client->delete($id);

                if($return){
                    $_SESSION['message'] = [
                        "status" => "success",
                        "text" => "Operação realizada com sucesso!"
                    ];
                }
            }

            header("Location: /clientes");
        }
    }
?>