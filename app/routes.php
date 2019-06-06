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
    $name = str_replace('_', ' ', $args['name']);
    $view_data=[];
    $data = $this->db->query('SELECT * FROM content WHERE name = "'.$name.'"')->fetch();
    if(!$data)
    {
        throw new \Slim\Exception\NotFoundException($request, $response);
    }
    $imgs = json_decode(file_get_contents('../web'.$data->images));
    $texts = json_decode(file_get_contents('../web'.$data->text));

    $data = $this->db->query('SELECT * FROM project')->fetchAll();

    $view_data['projects'] =$data;
    $view_data['menu'] = new StdClass();
    $view_data['menu']->home = '';
    $view_data['menu']->contact = '';
    $view_data['menu']->project = 'active';
    $view_data['img'] = $imgs;
    $view_data['text'] = $texts;

    $view_data['title'] = $args['name'];
    return $this->view->render($response, './pages/project.twig', $view_data);

})->setName('project');


// chat server handle
$app->get('/chat', function($request, $response){
    
    $data = new StdClass();
    $data->result = 0; // int http code
    $data->content = time();

    echo json_encode($data);
    return $response;
})->setName('chat');


//mail
$app->get('/mail', function($request, $response){
    
    $data = new StdClass();
    $data->result = 0; 
    $data->content = time();

    echo json_encode($data);
    return $response;
})->setName('mail');

$app->get('/admin', function($request, $response){

    $view_data=[];

    $data = $this->db->query('SELECT * FROM project')->fetchAll();

    $view_data['projects'] =$data;
    $view_data['menu'] = new StdClass();
    $view_data['menu']->home = '';
    $view_data['menu']->contact = '';
    $view_data['menu']->project = '';
    $view_data['title'] = 'admin page';

    $inputs = $request->getQueryParams();
    if($inputs != null){
        $set = $this->db->prepare('INSERT INTO project (name,date,description) VALUES(:name,:date,:description)');
        $set->bindValue(':name',$inputs['name']);
        $set->bindValue(':date',strtotime($inputs['date']));
        $set->bindValue(':description',$inputs['description']);

        $set->execute();
        
        $set_content = $this->db->prepare('INSERT INTO content (images,text,name) VALUES(:images,:text,:name)');
        $set_content->bindValue(':name',$inputs['name']);
        $set_content->bindValue(':images','/assets/content/img/'.str_replace(' ','_',$inputs['name']).'.json');
        $set_content->bindValue(':text','/assets/content/txt/'.str_replace(' ','_',$inputs['name']).'.json');

        $set_content->execute();

        $img = [];
        $img['first_img'] = $inputs['project_img_first'];
        $img['last_img'] = $inputs['project_img_last'];

        $texts = [];
        $texts['title'] = $inputs['name'];
        $texts['text'] = $inputs['text_content'];

        file_put_contents('../web/assets/content/img/'.str_replace(' ','_',$inputs['name']).'.json', json_encode($img));
        file_put_contents('../web/assets/content/txt/'.str_replace(' ','_',$inputs['name']).'.json', json_encode($texts));
    }
    return $this->view->render($response, './pages/admin.twig');

})->setName('admin');