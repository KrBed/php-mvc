<?php

require 'Task.php';

class PagesController
{
    public function home()
    {
        $database = App::get('database');
        $tasks = $database->selectAll('todos', 'Task', array('description'));

        return  view('home',['tasks'=>$tasks]);
    }

    public function about()
    {
        return  view('about');
    }

    public function contact()
    {
        return  view('contact');
    }
}
