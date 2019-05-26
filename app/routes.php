<?php

//HOME
$app->get('/', function($request, $response){
    
    $viewData=[];
    return $this->view->render($response, './pages/home.twig');

})->setName('home');

//contact
$app->get('/contact', function($request, $response){
    
    $viewData=[];
    return $this->view->render($response, './pages/contact.twig');

})->setName('contact');

//project

$app->get('/project/{name}', function($request, $response, $args){
    
    $viewData=[];
    return $this->view->render($response, './pages/project.twig');

})->setName('project');