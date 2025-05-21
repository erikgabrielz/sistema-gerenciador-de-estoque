<?php
    class stateController extends Controller{
        public function index(){

            $state = new State();
            $state = $state->getState();

            echo json_encode($state);

        }
    }
