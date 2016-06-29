<?php

require_once __DIR__.'/../vendor/autoload.php';
/*use Doctrine\DBAL\Schema\Table;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;*/


$app = new \Application\App();
$app['debug'] = true; 
$app->run();
//$app = new Silex\Application();
//$app['debug'] = true; 
/*
$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'\..\views',
    ));
$app->register(new Silex\Provider\UrlGeneratorServiceProvider());
    $app->register(new Silex\Provider\DoctrineServiceProvider(), array(
    'db.options' => array(
        'driver'   => 'pdo_mysql',
        'dbname'   => 'homework',
        'host'     => 'localhost',
        'user'     => 'root',
        'password' => ''
    ),
   ));
    
    $app->register(new Silex\Provider\FormServiceProvider());
    $app->register(new Silex\Provider\ValidatorServiceProvider());
    $app->register(new Silex\Provider\TranslationServiceProvider(), array(
    'translator.messages' => array(),
    ));
$schema = $app['db']->getSchemaManager();
if (!$schema->tablesExist('posts')) {
    $posts = new Table('posts');
    $posts->addColumn('id', 'integer', array('unsigned' => true, 'autoincrement' => true));
    $posts->setPrimaryKey(array('id'));
    $posts->addColumn('first_name', 'string', array('length' => 50));
	$posts->addColumn('last_name', 'string', array('length' => 50));
	$posts->addColumn('email', 'string', array('length' => 50));
	$posts->addColumn('phone_number', 'string', array('length' => 50));
    $posts->addColumn('comment', 'string', array('length' => 50));

    $schema->createTable($posts);
	}
$app->get('/', function () use($app){
    $posts = $app['db']->executeQuery('SELECT * FROM posts');
    return $app['twig']->render('main.html.twig', array('posts' => $posts));
});

$app->match('/add', function (Request $request) use ($app) {


    $form = $app['form.factory']->createBuilder(FormType::class)
        ->add('firstName',TextType::class, array( 'required' => true))
		->add('lastName',TextType::class)
        ->add('email',TextType::class, array( 'required' => true))
		->add('phone',TextType::class)
        ->add('comment', TextType::class, array(
             'required' => false
        ))
        ->getForm();

    $form->handleRequest($request);
   if ($form->isValid()) {
        $data = $form->getData();
         $app['db']->insert('posts', array(
	    'first_name' => $data['firstName'],
	    'last_name' => $data['lastName'],
		'email' => $data['email'],
		'phone_number' => $data['phone'],
	    'comment' => $data['comment']
	    )); 
        
       
		return 'success';
    }

    return $app['twig']->render('form.html.twig', array('form' => $form->createView()));
});
$app->match('/edit/{id}', function ($id, Request $request) use ($app){
     $sql = "SELECT * FROM posts WHERE id = ?";
    $post = $app['db']->fetchAssoc($sql, array((int) $id));
	$data = array(
        'firstName' => $post['first_name'],
	    'lastName' => $post['last_name'],
		'email' => $post['email'],
		'phone' => $post['phone_number'],
	    'comment' => $post['comment']
    );
	 $form = $app['form.factory']->createBuilder(FormType::class, $data)
	 ->add('firstName',TextType::class, array( 'required' => true))
		->add('lastName',TextType::class)
        ->add('email',TextType::class, array( 'required' => true))
		->add('phone',TextType::class)
        ->add('comment', TextType::class, array(
             'required' => false
        ))
        ->getForm();
		 $form->handleRequest($request);
   if ($form->isValid()) {
        $data = $form->getData();
	 $app['db']->executeUpdate('UPDATE posts SET first_name = ?,last_name = ?,email = ?, phone_number = ?, comment = ?  
	 WHERE id = ?', array($data['firstName'],$data['lastName'],$data['email'],$data['phone'],$data['comment'], $id));
     
;
         $app['db']->update('posts', array(
	    'first_name' => $data['firstName'],
	    'last_name' => $data['lastName'],
		'email' => $data['email'],
		'phone_number' => $data['phone'],
	    'comment' => $data['comment']
	    ))->where('id = ?'); 
        
		return 'success';
    }
     return $app['twig']->render('form.html.twig', array('form' => $form->createView()));
})->bind('edit');
$app->run();
*/