<?php 
use app\App;

function home()
{
    return trim(app::get('config')['app']['home_url'],'/');
}

function redirect($to){
    header("Location: $to");
}

function redirect_home(){
    redirect(home());
}

function back(){
    redirect($_SERVER['HTTP_REFERER'] ?? home());
}

function view($name, $data)
{
    extract($data);
    // echo "<pre>";
    // var_dump($tasks);
    // echo "</pre>";
    require "resources/{$name}.view.php";
}