<?php

namespace App\Controllers;
use App\Core\App;

    class HomeController{

        public function index(){

            $tasks = App::get('database')->selectAll('tasks');
            return view('index', compact('tasks'));

        }



    }