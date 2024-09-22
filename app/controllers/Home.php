<?php

class Home extends Controller{
    public function index(){
        $user = new User();
        $result = $user->update(1,['name' => 'senira samarasinghe']);
        
        $this->view("home");
    }
}

