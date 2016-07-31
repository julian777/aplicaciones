<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

class HomeController extends Controller{
    
    public function index(){
        
        return "Bienvenido al proyecto Laravel 5";
    }
        public function getList(){
        
        return "Esto es una lista";
    }
    
}
