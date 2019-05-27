<?php

//HOME
$app->get('/', function($request, $response){
    
    $view_data=[];
    $data = $this->db->query('SELECT * FROM project')->fetchAll();

    $view_data['projects'] =$data;

    $view_data['menu'] = new StdClass();
    $view_data['menu']->home = 'active';
    $view_data['menu']->contact = '';
    $view_data['menu']->project = '';
    $view_data['title'] = 'Théa - portfolio';
    
    

    return $this->view->render($response, './pages/home.twig', $view_data);

})->setName('home');

//contact
$app->get('/contact', function($request, $response){
    
    $view_data=[];
    $data = $this->db->query('SELECT * FROM project')->fetchAll();

    $view_data['projects'] =$data;
    $view_data['menu'] = new StdClass();
    $view_data['menu']->home = '';
    $view_data['menu']->contact = 'active';
    $view_data['menu']->project = '';

    $view_data['title'] = ' Contact me';
    return $this->view->render($response, './pages/contact.twig', $view_data);

})->setName('contact');

//project

$app->get('/project/{name}', function($request, $response, $args){
    
    $view_data=[];
    $data = $this->db->query('SELECT * FROM project')->fetchAll();

    $view_data['projects'] =$data;
    $view_data['menu'] = new StdClass();
    $view_data['menu']->home = '';
    $view_data['menu']->contact = '';
    $view_data['menu']->project = 'active';

    $view_data['title'] = $args['name'];
    return $this->view->render($response, './pages/project.twig', $view_data);

})->setName('project');