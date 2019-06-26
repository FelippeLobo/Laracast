<?php

    namespace App\Controllers;
    use App\Core\App;

    class TaskController{
        

        public function index(){

            $tasks = App::get('database')->selectAll('tasks');

            return view('tasks/index', compact('tasks'));

        }

        public function show(){

            $id = $_GET['id'];
           
            $task = App::get('database')->selectOne('tasks', $id);

            
            return view('tasks/show', compact('task'));

        }

        public function create(){

            
            return view('tasks/create');

        }

        public function store(){

            if(isset($_POST['completed']) && $_POST['completed'] == 'on')

            $_POST['completed'] = true;

            App::get('database')->create('tasks', $_POST);

            return redirect('tasks');

        }

        public function edit(){
            
            $id = $_GET['id'];

            return view('tasks/edit', compact('id'));

        }

        public function update(){

            $id =  $_POST['id'];
            unset($_POST['id']);

            if(isset($_POST['completed']) && $_POST['completed'] == 'on')
            $_POST['completed'] = true;
            else
            $_POST['completed'] = false;

            App::get('database')->update('tasks', $_POST, $id);

            return redirect('tasks');

        }

        public function destroy(){

            $id = $_GET['id'];         

            App::get('database')->delete('tasks', $id);

            return redirect('tasks');

        }



    }