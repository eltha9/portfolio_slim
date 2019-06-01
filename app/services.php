<?php
$container = $app->getContainer();

// View with twig, initialisation de twig
$container['view'] = function($container)
{
    $view = new \Slim\Views\Twig('../views');

    $router = $container->get('router');
    $uri = \Slim\Http\Uri::createFromEnvironment(new \Slim\Http\Environment($_SERVER));
    $view->addExtension(new \Slim\Views\TwigExtension($router, $uri));

    return $view;
};


// data base service 
$container['db'] = function($container){
    $db = $container['settings']['db'];
    
    $pdo = new PDO('mysql:host='.$db['host'].';dbname='.$db['name'].';port='.$db['port'], $db['user'], $db['pass']);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $pdo;
};



// MAILER SERVICE 

// $container['mailer'] = function($container){
//   // transport 
//   $transport = Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, "ssl")
//   ->setUsername('santosphilippe93@gmail.com')
//   ->setPassword('zth18ap4');

//   $mailer = new Swift_Mailer($transport);

//   $message = (new Swift_Message('Wonderful Subject'));


//   return $message;
//   // ->setFrom(['elph@elph.com' => 'elph'])
//   // ->setTo(['santosphilippe93@gmail.com'])
//   // ->setBody('Here is the message itself')
//   // ;

//   // // Send the message
//   // $result = $mailer->send($message);
// };


//transport 1 
// $transport = Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, "ssl")
//   ->setUsername('santosphilippe93@gmail.com')
//   ->setPassword('zth18ap4');

  //transport 2

// $transport = new Swift_SendmailTransport('/usr/sbin/sendmail -bs');




// // Create the Mailer using your created Transport
// $mailer = new Swift_Mailer($transport);


// // Create a message
// $message = (new Swift_Message('Wonderful Subject'))
//   ->setFrom(['elph@elph.com' => 'elph'])
//   ->setTo(['santosphilippe93@gmail.com'])
//   ->setBody('Here is the message itself')
//   ;

// // Send the message
// $result = $mailer->send($message);
