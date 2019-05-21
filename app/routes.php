<?php

//HOME
$app->get('/', function($request, $response){
    
    $viewData=[];
    return $this->view->render($response, './pages/home.twig');

})->setName('home');