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

    
    //gmail

    function getClient()
{
    $client = new Google_Client();
    $client->setApplicationName('Gmail API PHP Quickstart');
    $client->setScopes(Google_Service_Gmail::GMAIL_READONLY);
    $client->setAuthConfig('../credentials.json');
    $client->setAccessType('offline');
    $client->setPrompt('select_account consent');

    // Load previously authorized token from a file, if it exists.
    // The file token.json stores the user's access and refresh tokens, and is
    // created automatically when the authorization flow completes for the first
    // time.
    $tokenPath = 'token.json';
    if (file_exists($tokenPath)) {
        $accessToken = json_decode(file_get_contents($tokenPath), true);
        $client->setAccessToken($accessToken);
    }

    // If there is no previous token or it's expired.
    if ($client->isAccessTokenExpired()) {
        // Refresh the token if possible, else fetch a new one.
        if ($client->getRefreshToken()) {
            $client->fetchAccessTokenWithRefreshToken($client->getRefreshToken());
        } else {
            // Request authorization from the user.
            $authUrl = $client->createAuthUrl();
            printf("Open the following link in your browser:\n%s\n", $authUrl);
            print 'Enter verification code: ';
            $authCode = trim(fgets(STDIN));

            // Exchange authorization code for an access token.
            $accessToken = $client->fetchAccessTokenWithAuthCode($authCode);
            $client->setAccessToken($accessToken);

            // Check to see if there was an error.
            if (array_key_exists('error', $accessToken)) {
                throw new Exception(join(', ', $accessToken));
            }
        }
        // Save the token to a file.
        if (!file_exists(dirname($tokenPath))) {
            mkdir(dirname($tokenPath), 0700, true);
        }
        file_put_contents($tokenPath, json_encode($client->getAccessToken()));
    }
    return $client;
}


// Get the API client and construct the service object.
$client = getClient();
$service = new Google_Service_Gmail($client);

// Print the labels in the user's account.
$user = 'me';
$results = $service->users_labels->listUsersLabels($user);

if (count($results->getLabels()) == 0) {
  print "No labels found.\n";
} else {
  print "Labels:\n";
  foreach ($results->getLabels() as $label) {
    printf("- %s\n", $label->getName());
  }
}


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


// chat server handle
$app->get('/chat', function($request, $response){
    
    $data = new StdClass();
    $data->result = 0; // int http code
    $data->content = time();

    echo json_encode($data);
    return $response;
})->setName('chat');