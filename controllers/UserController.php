<?php
namespace Controllers;

class UserController extends Controller{

    public function index(){
        $data = [
            "title" => "Connection",
            "h1" => "Connection",
         
        ];

        $this->render("connection.html.twig", $data);
    } 

    public function inscription(){
        $data = [
            "title" => "Inscription",
            "h1" => "Inscription",
            
        ];

        $this->render("inscription.html.twig", $data);
    }
}