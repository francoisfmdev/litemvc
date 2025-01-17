<?php
namespace Controllers;

class HomeController extends Controller{

    public function __construct(){
        parent::__construct();
       
         
    }

    public function index(){
        $data = [
            "title"=>"Notre super page",
            "h1"=>"Welcome to my page",
            "content"=>"Juste un peu de texte pour voir "
        ];
        $this->render( "home.html.twig",$data );
    }
    public function contact(){

    }
    
}