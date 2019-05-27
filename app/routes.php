<?php

//HOME
$app->get('/', function($request, $response){
    
    $viewData=[];
    $data = $this->db->query('SELECT * FROM project')->fetchAll();

    $viewData['projects'] =$data;
    $viewData['menu'] = new StdClass();
    $viewData['menu']->home = 'active';
    $viewData['menu']->contact = '';
    $viewData['menu']->project = '';
    $viewData['title'] = 'Théa - portfolio';
    
    

    return $this->view->render($response, './pages/home.twig', $viewData);

})->setName('home');

//contact
$app->get('/contact', function($request, $response){
    
    $viewData=[];
    $data = $this->db->query('SELECT * FROM project')->fetchAll();

    $viewData['projects'] =$data;
    $viewData['menu'] = new StdClass();
    $viewData['menu']->home = '';
    $viewData['menu']->contact = 'active';
    $viewData['menu']->project = '';
    $viewData['title'] = ' Contact me';
    return $this->view->render($response, './pages/contact.twig', $viewData);

})->setName('contact');

//project

$app->get('/project/{name}', function($request, $response, $args){
    
    $viewData=[];
    $data = $this->db->query('SELECT * FROM project')->fetchAll();

    $viewData['projects'] =$data;
    $viewData['menu'] = new StdClass();
    $viewData['menu']->home = '';
    $viewData['menu']->contact = '';
    $viewData['menu']->project = 'active';
    $viewData['title'] = $args['name'];
    return $this->view->render($response, './pages/project.twig', $viewData);

})->setName('project');