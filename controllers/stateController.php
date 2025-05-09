<?php
    class stateController extends Controller{
        public function index(){

            $data = json_decode(file_get_contents("php://input"), true);

            $nome = $data['nome'];
            $sigla = $data['sigla'];

            $state = new State();
            $state->add($nome, $sigla);
        }
    }
