<?php
namespace app\controllers;

use \app\core\Request;
use \app\DB\QueryBuilder;

class TaskController
{
    public function index()
    {
        
        //QueryBuilder::update('tasks', 9, ['description' => 'updated task', 'completed' => 1]);
        //$tasks = QueryBuilder::get('tasks');
        //QueryBuilder::insert('tasks', ['description' => 'new2 tasks2', 'completed' => 0]);
        //QueryBuilder::delete('tasks', 7, 'id', '=');

        $completed = Request::get('completed');
        if($completed != null){
            $tasks = QueryBuilder::get('tasks',['completed','=',$completed]);
        } else {
            $tasks = QueryBuilder::get('tasks');
        }

        // echo '<pre>';
        // var_dump($tasks);
        // echo '</pre>';

        view('index',['tasks'=>$tasks]);
    }

    public function create()
    {
        // $pdo = DBConnection::make();
        // QueryBuilder::make($pdo);

        $description = Request::get('description');

        QueryBuilder::insert('tasks', [
            'description' => $description
        ]);

            back();
    }

    
    public function update()
    {
        // $pdo = DBConnection::make();
        // QueryBuilder::make($pdo);

        $id= Request::get('id');
        $completed= Request::get('completed');
        if($id && $completed != null){
            QueryBuilder::update('tasks',$id,['completed' => $completed]);
        }

        

        back();
    }
    
    public function delete()
    {
        // $pdo = DBConnection::make();
        // QueryBuilder::make($pdo);

        if($id= Request::get('id')){
            QueryBuilder::delete('tasks',$id);
        }

        
        back();
    }
}
